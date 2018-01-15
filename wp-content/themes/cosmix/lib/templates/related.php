<?php
$orig_post = $post;
global $post;
$tags = wp_get_post_tags($post->ID);

	if ($tags) {
	$tag_ids = array();
	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	$args=array(
	'tag__in' => $tag_ids,
	'post__not_in' => array($post->ID),
	'posts_per_page'=>6, // Number of related posts to display.
	'ignore_sticky_posts'=>1
	);

	$my_query = new wp_query( $args );

    if( $my_query->have_posts() ) {
    echo '<div id="post-related">' . '<h4>' . __('Related Posts', TEMPLATE_DOMAIN) . '</h4>';
	while( $my_query->have_posts() ) {
	$my_query->the_post();
    $thepostlink = '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';
	?>
<div class="feat-cat-meta post-<?php the_ID(); ?>">
<?php echo get_featured_post_image("<div class='related-post-thumb'>".$thepostlink, "</a></div>", 150, 150, "alignleft", "thumbnail", mp_get_image_alt_text(),the_title_attribute('echo=0'), false); ?>
<p>
<strong><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></strong>
</p>
</div>
 <?php
  }
  $post = $orig_post;
  wp_reset_query();
echo '</div>';
}

}  else {

$categories = get_the_category($post->ID);
if ($categories) {
	$category_ids = array();
	foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

	$args=array(
		'category__in' => $category_ids,
		'post__not_in' => array($post->ID),
		'showposts'=>6, // Number of related posts that will be shown.
		'ignore_sticky_posts'=>1
	);

	$my_query = new wp_query($args);
	if( $my_query->have_posts() ) {
	    echo '<div id="post-related">' . '<h4>' . __('Related Posts', TEMPLATE_DOMAIN) . '</h4>';
		while ($my_query->have_posts()) {
		$my_query->the_post();
        $thepostlink = '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';
		?>
<div class="feat-cat-meta post-<?php the_ID(); ?>">
<?php echo get_featured_post_image("<div class='related-post-thumb'>".$thepostlink, "</a></div>", 150, 150, "alignleft", "thumbnail", mp_get_image_alt_text(),the_title_attribute('echo=0'), false); ?>
<p>
<strong><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></strong>
</p>
</div>
 <?php
  }
  wp_reset_query();
echo '</div>';
}
}

}

?>
