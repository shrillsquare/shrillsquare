<?php
///////////////////////////////////////////////////////////////////////////////
// Check if BuddyPress is installed
//////////////////////////////////////////////////////////////////////////////
if ( function_exists( 'bp_is_active' ) ) {
global $blog_id, $current_blog;
if ( is_multisite() ) {
//check if multiblog
if ( defined( 'BP_ENABLE_MULTIBLOG' ) && BP_ENABLE_MULTIBLOG ) {
$bp_active = 'true';
} else if ( defined( 'BP_ROOT_BLOG' ) && BP_ROOT_BLOG == $current_blog->blog_id ) {
$bp_active = 'true';
}
else if ( defined( 'BP_ROOT_BLOG' ) && ( $blog_id != 1 ) ) {
$bp_active = 'false';
}
} else {
$bp_active = 'true';
}
}
else {
$bp_active = 'false';
}



///////////////////////////////////////////////////////////////////////////////
// Load Theme Styles and Javascripts
///////////////////////////////////////////////////////////////////////////////
/*---------------------------load styles--------------------------------------*/
function mp_theme_load_bp_styles() {
global $theme_version;
wp_enqueue_style( 'theme-bp', get_template_directory_uri(). '/lib/buddypress/bp-theme-css.css', array(), $theme_version );
wp_enqueue_style( 'custom-bp', get_template_directory_uri(). '/lib/buddypress/bp-custom-css.css', array(), $theme_version );
}
add_action( 'wp_enqueue_scripts', 'mp_theme_load_bp_styles' );



function add_bplogin_before() {echo '<div class="extra-block">';}
add_action('bp_before_login_widget_loggedin','add_bplogin_before');
add_action('bp_before_login_widget_loggedout','add_bplogin_before');
function add_bplogin_after() {echo '</div>';}
add_action('bp_after_login_widget_loggedin','add_bplogin_after');
add_action('bp_after_login_widget_loggedout','add_bplogin_after');

function bp_theme_widgets_init() {
    register_sidebar(array(
    'name'=>__('BuddyPress Sidebar', TEMPLATE_DOMAIN),
   	'id' => 'buddypress-sidebar',
   	'description' => __( 'BuddyPress sidebar widget area', TEMPLATE_DOMAIN ),
	'before_widget' => '<aside id="%1$s" class="effect-1 widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title"><span>',
	'after_title' => '</span></h3>',
	));
}
add_action( 'widgets_init', 'bp_theme_widgets_init', 20 );


?>