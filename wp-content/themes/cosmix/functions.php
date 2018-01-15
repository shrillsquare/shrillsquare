<?php
////////////////////////////////////////////////////////////////////////////////
// Global Define
////////////////////////////////////////////////////////////////////////////////
// do not change this, its for translation and options string
define('TEMPLATE_DOMAIN', 'cosmix');
// do not change this, its for translation and options string
define('TEMPLATE_OPTIONS', TEMPLATE_DOMAIN . '_theme_options');
//define('SUPER_STYLE', 'yes');

////////////////////////////////////////////////////////////////////////////////
// Global Setup
////////////////////////////////////////////////////////////////////////////////
function mp_add_theme_setup() {
load_theme_textdomain( TEMPLATE_DOMAIN, get_template_directory() . '/languages' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( "title-tag" );
add_theme_support( 'html5' );
add_editor_style();
if( class_exists('woocommerce') ) { add_theme_support('woocommerce'); }

// Add support for custom background.
$custom_background_support = array(
	'default-color'          => '',
	'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $custom_background_support );


// Add support for custom headers.
$custom_header_support = array(
		'default-text-color' => '',
        'default-image' => get_template_directory_uri(). '/images/header.jpg',
        'header-text'  => false,
		'width' => 1600,
		'height' => 300,
		'flex-height' => true,
	    'random-default'	=> false,
		'wp-head-callback' => '',
		'admin-head-callback' => '',
		'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $custom_header_support );

remove_theme_support( 'custom-background' ); 

if ( ! isset( $content_width ) ) $content_width = 550;

}
add_action( 'after_setup_theme', 'mp_add_theme_setup' );


if ( function_exists( 'register_nav_menus' ) ) {
add_theme_support( 'menus' );
register_nav_menus( array(
'primary' => __( 'Primary Menu', TEMPLATE_DOMAIN ),
'footer' => __( 'Footer Menu', TEMPLATE_DOMAIN ),
));
function revert_wp_menu_page($args) {
$pages_args = array(
		'depth'      => 0,
		'echo'       => false,
		'exclude'    => '',
		'title_li'   => ''
	);
$menu = wp_page_menu( $pages_args );
$menu = str_replace( array( '<div class="menu"><ul>', '</ul></div>' ), array( '<ul class="sf-menu">', '</ul>' ), $menu );
echo $menu;
 ?>
<?php }

if ( !function_exists( 'wp_dtheme_page_menu_args' ) ) :
function wp_dtheme_page_menu_args( $args ) {
$args['show_home'] = __('Home',TEMPLATE_DOMAIN);
return $args; }
add_filter( 'wp_page_menu_args', 'wp_dtheme_page_menu_args' );
endif;
}

function theme_custom_style_init() {
global $theme_version,$is_IE;
if($is_IE): ?>
<style type="text/css">
#main-navigation,.post-meta,a.button,input[type='button'], input[type='submit'],h1.post-title,.wp-pagenavi a,#sidebar .item-options,.iegradient,h3.widget-title,.footer-bottom,.sf-menu .current_page_item a, .sf-menu .current_menu_item a, .sf-menu .current-menu-item a,.sf-menu .current_page_item a:hover, .sf-menu .current_menu_item a:hover, .sf-menu .current-menu-item a:hover,button, a.button, input[type=submit], input[type=button], input[type=reset], ul.button-nav li a, div.generic-button a, .comment-reply-link {filter: none !important;}
</style>
<?php endif; ?>
<?php print "<style type='text/css' media='all'>"; ?>
<?php get_template_part ( '/lib/options/options-css' ); ?>
<?php if( get_theme_option('custom_css') ): ?><?php echo get_theme_option('custom_css'); ?><?php endif; ?>
<?php print "</style>"; ?>
<?php $twitter_id = get_theme_option('twitter_widget_id'); if($twitter_id): ?>
<script> jQuery(document).ready(function() {twitterFetcher.fetch( '<?php echo $twitter_id; ?>', 'twitter-news', 3, true);});</script>
<?php endif; ?>
<?php }
add_action('wp_head','theme_custom_style_init');


///////////////////////////////////////////////////////////////////////////////
// Load Theme Default Fonts
///////////////////////////////////////////////////////////////////////////////
/*---------------------------load google webfont style--------------------------------------*/
function mp_theme_load_gwf_styles() {

if( get_theme_option('body_font') == 'Choose a font' || get_theme_option('body_font') == '') {
wp_register_style('default_body_gwf', 'http://fonts.googleapis.com/css?family=Roboto%3A100%2C200%2C300%2C400%2C600%2C700%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C600italic%2C700italic%2C900italic&subset=latin%2Ccyrillic-ext%2Clatin-ext%2Ccyrillic%2Cgreek%2Cgreek-ext%2Cvietnamese');
wp_enqueue_style( 'default_body_gwf');
}

if( get_theme_option('headline_font') == 'Choose a font' || get_theme_option('headline_font') == '') {
wp_register_style('default_headline_gwf', 'http://fonts.googleapis.com/css?family=Roboto+Condensed%3A100%2C200%2C300%2C400%2C600%2C700%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C600italic%2C700italic%2C900italic&subset=latin%2Ccyrillic-ext%2Clatin-ext%2Ccyrillic%2Cgreek%2Cgreek-ext%2Cvietnamese');
//wp_enqueue_style( 'default_headline_gwf');
}

if( get_theme_option('navigation_font') == 'Choose a font' || get_theme_option('navigation_font') == '') {
wp_register_style('default_navigation_gwf', 'http://fonts.googleapis.com/css?family=Maven+Pro%3A100%2C200%2C300%2C400%2C600%2C700%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C600italic%2C700italic%2C900italic&subset=latin%2Ccyrillic-ext%2Clatin-ext%2Ccyrillic%2Cgreek%2Cgreek-ext%2Cvietnamese');
//wp_enqueue_style( 'default_navigation_gwf');
}

}
add_action('wp_enqueue_scripts', 'mp_theme_load_gwf_styles');


///////////////////////////////////////////////////////////////////////////////
// Load Theme Styles and Javascripts
///////////////////////////////////////////////////////////////////////////////
/*---------------------------load styles--------------------------------------*/
if ( ! function_exists( 'theme_load_styles' ) ) :
function theme_load_styles() {
global $theme_version,$is_IE;
wp_enqueue_style( 'parent-style', get_template_directory_uri(). '/style.css', array(), $theme_version );
wp_enqueue_style( 'superfish', get_template_directory_uri(). '/lib/scripts/superfish-menu/css/superfish.css', array(), $theme_version );

if ( ( is_home() || is_front_page() || is_page_template('page-templates/template-blog.php') ) && get_theme_option('slider_on') == 'Enable'  ) {
wp_enqueue_style( 'jssor-css', get_template_directory_uri(). '/lib/scripts/jssor/jssor-css.css', array(), $theme_version );
}

wp_enqueue_style( 'font-awesome-builtin', get_template_directory_uri(). '/lib/scripts/font-awesome/css/font-awesome.css', array(), $theme_version );
?>
<?php
}
endif;
add_action( 'wp_enqueue_scripts', 'theme_load_styles' );

/*---------------------------load js scripts--------------------------------------*/
if ( ! function_exists( 'theme_load_scripts' ) ) :
function theme_load_scripts() {
global $theme_version,$is_IE;
wp_enqueue_script("jquery");
wp_enqueue_script('hoverIntent');
wp_enqueue_script('modernizr', get_template_directory_uri() . '/lib/scripts/modernizr/modernizr.js', false, $theme_version, true );
if($is_IE):
wp_enqueue_script('html5shim-js', get_template_directory_uri() . '/lib/scripts/html5.js', false,$theme_version, false );
endif;
wp_enqueue_script('superfish-js', get_template_directory_uri() . '/lib/scripts/superfish-menu/js/superfish.js', false, $theme_version, true );
wp_enqueue_script('supersub-js', get_template_directory_uri() . '/lib/scripts/superfish-menu/js/supersubs.js', false, $theme_version, true );
wp_enqueue_script('twitterfetch-js', get_template_directory_uri() . '/lib/scripts/twitterfetch.js', false,$theme_version, true );

if ( ( is_home() || is_front_page() || is_page_template('page-templates/template-blog.php') ) && get_theme_option('slider_on') == 'Enable' ) {
wp_enqueue_script('jssor-js', get_template_directory_uri(). '/lib/scripts/jssor/js/jssor.js', false, $theme_version, true );
wp_enqueue_script('jssor-slider-js', get_template_directory_uri(). '/lib/scripts/jssor/js/jssor.slider.js', false, $theme_version, true );
}

wp_enqueue_script('custom-js', get_template_directory_uri() . '/lib/scripts/custom.js', false,$theme_version, true );
if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php }
endif;
add_action( 'wp_enqueue_scripts', 'theme_load_scripts' );


////////////////////////////////////////////////////////////////////////////////
// Add Theme Custom Functions
////////////////////////////////////////////////////////////////////////////////
include( get_template_directory() . '/lib/functions/theme-functions.php' );
include( get_template_directory() . '/lib/functions/option-functions.php' );
include( get_template_directory() . '/lib/functions/widget-functions.php' );
include( get_template_directory() . '/lib/functions/hook-functions.php' );
include( get_template_directory() . '/lib/functions/shortcode-functions.php' );

////////////////////////////////////////////////////////////////////////////////
// Add Theme Extra Functions
////////////////////////////////////////////////////////////////////////////////
if ( class_exists('woocommerce') && file_exists( get_template_directory() . '/lib/woocommerce/woo-functions.php' ) ) {
include_once( get_template_directory() . '/lib/woocommerce/woo-functions.php' );
}
if ( class_exists('buddypress') && file_exists( get_template_directory() . '/lib/buddypress/bp-theme-functions.php' ) ) {
include_once( get_template_directory() . '/lib/buddypress/bp-theme-functions.php' );
}
if ( class_exists('bbpress') && file_exists( get_template_directory() . '/lib/bbpress/bb-theme-functions.php' ) ) {
include_once( get_template_directory() . '/lib/bbpress/bb-theme-functions.php' );
}

?>