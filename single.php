<?php get_header(); ?>
	
	<div id="main">

		<!-- title -->
		<?php get_template_part('title'); ?>
		<!-- /title -->

		<!-- player -->
		<?php get_template_part('player'); ?>
		<!-- /player -->

		<!-- ticker -->
        <div id="ticker-container">
			<?php if(function_exists('ditty_news_ticker')){ditty_news_ticker(39);} ?>
		</div>
		<!-- /ticker -->

		<!-- section -->
		<section>
			<!-- gallery -->
			<div id="gallery" class="section group">
			<?php if(isset($_REQUEST["story"])) {$args .= "category_name=".$_REQUEST["story"];}?>
			<?php if(isset($_REQUEST["channel"])) {$args .= "tag=".$_REQUEST["channel"];}?>
			
			<?php $temp_query = $wp_query; ?>
			<?php query_posts($args); ?>
			<?php get_template_part('loop'); ?>
			<?php $wp_query = $temp_query; ?>

			</div>
			<!-- /gallery -->
		</section>
		<!-- /section -->
	</div>

<?php get_footer(); ?>
