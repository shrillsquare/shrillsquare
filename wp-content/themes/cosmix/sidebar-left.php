<div id="left-sidebar" class="sidebar">
<div class="sidebar-inner">
<div class="widget-area the-icons">
<?php do_action('bp_before_left_sidebar'); ?>

<?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
<?php dynamic_sidebar( 'left-sidebar' ); ?>
<?php else: ?>

<?php $get_left_ads_code = get_theme_option('ads_left_sidebar'); if($get_left_ads_code != '') { ?>
<aside class="widget ctr-ad">
<div class="textwidget adswidget"><?php echo stripcslashes(do_shortcode($get_left_ads_code)); ?></div>
</aside>
<?php } ?>

<aside class="widget effect-1">
<h3 class="widget-title"><?php _e('Topics', TEMPLATE_DOMAIN); ?></h3>
<ul><?php wp_list_categories('orderby=name&show_count=1&title_li='); ?></ul>
</aside>

<aside class="widget effect-1">
<h3 class="widget-title"><?php _e('Archives', TEMPLATE_DOMAIN); ?></h3>
<ul><?php wp_get_archives('type=monthly&limit=12&show_post_count=1'); ?></ul>
</aside>

<?php endif; ?>

</div>
</div><!-- SIDEBAR-INNER END -->
</div><!-- LEFT SIDEBAR END -->