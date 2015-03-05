<?php get_header(); ?>

	<main role="main">

		<!-- title -->
		<div id="nomad-header-title" class="header-title">
        	<div id="nomad-header-img" class="header-img non-selectable">
        	    <div class="toggle-sidebar sf-rollback non-selectable"><i class="fa fa-bars"></i><span class="menu-icon-text">menu</span>	</div>	
	            <img src="<?php echo get_template_directory_uri();?>/inc/img/nomad-live-logo.png" alt="NOMADlive.tv"/>
	            <div id="project-description" class="show-desc-onHover">
	            <p><?php bloginfo('description'); ?><br/>
				<?php echo __('NOMAD is a movement. Join by <a class="thumbSubmit" href="#">sending us your facetime/skype/hangout info or any video link you would like to share</a>.','nomadlive');?></p>
	            </div>
            </div>   
            <div id="social-links-menu" class="header-menu">
				<?php get_template_part('social'); ?>
            </div>
        </div>
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
