// Custom code for NOMAD Live
jQuery(document).ready(function(){
	function closeFullScreenAndNext() {
	  if (!document.fullscreenElement &&    // alternative standard method
		  !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {
		  goToNext();
	  } else {
		jQuery(document).bind('mozfullscreenchange webkitfullscreenchange fullscreenchange',goToNext);
		if (document.exitFullscreen) {
		  document.exitFullscreen();
		} else if (document.msExitFullscreen) {
		  document.msExitFullscreen();
		} else if (document.mozCancelFullScreen) {
		  document.mozCancelFullScreen();
		} else if (document.webkitExitFullscreen) {
		  document.webkitExitFullscreen();
		}
	  }
	}
	function goToNext() {
		jQuery(document).unbind('mozfullscreenchange webkitfullscreenchange fullscreenchange',goToNext);
		next=jQuery(".currently-playing").parent().attr("id");
		next=next.replace("thumb","");
		next=parseInt(next);
		next+=1;
		videosCount = jQuery(".thumb").last().attr("id");
		videosCount = videosCount.replace("thumb","");
		if (next<=videosCount){
			jQuery("#thumb"+next+" a")[0].click();
		} else {
			jQuery("#thumb1 a")[0].click();
		}
	}
	function postToIframe(action, value) {
		var data = {
		  method: action
		};
		
		if (value) {
			data.value = value;
		}
		
		var message = JSON.stringify(data);
		player[0].contentWindow.postMessage(data, url);
	}

	window.addEventListener('popstate', function(event) {
	  var state = event.state;
	  	window.location.href = state.link;
	});

	jQuery(".thumb a").click(function(e){
		if(jQuery(".main-player").length){
			e.preventDefault();

			title = jQuery('.video-title', this).text();
			if(jQuery("#single-query-title .query")){
				jQuery("#single-query-title .query").html(title);
			}
			state= [];
			state.thumbid = jQuery(this).parent().attr("id");
			state.link = jQuery(this).attr('href');
			window.history.pushState(state, title, jQuery(this).attr('href'));
			document.title = title;

			jQuery(".thumb a").each(function(){jQuery(this).removeClass("currently-playing");});
			jQuery(this).addClass("currently-playing");
			currentTitle=jQuery(".currently-playing .video-title").text();
			ga('send', 'event', 'button', 'play', currentTitle );
			content=jQuery(this).attr("data-content");
			type=jQuery(this).attr("data-type");
			jQuery(".main-player").html(content);
			jQuery('html, body').animate({
				scrollTop: jQuery(".main-player").offset().top
			}, 300);
			jQuery('.main-player iframe').load(function(){
				jQuery('#main-player').attr("class",type+"-player");
				jQuery('#main-player').addClass("main-player");
				if(type=="vimeo") {
					id = jQuery(this).attr("id");
					$f(id).addEvent('ready', function(id){
						$f(id).addEvent('finish', function(){
							closeFullScreenAndNext();
						});

			        });
				}
			});
		}
    });
	if (jQuery("#main-player")){
		if (jQuery("#main-player").hasClass("vimeo-player")){
			id = jQuery("#main-player iframe").attr("id");
			idInt = id.replace("vimeo","");
			jQuery("#thumb"+idInt+" a").addClass("currently-playing");
			$f(id).addEvent('ready', function(id){
				$f(id).addEvent('finish', function(){
					closeFullScreenAndNext();
				});
		    });
		}
	}
	// if(jQuery("html").attr("lang")=="fr-FR"){
	// 	jQuery(".mtphr-dnt-twitter-time").each(function() {
	//        tweetTime=jQuery(this).html();
	// 		tweetTime=tweetTime.replace("hour","heure");
	// 		tweetTime=tweetTime.replace("hours","heures");
	// 		tweetTime=tweetTime.replace("day","jour");
	// 		tweetTime=tweetTime.replace("days","jours");
	// 		jQuery(this).html(tweetTime);
	//     });
	// }
	
	jQuery(".thumbSubmit").click(function(e){
		e.preventDefault();
		jQuery(".form-overlay").show();
	});
	jQuery(".form-quit").click(function(e){
		e.preventDefault();
		jQuery(".form-overlay").hide();
	});
	jQuery(".form-close").click(function(e){
		e.preventDefault();
		jQuery(".form-overlay").hide();
	});
	jQuery(".form-overlay").click(function(event) { 
		if(!jQuery(event.target).closest('.form-overlay-container').length) {
			jQuery(".form-overlay").hide();
		}
	});
	jQuery('.thumb').click(function() {  
	});
	if (!Modernizr.touch){
	jQuery(".thumb a").hover(
		function() {
			jQuery(this).children(".video-title-container").show();
		}, 
		function() {
			jQuery(this).children(".video-title-container").hide();
		}
	);
	if(jQuery(".show-desc-onHover")){
		jQuery(".header-img").mouseenter(function(){
			clearTimeout(jQuery(this).data('timeoutId'));
			jQuery(this).find(".show-desc-onHover").show();
		}).mouseleave(function(){
				var titleImg = jQuery(this),
					timeoutId = setTimeout(function(){
						titleImg.find(".show-desc-onHover").hide();
					}, 650);
				titleImg.data('timeoutId', timeoutId); 
		});
	}
	} else {
		jQuery(".video-title-container").show();
	}
});