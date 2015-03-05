<?php if (is_category()) { ?>
<div class="player-container">
    <div class="main-player">
		<?php $displayHomeBool = get_field('display_livestream_on_story_page', $queried_object);?>
		<?php if( $displayHomeBool ){?>
            <iframe width="660" height="387" src="http://www.ustream.tv/embed/18155672?ub=85a901&amp;lc=85a901&amp;oc=ffffff&amp;uc=ffffff&amp;v=3&amp;wmode=direct&amp;autoplay=true" scrolling="no" frameborder="0" style="border: 0px none transparent;"></iframe>
        <?php } else  { ?>	
			<?php $i=1;?>
			<?php $args = array('posts_per_page' => 1, 'cat' => $term_id);?>
			<?php $posts_array = get_posts( $args ); ?>
            <?php if ($posts_array):?>
            	<?php foreach($posts_array as $post){ ?>
            		<?php if ($i==1) {?>
		            	<?php if( get_field( "video_type",$post->ID ) ): ?>
			            	<?php $video_type=get_field("video_type",$post->ID);?>
			            	<div class="main-player <?php echo $video_type;?>-player">
						    <?php if($video_type=="vimeo") {?>    
				            	<iframe id='vimeo<?php echo $i;?>' src='//player.vimeo.com/video/<?php echo get_field("vimeo_id",$post->ID); ?>?autoplay=1&api=1&player_id=vimeo<?php echo $i;?>' width='500' height='281' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				            <?php } else if ($video_type=="youtube") { ?>
								<iframe width="560" id="youtube<?php echo $i;?>" height="315" src="https://www.youtube.com/embed/<?php echo get_field("vimeo_id"); ?>" frameborder="0" allowfullscreen></iframe>		            
							<?php } ?>	
							</div>
		            	<?php endif;?>
						<?php $i++;?>
					<?php } ?>
		        <?php } ?>	
            <?php endif; ?>	
        <?php } ?>	
    </div>
</div>
<?php } else if (is_tag()) { ?>
<div class="player-container">
    
		<?php $displayHomeBool = get_field('display_livestream_on_channel_page', $queried_object);?>
		<?php if( $displayHomeBool ){?>
			<div class="main-player">
	            <iframe width="660" height="387" src="http://www.ustream.tv/embed/18155672?ub=85a901&amp;lc=85a901&amp;oc=ffffff&amp;uc=ffffff&amp;v=3&amp;wmode=direct&amp;autoplay=true" scrolling="no" frameborder="0" style="border: 0px none transparent;"></iframe>
	        </div>
        <?php } else  { ?>
			
			<?php $i=1;?>
			<?php $args = array('posts_per_page' => 1, 'cat' => $term_id);?>
			<?php $posts_array = get_posts( $args ); ?>
            <?php if ($posts_array):?>
            	<?php foreach($posts_array as $post){ ?>
            		<?php if ($i==1) {?>
		            	<?php if( get_field( "video_type",$post->ID ) ): ?>
			            	<?php $video_type=get_field("video_type",$post->ID);?>
			            	<div class="main-player <?php echo $video_type;?>-player">
						    <?php if($video_type=="vimeo") {?>    
				            	<iframe id='vimeo<?php echo $i;?>' src='//player.vimeo.com/video/<?php echo get_field("vimeo_id",$post->ID); ?>?autoplay=1&api=1&player_id=vimeo<?php echo $i;?>' width='500' height='281' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				            <?php } else if ($video_type=="youtube") { ?>
								<iframe width="560" id="youtube<?php echo $i;?>" height="315" src="https://www.youtube.com/embed/<?php echo get_field("vimeo_id"); ?>" frameborder="0" allowfullscreen></iframe>		            
							<?php } ?>	
							</div>
		            	<?php endif;?>
						<?php $i++;?>
					<?php } ?>
		        <?php } ?>	
            <?php endif; ?>	
        <?php } ?>	
</div>
<?php } else { ?>
<!-- player-container -->
<div class="player-container">
    <div class="main-player live-player">
        <iframe width="660" height="387" src="http://www.ustream.tv/embed/18155672?ub=85a901&amp;lc=85a901&amp;oc=ffffff&amp;uc=ffffff&amp;v=3&amp;wmode=direct&amp;autoplay=true" scrolling="no" frameborder="0" style="border: 0px none transparent;"></iframe>
    </div>
</div>
<!-- /player-container -->
<?php } ?>