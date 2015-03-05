<?php get_header(); ?>
	
	<div id="main">

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
		<!-- titletest -->
		<!-- /titletest -->

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
