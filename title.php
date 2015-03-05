<?php if (is_category()) { ?>
		<div id="category-header-title" class="header-title">
		
        	<div id="category-header-img" class="header-img non-selectable">

	    	    <div class="toggle-sidebar sf-rollback non-selectable">
	    	    	<i class="fa fa-bars"></i>
	    	    	<span class="menu-icon-text">menu</span>
	    	    </div>	

				<?php $queried_object = get_queried_object(); ?>
				<?php $taxonomy = $queried_object->taxonomy;?>
				<?php $term_id = $queried_object->term_id;?>  
				<?php $imgHeader = get_field('story_header', $queried_object);?>

			    <?php if( $imgHeader ){?>
        		<?php $url = wp_get_attachment_image_src( $imgHeader, 'large' );?>
        		<?php $url = $url['0']; ?>
	            <img class="category-header-img" title="<?php single_cat_title(); ?>" src="<?php echo $url;?>"/>
		        <?php } else {?>
				<div class="default-category-title">
					<?php single_cat_title(); ?>
					<?php echo "<span class='nomad-x'>x</span>";?>
		            <img src="<?php echo get_template_directory_uri();?>/inc/img/nomad-live-logo-cropped.png"/>
	            </div>
		        <?php }?>
	            <div id="project-description">
		            <?php $description=category_description();?>
		            <p><?php echo ($description?$description:bloginfo('description'));?><br/>
					<?php echo __('NOMAD is a movement. Join by <a class="thumbSubmit" href="#">sending us your facetime/skype/hangout info or any video link you would like to share.</a>.','nomadlive');?>
					</p>
	            </div>
            </div>   
            <div id="logos" class="header-menu">
				<?php $logosArray = get_field('logos_story', $queried_object);?>
			    <?php if( $logosArray ){?>
					<?php foreach ($logosArray as $key => $logo){ ?>
						<?php $imgID= get_field('channel_logo',"post_tag_".$logo);?>
						<?php if ($imgID) { ?>
						<?php $url = wp_get_attachment_image_src( $imgID, 'large' ); ?>
						<?php $url = $url['0']; ?>
						<?php $channelLink= get_field('channel_external_link',"post_tag_".$logo);?>
						<?php $target=($channelLink?"_blank":"_self");?>
						<?php $channelLink = ($channelLink?$channelLink:get_bloginfo('url')."/channel/".get_tag($logo)->slug);?>
							<a href="<?php echo $channelLink;?>" target="<?php echo $target;?>">
					            <img class="logo-img" title="<?php echo get_tag($logo)->name; ?>" id="logo-<?php echo get_tag($logo)->slug; ?>" src="<?php echo $url;?>"/>
				            </a>
						<?php } ?>
					<?php } ?>
				<?php } else { get_template_part('social');} ?>
            </div>
        </div>

<?php } else if (is_tag()) { ?>
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
<?php } else if (is_search()) { ?>
		<div id="search-header-title" class="header-title">
        	<div id="search-header-img" class="header-img non-selectable">
        	    <div class="toggle-sidebar sf-rollback non-selectable">
        	    	<i class="fa fa-bars"></i>
        	    	<span class="menu-icon-text">menu</span>
        	    </div>	
	            <div class="default-search-title">
					<span class="search-query-title"><?php echo get_search_query(); ?></span>
					<?php echo "<span class='nomad-x'>x</span>";?>
		            <img src="<?php echo get_template_directory_uri();?>/inc/img/nomad-live-logo-cropped.png"/>
	            </div>
            </div>   
            <div id="social-links-menu" class="header-menu">
				<?php get_template_part('social'); ?>
            </div>
        </div>
<?php } else { ?>
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
<?php } ?>