<?php
global $post;
$readmore = __('Continue Reading',TEMPLATE_DOMAIN);
// strip special character in twitter
$texttitle_strip = str_replace('#','',the_title_attribute('echo=0'));
$texttitle = str_replace('@','',$texttitle_strip);
?>
<?php
if( get_theme_option('social_on') == 'Enable') { ?>
<div id="sharebox-wrap">
<div class="share_box">
<p class="fb"><a target="_blank" rel="nofollow" class="fa fa-facebook-square" title="<?php _e('Share this post in Facebook', TEMPLATE_DOMAIN); ?>" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"><span><?php _e('Share', TEMPLATE_DOMAIN); ?></span></a></p>
<p class="tw"><a target="_blank" rel="nofollow" class="fa fa-twitter-square" title="<?php _e('Share this post in Twitter', TEMPLATE_DOMAIN); ?>" href="http://twitter.com/share?text=<?php echo urlencode($texttitle); ?>&url=<?php echo urlencode(get_permalink()); ?>"><span><?php _e('Tweet', TEMPLATE_DOMAIN); ?></span></a></p>
<p class="gp"><a rel="nofollow" class="fa fa-google-plus-square" title="<?php _e('Share this post in Google+', TEMPLATE_DOMAIN); ?>" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>"><span><?php _e('Plus+', TEMPLATE_DOMAIN); ?></span></a></p>
<p class="pinit"><a target="_blank" rel="nofollow" class="fa fa-pinterest-square" title="<?php _e('Pin this post in Pinterest', TEMPLATE_DOMAIN); ?>" href="//pinterest.com/pin/create/link/?url=<?php echo urlencode( get_permalink()); ?>&media=<?php $image_id = get_post_thumbnail_id($post->ID);$image_url = wp_get_attachment_image_src($image_id,'full', true); echo $image_url[0];  ?>&description=<?php echo urlencode($texttitle); ?>"><span><?php _e('Pin this', TEMPLATE_DOMAIN); ?></span></a></p>
</div>
</div>
<?php } ?>