<?php 
/*
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 */
$i=1;?>
<article class="thumb col span_1_of_4" id="thumb0">
    <a href="#" data-link="" data-type="" data-content="<iframe width='660' height='387' src='http://www.ustream.tv/embed/18155672?ub=85a901&amp;lc=85a901&amp;oc=ffffff&amp;uc=ffffff&amp;v=3&amp;wmode=direct&amp;autoplay=true' scrolling='no' frameborder='0' style='border: 0px none transparent;'></iframe>">
        <img src="<?php echo get_template_directory_uri();?>/inc/img/to-live.png"/>
    </a>
</article>
    
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<!-- article -->
<article class="thumb col span_1_of_4" id="thumb<?php echo $i;?>">
    <?php $video_type=get_field("video_type");?>
    <?php if($video_type=="vimeo") {?>    
    <a href="<?php the_permalink(); ?>" data-type="<?php echo $video_type;?>" data-content="<iframe id='vimeo<?php echo $i;?>' src='//player.vimeo.com/video/<?php echo get_field("vimeo_id"); ?>?autoplay=1&api=1&player_id=vimeo<?php echo $i;?>' width='500' height='281' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>">
        <div class="video-title-container">
        	<div class="video-title">
        		<?php the_title(); ?>
        	</div>
        </div>
		<div class="thumb-img-container">
			<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'videoThumb' );?>
			<?php $url = $thumb['0']; ?>
            <img src="<?php echo $url;?>" class="poster"/>
			<?php else: ?>
            <img src="<?php echo get_template_directory_uri()?>/inc/img/nomad-live-screenshot.jpg" class="poster"/>
			<?php endif; ?>
		</div>
    </a>
    <?php } else if($video_type=="youtube" {?>    
    <a href="<?php the_permalink(); ?>" data-type="<?php echo $video_type;?>" data-content='<iframe width="560" id="youtube<?php echo $i;?>" height="315" src="https://www.youtube.com/embed/<?php echo get_field("vimeo_id"); ?>" frameborder="0" allowfullscreen></iframe>'>
        <div class="video-title-container">
        	<div class="video-title">
        		<?php the_title(); ?>
        	</div>
        </div>
		<div class="thumb-img-container">
			<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'videoThumb' );?>
			<?php $url = $thumb['0']; ?>
            <img src="<?php echo $url;?>" class="poster"/>
			<?php else: ?>
            <img src="<?php echo get_template_directory_uri()?>/inc/img/nomad-live-screenshot.jpg" class="poster"/>
			<?php endif; ?>
		</div>
    </a>
	<?php } ?>
</article> 
<!-- /article -->   
<?php $i++;?>     
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>
<div class="thumbLink thumbSubmit col span_1_of_4">
    <a href="#" target="_blank" id="NomadLink">
        <img src="<?php echo get_template_directory_uri();?>/inc/img/submit-video.png"/>
    </a>
</div> 
