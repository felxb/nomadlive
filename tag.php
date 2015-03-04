<?php get_header(); ?>

	<div id="main">

		<!-- title -->
		<div id="tag-header-title" class="header-title">

        	<div id="tag-header-img" class="header-img non-selectable">

	    	    <div class="toggle-sidebar sf-rollback non-selectable">
	    	    	<i class="fa fa-bars"></i>
	    	    	<span class="menu-icon-text">menu</span>
	    	    </div>	
				<?php $queried_object = get_queried_object(); ?>
				<?php $taxonomy = $queried_object->taxonomy;?>
				<?php $term_id = $queried_object->term_id;?>  
				<?php $imgHeader = get_field('channel_logo', $queried_object);?>
				<?php if ( get_field('channel_header', $queried_object) ) : $imgHeader = get_field('channel_header', $queried_object); ?>
				<?php endif;?>

			    <?php if( $imgHeader ):?>
        		<?php $url = wp_get_attachment_image_src( $imgHeader, 'large' );?>
        		<?php $url = $url['0']; ?>
	            <img class="tag-header-img" title="<?php single_tag_title(); ?>" src="<?php echo $url;?>"/>
		        <?php else:?>
				<div class="default-tag-title">
					<?php single_tag_title(); ?>
					<?php echo "<span class='nomad-x'>x</span>";?>
		            <img src="<?php echo get_template_directory_uri();?>/inc/img/nomad-live-logo-cropped.png"/>
		            </div>
		        <?php endif; ?>
	            <div id="project-description">
		            <?php $description=tag_description();?>
		            <p><?php echo ($description?$description:bloginfo('description'));?><br/>
					<?php echo __('NOMAD is a movement. Join by <a class="thumbSubmit" href="#">sending us your facetime/skype/hangout info or any video link you would like to share.</a>.','nomadlive');?>
					</p>
	            </div>
            </div>   
            <div id="social-links-menu" class="header-menu">
				<?php get_template_part('social'); ?>
				<?php get_template_part('logos'); ?>
            </div>
        </div>
		<!-- /title -->

		<!-- player -->
		<?php get_template_part('player'); ?>
		<!-- /player -->

		<!-- ticker -->
        <div id="ticker-container">
			<?php $tickerID = get_field('twitter_ticker_channel', $queried_object);?>
		    <?php if( $tickerID ){?>
				<?php if(function_exists('ditty_news_ticker')){ditty_news_ticker($tickerID->ID);} ?>
			<?php } else { if(function_exists('ditty_news_ticker')){ditty_news_ticker(39);}} ?>
		</div>
		<!-- /ticker -->

		<!-- section -->
		<section>
			<!-- gallery -->
			<div id="gallery" class="section group">
				<?php $displayHomeBool = get_field('display_livestream_on_channel_page', $queried_object);?>
			    <?php if( $displayHomeBool ){?>
				<article class="thumb col span_1_of_4 non-selectable" id="thumb0">
				    <a href="#" data-link="" data-type="" data-content="<iframe width='660' height='387' src='http://www.ustream.tv/embed/18155672?ub=85a901&amp;lc=85a901&amp;oc=ffffff&amp;uc=ffffff&amp;v=3&amp;wmode=direct&amp;autoplay=true' scrolling='no' frameborder='0' style='border: 0px none transparent;'></iframe>">
				        <img src="<?php echo get_template_directory_uri();?>/inc/img/to-live.png"/>
				    </a>
				</article>
				<?php } ?>
				<?php get_template_part('loop'); ?>
				<?php get_template_part('pagination'); ?>
			</div>
			<!-- /gallery -->
		</section>
		<!-- /section -->
	</div>

<?php get_footer(); ?>
