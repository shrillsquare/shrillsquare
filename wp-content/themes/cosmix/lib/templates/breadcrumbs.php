<?php
$category = get_the_category();
if( $category ):
$current_cat = $category[0]->cat_ID;
else:
$current_cat = '';
endif;
?>

<div id="breadcrumbs">
<div class="innerwrap">

<?php if (is_single()) { ?>

<p><?php _e('You are here&nbsp;:', TEMPLATE_DOMAIN); ?></p>
<p><a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>"><?php _e('Home', TEMPLATE_DOMAIN); ?></a> &raquo; </p>
<?php $category = get_the_category(); if ($category) { echo '<p><a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s", TEMPLATE_DOMAIN ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> &raquo; </p>'; } ?>
<p><?php echo the_title_attribute(); ?></p>

<?php } else if (is_home()) { ?>


<p><?php _e('You are here&nbsp;:', TEMPLATE_DOMAIN); ?></p>
<p><a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>"><?php _e('Home', TEMPLATE_DOMAIN); ?></a></p>


<?php } else if ( is_category() || is_tag() ) { ?>


<p><?php _e('You are here&nbsp;:', TEMPLATE_DOMAIN); ?></p>
<p><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php _e('Home', TEMPLATE_DOMAIN); ?></a> &raquo; </p>
<p><?php if( is_category() ) { _e('Category', TEMPLATE_DOMAIN); } elseif( is_tag() ) { _e('Tag', TEMPLATE_DOMAIN); } ?>
 &raquo; </p>

<?php if( is_category() ):
$getsinglecat = get_query_var('cat');
$singlecat = get_category ($getsinglecat);
$catslug = $singlecat->slug;
$getcategoryslug = get_category_by_slug($catslug);
$getcategoryid = $getcategoryslug->term_id;
?>

<p><?php echo get_category_parents($getcategoryid, TRUE, '&nbsp;&nbsp;&raquo;&nbsp;&nbsp;'); ?></p>

<?php else: ?>
<p><?php single_tag_title(); ?></p>
<?php endif; ?>

<?php } else if (is_page()) { ?>


<p><?php _e('You are here&nbsp;:', TEMPLATE_DOMAIN); ?></p>
<p><a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>"><?php _e('Home', TEMPLATE_DOMAIN); ?></a> &raquo; </p>

<?php // if there is a parent, display the link
$parent_title = get_the_title($post->post_parent);

if ( $parent_title != get_the_title() ) {
echo '<p><a href=' . get_permalink($post->post_parent)
    . ' ' . 'title=' . $parent_title . '>' . $parent_title
    . '</a> &raquo; </p>';
}
// then go on to the current page link
?>

<p><?php echo the_title_attribute(); ?></p>


<?php } else if (is_archive()) { ?>

<p><?php _e('You are here&nbsp;:', TEMPLATE_DOMAIN); ?></p>
<p><a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>"><?php _e('Home', TEMPLATE_DOMAIN); ?></a> &raquo; </p>
<p>
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php if ( is_day() ) : ?>
<?php printf( __( 'Daily Archives &raquo; <span>%s</span>', TEMPLATE_DOMAIN ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
<?php printf( __( 'Monthly Archives &raquo; <span>%s</span>', TEMPLATE_DOMAIN ), get_the_date( _x( 'F Y', 'monthly archives date format', TEMPLATE_DOMAIN) ) ); ?>
<?php elseif ( is_year() ) : ?>
<?php printf( __( 'Yearly Archives &raquo; <span>%s</span>', TEMPLATE_DOMAIN ), get_the_date( _x( 'Y', 'yearly archives date format', TEMPLATE_DOMAIN ) ) ); ?>
<?php endif; ?>
</p>


<?php } else if (is_search()) { ?>

<p><?php _e('You are here&nbsp;:', TEMPLATE_DOMAIN); ?></p>
<p><a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>"><?php _e('Home', TEMPLATE_DOMAIN); ?></a> &raquo; </p>
<p><?php _e('Search Result', TEMPLATE_DOMAIN); ?> &raquo; </p>
<p><?php the_search_query(); ?></p>

<?php } else if (is_author()) { ?>


<?php } else if (is_404()) { ?>

<p><?php _e('You are here&nbsp;:', TEMPLATE_DOMAIN); ?></p>
<p><a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>"><?php _e('Home', TEMPLATE_DOMAIN); ?></a> &raquo; </p>
<p><?php _e('404 Error Page', TEMPLATE_DOMAIN); ?></p>

<?php } else { ?>

<?php { /* nothing */ } ?>
<?php } ?>

</div>
</div>
