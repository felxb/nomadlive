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
				<?php get_template_part('loop'); ?>
				<?php get_template_part('pagination'); ?>
			</div>
			<!-- /gallery -->
		</section>
		<!-- /section -->
	</div>

<?php get_footer(); ?>
