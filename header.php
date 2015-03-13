<!doctype html>
<html <?php language_attributes(); ?> class="no-js video-gallery">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' | '; } ?> <?php bloginfo('name'); ?></title>
		<link href="//www.google-analytics.com" rel="dns-prefetch">

		<!-- Favicons -->
		<!-- Main Favicon -->
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<!-- Opera Speed Dial Favicon -->
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/inc/img/favicon-160.png" />
		<!-- Standard Favicon -->
		<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri();?>/inc/img/favicon.png" />
		<!-- For iPhone 4 Retina display: -->
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri();?>/inc/img/favicon-114.png">
		<!-- For iPad: -->
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri();?>/inc/img/favicon-72.png">
		<!-- For iPhone: -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri();?>/inc/img/favicon-57.png">
		<meta property="fb:app_id" content="793070907451382" />
		<meta property="og:title" content="<?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' | '; } ?> <?php bloginfo('name'); ?>" />
		<?php $current_url = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";?>
		<?php $current_url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>
		<meta property="og:url" content="<?php echo $current_url; ?>" />

		<?php if (is_home()) {?>
			<meta property="og:description" content="<?php bloginfo('description'); ?>" />
			<meta property="og:image" content="<?php echo get_template_directory_uri();?>/inc/img/nomad-live-screenshot.jpg"/>
			<meta property="og:type" content="video.other" />
			<meta property="og:video:url" content="https://www.ustream.tv/flash/viewer.swf?cid=18155672&amp;v3=1&amp;bgcolor=000000&amp;campaign=facebook" />
		    <meta property="og:video:secure_url" content="https://www.ustream.tv/flash/viewer.swf?cid=18155672&amp;v3=1&amp;bgcolor=000000&amp;campaign=facebook" />
		    <meta property="og:video:type" content="application/x-shockwave-flash" />
		    <meta property="og:video:width" content="480" />
		    <meta property="og:video:height" content="320" />
		<?php } else if (is_single()){ ?>
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<meta property="og:description" content="<?php the_excerpt();?>" />
				<?php $image_id = get_post_thumbnail_id();?>
				<?php $image_url = wp_get_attachment_image_src($image_id,'large', true);?>
				<?php $image_url = $image_url[0];?>
				<meta property="og:image" content="<?php echo $image_url;?>"/>
				<?php if( get_field( "video_type" ) ): $video_type=get_field("video_type");endif;?>
			    <?php if($video_type=="vimeo") {?>
					<meta property="og:type" content="video.other" />
					<meta property="og:video:url" content="https://vimeo.com/moogaloop.swf?clip_id=<?php echo get_field("vimeo_id"); ?>&amp;autoplay=1" />
				    <meta property="og:video:secure_url" content="https://vimeo.com/moogaloop.swf?clip_id=<?php echo get_field("vimeo_id"); ?>&amp;autoplay=1" />
					<meta property="og:video:type" content="text/html" />
				    <meta property="og:video:width" content="640" />
				    <meta property="og:video:height" content="360" />
					<meta property="og:video:url" content="https://vimeo.com/moogaloop.swf?clip_id=<?php echo get_field("vimeo_id"); ?>&amp;autoplay=1" />
				    <meta property="og:video:secure_url" content="https://vimeo.com/moogaloop.swf?clip_id=<?php echo get_field("vimeo_id"); ?>&amp;autoplay=1" />
				    <meta property="og:video:width" content="640" />
				    <meta property="og:video:height" content="360" />
				    <meta property="og:video:type" content="application/x-shockwave-flash" />
				<?php } else if ($video_type=="youtube"){ ?>
					<meta property="og:type" content="video.other" />
					<meta property="og:video:url" content="https://www.youtube.com/embed/<?php echo get_field("vimeo_id"); ?>" />
				    <meta property="og:video:secure_url" content="https://www.youtube.com/embed/<?php echo get_field("vimeo_id"); ?>" />
					<meta property="og:video:type" content="text/html" />
				    <meta property="og:video:width" content="1280" />
				    <meta property="og:video:height" content="720" />
					<meta property="og:video:url" content="http://www.youtube.com/v/<?php echo get_field("vimeo_id"); ?>?version=3&amp;autohide=1" />
				    <meta property="og:video:secure_url" content="http://www.youtube.com/v/<?php echo get_field("vimeo_id"); ?>?version=3&amp;autohide=1" />
				    <meta property="og:video:type" content="application/x-shockwave-flash" />
				    <meta property="og:video:width" content="1280" />
				    <meta property="og:video:height" content="720" />
				<?php } ?>
			<?php endwhile;endif; ?>
		<?php } else { ?>
			<meta property="og:type" content="website" />
			<meta property="og:image" content="<?php echo get_template_directory_uri();?>/inc/img/nomad-live-screenshot.jpg"/>
		<?php } ?>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="twitter:widgets:csp" content="on"> 

		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css">

		<?php wp_head(); ?>

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-51276546-1', 'auto');
		  ga('send', 'pageview');

		</script>



	</head>
	<body <?php body_class(); ?>>

<!-- 		<script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '793070907451382',
		      xfbml      : true,
		      version    : 'v2.2'
		    });
		  };

		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/en_US/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>
 -->
 		<div class="form-overlay">
			<div class="form-bgd"></div>
			<div class="form-overlay-container">	
				<div class="form-close"><img src="<?php echo get_template_directory_uri();?>/inc/img/close.png"/></div>
				<div class="form-title"><?php echo _e("Take part in NOMAD livecast","nomadlive");?></div>
				<?php if(ICL_LANGUAGE_CODE=='en'): ?>
				<?php echo do_shortcode('[contact-form-7 id="41" title="Join NOMAD"]');?>
				<?php elseif(ICL_LANGUAGE_CODE=='fr'): ?>	
				<?php echo do_shortcode('[contact-form-7 id="289" title="Join NOMAD FR"]');?>
				<?php endif;?>
		   </div>
		</div>

		<!-- wrapper -->
		<div class="wrapper">

