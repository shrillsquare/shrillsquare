<?php $get_right_ads_code = get_theme_option('ads_right_sidebar'); if($get_right_ads_code != '') { ?>
<aside class="widget">
<div class="textwidget adswidget"><?php echo stripcslashes(do_shortcode($get_right_ads_code)); ?></div>
</aside>
<?php } ?>

<?php if( get_theme_option('twitter_widget_id') ) { ?>
<aside class="widget effect-1" id="twitter-blk">
<h3 class="widget-title"><i class="fa fa-twitter"></i><span><?php _e('Recent Tweets', TEMPLATE_DOMAIN); ?></span></h3>
<div class="textwidget" id="twitter-news"></div>
</aside>
<?php } ?>

<aside class="widget effect-1">
<h3 class="widget-title"><?php _e('Most Commented',TEMPLATE_DOMAIN); ?></h3>
<?php get_hot_topics(10); ?>
</aside>

<aside class="widget effect-1">
<h3 class="widget-title"><span><?php _e('Tags', TEMPLATE_DOMAIN); ?></span></h3>
<div class="tagcloud"><?php wp_tag_cloud('smallest=8&largest=21&'); ?></div>
</aside>