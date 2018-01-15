<?php
///////////////////////////////////////////////////////////////////////////////
// Check if BBPress installed and if in bbpress forum page
//////////////////////////////////////////////////////////////////////////////
function theme_check_bpress_init() {
global $in_bbpress;
$forum_root_slug = get_option('_bbp_forum_slug');
$topic_root_slug = get_option('_bbp_topic_slug');
$reply_root_slug = get_option('_bbp_reply_slug');
$tag_root_slug = get_option('_bbp_tag_slug');
if( get_post_type() == 'forum' || is_page('forums') || is_page('support') || get_post_type() == $forum_root_slug ||
get_post_type() == $topic_root_slug || get_post_type() == $reply_root_slug || get_post_type() == $tag_root_slug ) {
$in_bbpress = 'true';
}
//echo $in_bbpress;
}
add_action('wp_head','theme_check_bpress_init');


///////////////////////////////////////////////////////////////////////////////
// Load Theme Styles and Javascripts
///////////////////////////////////////////////////////////////////////////////
/*---------------------------load styles--------------------------------------*/
function mp_theme_load_bb_styles() {
global $theme_version;
wp_enqueue_style( 'custom-bb', get_template_directory_uri(). '/lib/bbpress/bb-css.css', array(), $theme_version );
}
add_action( 'wp_enqueue_scripts', 'mp_theme_load_bb_styles' );


function bb_theme_widgets_init() {
    register_sidebar(array(
    'name'=>__('Forum Sidebar', TEMPLATE_DOMAIN),
   	'id' => 'forum-sidebar',
   	'description' => __( 'Forum sidebar widget area', TEMPLATE_DOMAIN ),
	'before_widget' => '<aside id="%1$s" class="effect-1 widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title"><span>',
	'after_title' => '</span></h3>',
	));
}
add_action( 'widgets_init', 'bb_theme_widgets_init', 20 );


?>