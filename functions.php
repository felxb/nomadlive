<?php
/*
    Theme Name: NOMADlive
    Theme URI: http://nomadlive.tv
    Description: NOMAD Live Theme
    Version: 1.0
    Author: Felix Brochier (@felixbroc)
    Author URI: http://shufflenote.ca
    License: MIT
    License URI: http://opensource.org/licenses/mit-license.php
 */

/*------------------------------------*\
    Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('videoThumb', 640, 360, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('nomadlive', get_template_directory() . '/languages');
}

/*------------------------------------*\
    Functions
\*------------------------------------*/

// HTML5 Blank navigation
function nomadlive_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => 'Main Menu',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}



// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'nomadlive'), // Main Navigation
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}


/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Change posts to stories
add_action( 'admin_menu', 'change_post_menu_label' );
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Scenes';
    $submenu['edit.php'][5][0] = 'Scenes';
    $submenu['edit.php'][10][0] = 'Add New';
    echo '';
}

add_action('init', 'renameCategory');
function renameCategory() {

    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Scenes';
    $labels->singular_name = 'Scene';
    $labels->add_new = 'Add Scene';
    $labels->add_new_item = 'Add Scene';
    $labels->edit_item = 'Edit Scenes';
    $labels->new_item = 'Scene';
    $labels->view_item = 'View Scene';
    $labels->search_items = 'Search Scenes';
    $labels->not_found = 'No Scenes found';
    $labels->not_found_in_trash = 'No Scenes found in Trash';

    global $wp_taxonomies;
    $cat = $wp_taxonomies['category'];
    $cat->label = 'Stories';
    $search = array('Categories', 'Category', 'category');
    $replace = array('Stories', 'Story', 'story');
    foreach($cat->labels as $key=>$label){
        //search and replace category with new TAX labels
        $label = str_replace($search, $replace, $label);

        //Update the labels with new values
        $wp_taxonomies['category']->labels->$key = $label;
    }

    $post_tag = $wp_taxonomies['post_tag'];
    $post_tag->label = 'Channels';
    $search = array('Tags', 'Tag', 'tag');
    $replace = array('Channels', 'Channel', 'channel');
    foreach($post_tag->labels as $key=>$label){
        //search and replace category with new TAX labels
        $label = str_replace($search, $replace, $label);

        //Update the labels with new values
        $wp_taxonomies['post_tag']->labels->$key = $label;
    }

}

add_filter( 'pre_option_category_base', 'nomadlive_change_category_base' );
function nomadlive_change_category_base( $value ) {
      return 'story';
}

add_filter( 'pre_option_tag_base', 'nomadlive_change_tag_base' );
function nomadlive_change_tag_base( $value ) {
   return 'channel';

}
//multilingual search
// add_action( 'pre_get_posts', 'nomadlive_multilingual_site' );

// function nomadlive_multilingual_site($query)
// {
// if ( $query->is_search() || $query->is_archive() || $query->is_category() || $query->is_tag() ) {
//         $query->set( 'suppress_filters', true );
//     }
// }

// Pagination
add_action('init', 'nomadlive_pagination');
function nomadlive_pagination()
{
    global $wp_query;
    $big = 3;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages

    ));
}

//change contact form spinner
add_filter('wpcf7_ajax_loader', 'my_wpcf7_ajax_loader');
function my_wpcf7_ajax_loader () {
    return  get_template_directory_uri(). '/inc/img/ajax-loader.gif';
}


// Custom Ajax Call
add_action( 'init', 'nomadlive_script_enqueuer' );

