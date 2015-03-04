<?php $i=1;?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<!-- article -->
<article class="thumb col span_1_of_4 non-selectable" id="thumb<?php echo $i;?>">
    <?php if( get_field( "video_type" ) ): $video_type=get_field("video_type");endif;?>
    <?php if($video_type=="vimeo") {?>    
    <a href="<?php the_permalink(); ?>" data-type="<?php echo $video_type;?>" data-content="<iframe id='vimeo<?php echo $i;?>' src='//player.vimeo.com/video/<?php echo get_field("vimeo_id"); ?>?autoplay=1&api=1&player_id=vimeo<?php echo $i;?>' width='500' height='281' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>">
        <div class="video-title-container non-selectable">
            <div class="video-title">
                <?php the_title(); ?>
            </div>
        </div>
        <div class="thumb-img-container non-selectable">
            <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
            <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'videoThumb' );?>
            <?php $url = $thumb['0']; ?>
            <img src="<?php echo $url;?>" class="poster"/>
            <?php else: ?>
            <img src="<?php echo get_template_directory_uri()?>/inc/img/nomad-live-screenshot.jpg" class="poster"/>
            <?php endif; ?>
        </div>
    </a>
    <?php } else if($video_type=="youtube") {?>    
    <a href="<?php the_permalink(); ?>" data-type="<?php echo $video_type;?>" data-content='<iframe width="560" id="youtube<?php echo $i;?>" height="315" src="https://www.youtube.com/embed/<?php echo get_field("vimeo_id"); ?>" frameborder="0" allowfullscreen></iframe>'>
        <div class="video-title-container non-selectable">
            <div class="video-title">
                <?php the_title(); ?>
            </div>
        </div>
        <div class="thumb-img-container non-selectable">
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

<?php else: ?>

    <!-- article -->
    <article>
        <h2><?php _e( 'Sorry, nothing to display.', 'nomadlive' ); ?></h2>
    </article>
    <!-- /article -->

<?php endif; ?>
