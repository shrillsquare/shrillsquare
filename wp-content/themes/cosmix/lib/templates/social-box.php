<div id="socialbox">

<p class="rss"><a rel="nofollow" class="fa fa-rss" title="<?php _e('Subscribe to rss feed', TEMPLATE_DOMAIN); ?>" href="<?php if( get_theme_option('rss_feed') ): ?><?php echo stripcslashes( get_theme_option('rss_feed') ); ?><?php else: ?><?php echo bloginfo('rss2_url'); ?><?php endif; ?>">&nbsp;</a></p>

<?php if( get_theme_option('facebook_page') ): ?>
<p class="facebook"><a rel="nofollow" class="fa fa-facebook" title="<?php _e('Like us on Facebook', TEMPLATE_DOMAIN); ?>" href="<?php echo stripcslashes( get_theme_option('facebook_page') ); ?>">&nbsp;</a></p>
<?php endif; ?>

<?php if( get_theme_option('twitter_page') ): ?>
<p class="twitter"><a rel="nofollow" class='fa fa-twitter' title="<?php _e('Follow us on Twitter', TEMPLATE_DOMAIN); ?>" href="<?php echo stripcslashes( get_theme_option('twitter_page') ); ?>">&nbsp;</a></p>
<?php endif; ?>

<?php if( get_theme_option('gplus_page') ): ?>
<p class="gplus"><a rel="nofollow" class='fa fa-google-plus' title="<?php _e('Check out our Google Plus profile', TEMPLATE_DOMAIN); ?>" href="<?php echo stripcslashes( get_theme_option('gplus_page') ); ?>">&nbsp;</a></p>
<?php endif; ?>

</div>