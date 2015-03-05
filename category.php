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