function nomadlive_script_enqueuer() {
    wp_enqueue_script("jquery");
    wp_enqueue_script("froogaloop2","//f.vimeocdn.com/js/froogaloop2.min.js",array('jquery'));
    wp_enqueue_script("modernizr",get_template_directory_uri()."/inc/js/modernizr.min.js",array('jquery'));

    wp_register_script( "nomadlive", get_template_directory_uri()."/inc/js/custom.js", array('jquery','froogaloop2','modernizr') );
    wp_localize_script( 'nomadlive', 'nomadliveAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        
    wp_enqueue_script("nomadlive");
}

add_action( 'wp_ajax_nopriv_nomadlive_refresh_lang', 'nomadlive_refresh_lang_callback' );
add_action( 'wp_ajax_nomadlive_refresh_lang', 'nomadlive_refresh_lang_callback' );
function nomadlive_refresh_lang_callback() {
    global $wpdb;
    if ( !wp_verify_nonce( $_REQUEST['nonce'], "nomadlive_refresh_lang_nonce")) {
      exit("Menu could not be loaded.");
    }  
    if($_POST['videoID']) {
        $videoID = $_POST['videoID'];
        if(!empty($videoID)){
            $languages = icl_get_languages('skip_missing=1');
            $langs = "<ul>";
            foreach($languages as $l){
                $link = get_permalink(icl_object_id($videoID,"post",true,$l["language_code"]));
                $langs .= '<li class="icl-'.$l['language_code'].'"><a href="'.$link.'"  class="'.(($l['active']==1)?"lang_sel_sel":"lang_sel_other").'">'.$l['translated_name'].'</a></li>';
            }
            $langs .="</ul>";
            echo $langs;
        }
    }
    wp_die();
 }

//search only posts
function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','SearchFilter');

//Custom Shortcodes
function nomadlive_stories( $atts ) {
    $stories = get_categories();
    $storiesString = "<ul class='section story-list'>";
    foreach ($stories as $story) {
        $firstPostInCat = new WP_Query('cat='.$story->term_id.'&showposts=1');
        while ($firstPostInCat->have_posts()) : $firstPostInCat->the_post();
             $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'videoThumb' );
             $thumbnailUrl = $thumb['0']; 
        endwhile;
        $storiesString .= "<li class='span_1_of_4 col non-selectable'>";
        $storiesString .= "<a href='".icl_get_home_url().get_option("category_base")."/".$story->slug."'>";
        $storiesString .= "<img src='".$thumbnailUrl."'/>";
        $storiesString .= "<div class='story-title'>";
        $storiesString .= $story->name;
        $storiesString .= "</div>";
        $storiesString .= "</a>";
        $storiesString .= "</li>";
    }
    $storiesString .= "</ul>";
    return $storiesString;
}
add_shortcode( 'nomadlive_stories', 'nomadlive_stories' );

function nomadlive_home_url( $atts ) {
    return icl_get_home_url();
}
add_shortcode( 'home_url', 'nomadlive_home_url' );

function nomadlive_channel_logos( $atts ) {
    $logos="";
    $taxonomies = array( 
        'post_tag',
    );

    $args = array(
        'orderby'           => 'name', 
        'order'             => 'ASC',
    ); 

    $terms = get_terms($taxonomies, $args); 
    $logos.= "<div class='logos-shortcode-container'>";       
    foreach($terms as $term){
        
        if(get_field('display_channel_on_homepage', "post_tag_".$term->term_id)){

            if(get_field('channel_logo',"post_tag_".$term->term_id)){
                $imgID=get_field('channel_logo',"post_tag_".$term->term_id);
                $url = wp_get_attachment_image_src( $imgID, 'large' ); 
                $url = $url['0']; 
                $channelLink= get_field('channel_external_link',"post_tag_".$term->term_id);
                $target=($channelLink?"_blank":"_self");
                $channelLink = ($channelLink?$channelLink:get_bloginfo('url')."/channel/".$term->slug);
                $logos.= '<a href="'.$channelLink.'" target="'.$target.'">';
                $logos.= '<img class="logo-img" title="'.$term->name.'" id="logo-'.$term->slug.'" src="'.$url.'"/>';
                $logos.= '</a>';
            }
        }
    }
    $logos.='</div>';
    return $logos;
}
add_shortcode( 'channel_logos', 'nomadlive_channel_logos' );



