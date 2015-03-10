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

			<!-- /nothing -->
