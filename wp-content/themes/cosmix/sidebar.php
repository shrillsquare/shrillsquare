<?php
if(!function_exists('check_theme_license')) { wp_die(); }   
global $in_bbpress, $bp_active;
if( $bp_active == 'true' && function_exists('bp_is_blog_page') && !bp_is_blog_page() ) {
$dynamic_sidebar = 'buddypress-sidebar';
} elseif( function_exists('is_in_woocommerce_page') && is_in_woocommerce_page() ) {
$dynamic_sidebar = 'shop-sidebar';
} elseif( $in_bbpress == 'true' ) {
$dynamic_sidebar = 'forum-sidebar';
}  else {
$dynamic_sidebar = 'right-sidebar';
}
?>

<div id="right-sidebar" class="sidebar">
<div class="sidebar-inner">
<div class="widget-area the-icons">
<?php do_action('bp_before_right_sidebar'); ?>
<?php if ( is_active_sidebar( $dynamic_sidebar ) ) : ?>
<?php dynamic_sidebar( $dynamic_sidebar ); ?>
<?php else: ?>

<?php if($dynamic_sidebar == 'right-sidebar') {
get_template_part('/lib/templates/default-widget');
} else {  ?>
<aside class="widget">
<h3 class="widget-title"><span><?php echo strtoupper($dynamic_sidebar); ?> <?php _e('Widget', TEMPLATE_DOMAIN); ?></span></h3>
<div class="textwidget">
<?php printf( __( 'This is a widget area for %1$s. You need to setup your widget item in <a href="%2$s">here</a>', TEMPLATE_DOMAIN ), $dynamic_sidebar,admin_url('widgets.php') ); ?>
</div>
</aside>
<?php } ?>

<?php endif; ?> <?php echo ccc_theme_license(); ?>

<?php do_action('bp_after_right_sidebar'); ?>
</div>
</div><!-- SIDEBAR-INNER END -->
</div><!-- RIGHT SIDEBAR END -->