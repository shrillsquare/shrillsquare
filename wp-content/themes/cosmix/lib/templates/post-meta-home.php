<?php if( get_post_type() != 'post' ) { ?>
<?php echo custom_taxonomies_terms_links('<span class="post-category color-category">','</span>'); ?>
<?php } else { ?>
<span class="post-category color-category"><?php echo get_singular_cat(); ?></span>
<?php } ?>