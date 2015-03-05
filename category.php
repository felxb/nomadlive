<?php get_header(); ?>

	<div id="main">

		<!-- title -->
		<div id="category-header-title" class="header-title">
		
        	<div id="category-header-img" class="header-img non-selectable">

	    	    <div class="toggle-sidebar sf-rollback non-selectable">
	    	    	<i class="fa fa-bars"></i>
	    	    	<span class="menu-icon-text">menu</span>
	    	    </div>	

				<?php $queried_object = get_queried_object(); ?>
				<?php $taxonomy = $queried_object->taxonomy;?>
				<?php $term_id = $queried_object->term_id;?>  
				<?php $imgHeader = get_field('story_header', $queried_object);?>

			    <?php if( $imgHeader ){?>
        		<?php $url = wp_get_attachment_image_src( $imgHeader, 'large' );?>
        		<?php $url = $url['0']; ?>
	            <img class="category-header-img" title="<?php single_cat_title(); ?>" src="<?php echo $url;?>"/>
		        <?php } else {?>
				<div class="default-category-title">
					<?php single_cat_title(); ?>
					<?php echo "<span class='nomad-x'>x</span>";?>
		            <img src="<?php echo get_template_directory_uri();?>/inc/img/nomad-live-logo-cropped.png"/>
	            </div>
		        <?php }?>
	            <div id="project-description">
		            <?php $description=category_description();?>
		            <p><?php echo ($description?$description:bloginfo('description'));?><br/>
					<?php echo __('NOMAD is a movement. Join by <a class="thumbSubmit" href="#">sending us your facetime/skype/hangout info or any video link you would like to share.</a>.','nomadlive');?>
					</p>
	            </div>
            </div>   
            <div id="logos" class="header-menu">
				<?php $logosArray = get_field('logos_story', $queried_object);?>
			    <?php if( $logosArray ){?>
					<?php foreach ($logosArray as $key => $logo){ ?>
						<?php $imgID= get_field('channel_logo',"post_tag_".$logo);?>
						<?php if ($imgID) { ?>
						<?php $url = wp_get_attachment_image_src( $imgID, 'large' ); ?>
						<?php $url = $url['0']; ?>
						<?php $channelLink= get_field('channel_external_link',"post_tag_".$logo);?>
						<?php $target=($channelLink?"_blank":"_self");?>
						<?php $channelLink = ($channelLink?$channelLink:get_bloginfo('url')."/channel/".get_tag($logo)->slug);?>
							<a href="<?php echo $channelLink;?>" target="<?php echo $target;?>">
					            <img class="logo-img" title="<?php echo get_tag($logo)->name; ?>" id="logo-<?php echo get_tag($logo)->slug; ?>" src="<?php echo $url;?>"/>
				            </a>
						<?php } ?>
					<?php } ?>
				<?php } else { get_template_part('social');} ?>
            </div>
        </div>
		<!-- /title -->

		<!-- player -->
		<?php get_template_part('player'); ?>
		<!-- /player -->

		<!-- ticker -->
        <div id="ticker-container">
			<?php $tickerID = get_field('twitter_ticker_story', $queried_object);?>
		    <?php if( $tickerID ){?>
				<?php if(function_exists('ditty_news_ticker')){ditty_news_ticker($tickerID->ID);} ?>
			<?php } else { if(function_exists('ditty_news_ticker')){ditty_news_ticker(39);}} ?>
		</div>
		<!-- /ticker -->

		<!-- section -->
		<section>
			<!-- gallery -->
			<div id="gallery" class="section group">
				<?php get_template_part('loop'); ?>
				<?php get_template_part('pagination'); ?>
			</div>
			<!-- /gallery -->
		</section>
		<!-- /section -->
	</div>

<?php get_footer(); ?>
