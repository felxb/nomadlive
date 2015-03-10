<?php /*In case of nothing*/?>
			<!-- nothing -->
		    <div class="nomad-live-nothing">
		        <h2><?php _e( 'Oops. We cannot find what you are looking for. Try (another) search ?', 'nomadlive' ); ?></h2>
		        <?php get_search_form( true ); ?>
		    </div>

		    <?php $temp_query = $wp_query; ?>
			<?php query_posts(); ?>
			<?php get_template_part('loop'); ?>
			<?php $wp_query = $temp_query; ?>
			<div class="thumbLink col span_1_of_4 non-selectable">
				<a href="<?php echo icl_get_home_url();?>">
				<img src="<?php echo get_stylesheet_directory_uri();?>/inc/img/submit-video.png"/>
				</a>
			</div>

			<!-- /nothing -->
