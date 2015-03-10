<!-- to live -->
<?php if (is_tag()){?>
        <?php $queried_object = get_queried_object(); ?>
        <?php $displayHomeBool = get_field('display_livestream_on_channel_page', $queried_object);?>
        <?php if( $displayHomeBool ){?>
        <div class="thumb col span_1_of_4 non-selectable" id="thumb0">
            <a href="<?php bloginfo("url");?>?channel=<?php echo $queried_object->slug; ?>" data-link="<?php bloginfo('url');?>" data-type="ustream" data-content="<iframe width='660' height='387' src='http://www.ustream.tv/embed/18155672?ub=85a901&amp;lc=85a901&amp;oc=ffffff&amp;uc=ffffff&amp;v=3&amp;wmode=direct&amp;autoplay=true' scrolling='no' frameborder='0' style='border: 0px none transparent;'></iframe>">
                <div class="video-title-container nomad-live-title non-selectable">
                    <div class="video-title">
                        <?php bloginfo('name'); echo " | "; bloginfo('description');?>
                    </div>
                </div>
                <div class="thumb-img-container non-selectable">
                    <img src="<?php echo get_template_directory_uri();?>/inc/img/to-live.png" alt="Livecast"/>
                </div>
            </a>
        </div>
        <?php } ?>
        <?php $context = "?channel=".$queried_object->slug;?>
<?php } else if (is_category()){?>
        <?php $queried_object = get_queried_object(); ?>
        <?php $displayHomeBool = get_field('display_livestream_on_story_page', $queried_object);?>
        <?php if( $displayHomeBool ){?>
        <div class="thumb col span_1_of_4 non-selectable" id="thumb0">
            <a href="<?php bloginfo("url");?>?story=<?php echo $queried_object->slug; ?>" data-link="<?php bloginfo('url');?>" data-type="ustream" data-content="<iframe width='660' height='387' src='http://www.ustream.tv/embed/18155672?ub=85a901&amp;lc=85a901&amp;oc=ffffff&amp;uc=ffffff&amp;v=3&amp;wmode=direct&amp;autoplay=true' scrolling='no' frameborder='0' style='border: 0px none transparent;'></iframe>">
                <div class="video-title-container nomad-live-title non-selectable">
                    <div class="video-title">
                        <?php bloginfo('name'); echo " | "; bloginfo('description');?>
                    </div>
                </div>
                <div class="thumb-img-container non-selectable">
                    <img src="<?php echo get_template_directory_uri();?>/inc/img/to-live.png" alt="Livecast"/>
                </div>
            </a>
        </div>
        <?php } ?>
        <?php $cat = get_queried_object(); ?>
        <?php $context = "?story=".$queried_object->slug;?>
<?php } else if (is_search()) {?>
<?php } else {?>
        <div class="thumb col span_1_of_4 non-selectable" id="thumb0">
            <a href="<?php bloginfo("url");?>" data-link="<?php bloginfo('url');?>" data-type="ustream" data-content="<iframe width='660' height='387' src='http://www.ustream.tv/embed/18155672?ub=85a901&amp;lc=85a901&amp;oc=ffffff&amp;uc=ffffff&amp;v=3&amp;wmode=direct&amp;autoplay=true' scrolling='no' frameborder='0' style='border: 0px none transparent;'></iframe>">
                <div class="video-title-container nomad-live-title non-selectable">
                    <div class="video-title">
                        <?php bloginfo('name'); echo " | "; bloginfo('description');?>
                    </div>
                </div>
                <div class="thumb-img-container non-selectable">
                    <img src="<?php echo get_template_directory_uri();?>/inc/img/to-live.png" alt="Livecast"/>
                </div>
            </a>
        </div>
<?php } ?>
<!-- /to live -->
