<?php
///////////////////////////////////////////////////////////////////////////////
// woocommerce - conditional to check if woocommerce related page showed
///////////////////////////////////////////////////////////////////////////////
if( !function_exists('is_in_woocommerce_page')):
function is_in_woocommerce_page() {
return ( is_shop() || is_product_category() || is_product_tag() || is_product() || is_cart() || is_checkout() || is_account_page() ) ? true : false;
}
endif;


///////////////////////////////////////////////////////////////////////////////
// woocommerce - add before and after container class
///////////////////////////////////////////////////////////////////////////////
if (!function_exists('woocommerce_theme_before_content')) {
function woocommerce_theme_before_content() { ?>
<div id="single-content" class="content shop-content">
<div class="content-inner">
<div id="post-entry">
<section class="post-entry-inner">
<?php
}
}
if (!function_exists('woocommerce_theme_after_content')) {
function woocommerce_theme_after_content() { ?>
</section>
</div>
</div>
</div>
<?php
}
}


///////////////////////////////////////////////////////////////////////////////
// woocommerce - add head css
///////////////////////////////////////////////////////////////////////////////
function woo_wp_custom_css() {
if( function_exists('is_in_woocommerce_page') && is_in_woocommerce_page() ) { ?>
<?php print "<style type='text/css' media='all'>"; ?>
<?php if( is_cart() || is_checkout() ): ?>
#container {background: transparent none;}
.content {width:98%;padding:0%;font-size: 1.25em;}
#left-sidebar,#right-sidebar {display:none;}
<?php endif; ?>
<?php print "</style>"; ?>
<?php }
}
add_action('wp_head', 'woo_wp_custom_css', 20);



///////////////////////////////////////////////////////////////////////////////
// Load Theme Styles and Javascripts
///////////////////////////////////////////////////////////////////////////////
/*---------------------------load styles--------------------------------------*/
function mp_theme_load_woo_styles() {
global $theme_version;
wp_enqueue_style( 'custom-woo', get_template_directory_uri(). '/lib/woocommerce/woo-css.css', array(), $theme_version );
}
add_action( 'wp_enqueue_scripts', 'mp_theme_load_woo_styles' );


//remove default open and close wrapper for woocommerce
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
//add new open and close wrapper for woocommerce
add_action('woocommerce_before_main_content', 'woocommerce_theme_before_content', 10);
add_action('woocommerce_after_main_content', 'woocommerce_theme_after_content', 20);



function woo_theme_widgets_init() {
    register_sidebar(array(
    'name'=>__('Shop Sidebar', TEMPLATE_DOMAIN),
   	'id' => 'shop-sidebar',
   	'description' => __( 'Shop sidebar widget area', TEMPLATE_DOMAIN ),
	'before_widget' => '<aside id="%1$s" class="effect-1 widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title"><span>',
	'after_title' => '</span></h3>',
	));
}
add_action( 'widgets_init', 'woo_theme_widgets_init', 20 );

?>