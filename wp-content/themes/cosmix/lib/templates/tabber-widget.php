<div id="tabber-widget">
<div class="widget-area">
<div class="tabber">
<?php if ( is_active_sidebar( 'tabbed-sidebar' ) ) : ?>
<?php dynamic_sidebar( 'tabbed-sidebar' ); ?>
<?php else: ?>


<div class="tabbertab">
<aside class="widget">
<h3 class="widget-title"><?php _e('Random', TEMPLATE_DOMAIN); ?></h3>
<?php mp_get_random_post(5); ?>
</aside></div>
<div class="tabbertab">
<aside class="widget">
<h3 class="widget-title"><?php _e('Popular',TEMPLATE_DOMAIN); ?></h3>
<?php get_hot_topics(5); ?>
</aside></div>
<div class="tabbertab">
<aside class="widget widget_recent_entries">
<h3 class="widget-title"><?php _e('Recent', TEMPLATE_DOMAIN); ?></h3>
<ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul>
</aside>
</div>
<div class="tabbertab">
<aside class="widget">
<h3 class="widget-title"><?php _e('Comments', TEMPLATE_DOMAIN); ?></h3>
<?php get_avatar_recent_comment(5); ?>
</aside></div>


<?php endif; ?>
</div>
</div>
</div>