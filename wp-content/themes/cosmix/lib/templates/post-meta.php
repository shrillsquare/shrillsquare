<div class="post-meta the-icons<?php if( is_page() ){ echo ' meta-no-display'; } ?>">

<?php if( !is_single() ) { ?>
<span class="post-category color-category"><?php echo get_singular_cat(); ?></span>&nbsp;
<?php } ?>

<span class="post-author vcard"><?php _e('by', TEMPLATE_DOMAIN); ?> <?php the_author_posts_link(); ?></span>

<span class="post-time entry-date"><?php _e('on', TEMPLATE_DOMAIN); ?> <abbr class="published" title="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo the_time( get_option( 'date_format' ) ); ?></abbr></span>

<?php $getmodtime = get_the_modified_time(); if( !$getmodtime ) { $modtime = '<span class="date updated meta-no-display">'. get_the_time('c') . '</span>'; } else { $modtime = '<span class="date updated meta-no-display">'. get_the_modified_time('c') . '</span>'; } ?>
<span class="meta-no-display"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo the_title_attribute(); ?></a></span><?php echo $modtime; ?>


<?php
if( is_single() ) {
if( get_post_type() != 'post' ) { ?>
<?php echo custom_taxonomies_terms_links('<span class="post-category">','</span>'); ?>
<?php } else { ?>
<span class="post-category"><?php _e('under', TEMPLATE_DOMAIN); ?> <?php if( is_single() ) { the_category(', '); } else { echo get_singular_cat(); } ?></span>
<?php }
}
?>


<?php if ( comments_open()  ) { ?>
<span class="post-comment"> - <?php comments_popup_link(__('No Comment',TEMPLATE_DOMAIN), __('1 Comment',TEMPLATE_DOMAIN), __('% Comments',TEMPLATE_DOMAIN) ); ?></span><?php } ?>

</div>
