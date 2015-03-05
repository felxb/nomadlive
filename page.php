<?php get_header(); ?>

	<main role="main">

		<!-- title -->
		<?php get_template_part('title'); ?>
		<!-- /title -->

		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>
			<?php get_template_part('nothing'); ?>
		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
