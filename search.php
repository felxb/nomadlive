<?php get_header(); ?>
	
	<div id="main">

		<!-- title -->
		<div id="nomad-header-title" class="header-title">
        	<div id="nomad-header-img" class="header-img non-selectable">
        	    <div class="toggle-sidebar sf-rollback non-selectable"><i class="fa fa-bars"></i><span class="menu-icon-text">menu</span>	</div>	
	            
            </div>   
            <div id="social-links-menu" class="header-menu">
				<?php get_template_part('social'); ?>
            </div>
        </div>
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
				<article class="thumb col span_1_of_4 non-selectable" id="thumb0">
				    <a href="#" data-link="" data-type="live" data-content="<iframe width='660' height='387' src='http://www.ustream.tv/embed/18155672?ub=85a901&amp;lc=85a901&amp;oc=ffffff&amp;uc=ffffff&amp;v=3&amp;wmode=direct&amp;autoplay=true' scrolling='no' frameborder='0' style='border: 0px none transparent;'></iframe>">
				        <img src="<?php echo get_template_directory_uri();?>/inc/img/to-live.png"/>
				    </a>
				</article>
				<?php get_template_part('loop'); ?>
				<?php get_template_part('pagination'); ?>
			</div>
			<!-- /gallery -->
		</section>
		<!-- /section -->
	</div>

<?php get_footer(); ?>
