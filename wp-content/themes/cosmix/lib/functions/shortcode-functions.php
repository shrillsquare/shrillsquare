<?php
if( !function_exists('mp_fix_shortcodes') ) {
////////////////////////////////////////////////////////////////////////////////
// fixed wpautoup and format issues
////////////////////////////////////////////////////////////////////////////////
function mp_fix_shortcodes($content){
$array = array ('<p>['=> '[',']</p>'=> ']',']<br />'=> ']');
$content = strtr($content, $array);
return $content;
}
add_filter('the_content', 'mp_fix_shortcodes');
add_filter('widget_text', 'do_shortcode');
}


if( !function_exists('mp_get_featured_post_type') ) {
function mp_get_featured_post_type($atts, $content = null) {
global $post;
extract(shortcode_atts(array(
"post_label" => '',
"post_type" => '',
"post_cat_id" => '',
"post_image_size" => '',
"post_data" => '',
"post_count" => ''
), $atts));

echo '<aside class="widget featured-post-widget"><h3 class="widget-title"><span>'. $post_label . '</span></h3>';
echo "<ul class='featured-cat-posts'>";

$my_query = new WP_Query('cat='. $post_cat_id . '&post_type='. $post_type . '&' . 'showposts=' . $post_count);
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate = $post->ID;
$the_post_ids = get_the_ID();
$thepostlink = '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';
?>
<li class="<?php echo get_has_thumb(); ?> <?php echo 'the-sidefeat-'.$post_image_size; ?>">
<?php if($post_image_size == '' || $post_image_size == 'thumbnail') { ?>
<?php echo get_featured_post_image($thepostlink,'</a>',50,50,'featpost alignleft','thumbnail', get_singular_cat('false'), the_title_attribute('echo=0'), false); ?>
<?php } else { ?>
<?php echo get_featured_post_image(''.$thepostlink,'</a>',480,320,'featpost alignleft','medium', get_singular_cat('false'), the_title_attribute('echo=0'), false); ?>
<?php } ?>
<div class="feat-post-meta">
<h5 class="feat-title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
<?php if($post_data != 'disable') { ?>
<div class="feat-meta">
<small><?php echo the_time( get_option( 'date_format' ) ); ?><?php if ( comments_open() ) { ?><span class="widget-feat-comment"> - <?php comments_popup_link(__('No Comment',TEMPLATE_DOMAIN), __('1 Comment',TEMPLATE_DOMAIN), __('% Comments',TEMPLATE_DOMAIN) ); ?></span><?php } ?></small></div>
<?php } ?>
</div>
</li>
<?php endwhile; wp_reset_postdata();
echo "</ul></aside>";
}
add_shortcode("feat_post", "mp_get_featured_post_type");
}



?>