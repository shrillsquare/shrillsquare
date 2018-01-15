<?php get_header(); ?>

<?php do_action( 'bp_before_content' ) ?>

<!-- CONTENT START -->
<div id="single-content" class="content content-in<?php if($cat_id) { echo $cat_id; } ?>">
<div class="content-inner">

<?php do_action( 'bp_before_blog_home' ) ?>

<!-- POST ENTRY START -->
<div id="post-entry">

<?php do_action( 'bp_before_blog_entry' ) ?>

<section class="post-entry-inner">

<?php do_action( 'bp_before_single_title' ) ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- POST START -->
<article <?php post_class('post-single'); ?> id="post-<?php the_ID(); ?>"<?php do_action('bp_article_start'); ?>>

<?php do_action( 'bp_before_single_title' ) ?>

<h1 class="post-title entry-title"<?php do_action('bp_article_post_title'); ?>><?php the_title(); ?></h1>

<?php get_template_part( 'lib/templates/post-meta' ); ?>

<div class="post-content">
<?php $ads_single_top = get_theme_option('ads_single_top'); if($ads_single_top != '') { ?>
<div class="adsense-single"><?php echo stripcslashes($ads_single_top); ?></div>
<?php } ?>

<div class="entry-content"<?php do_action('bp_article_post_content'); ?>>
<?php the_content( __('...more &raquo;',TEMPLATE_DOMAIN) ); ?>
</div>
<?php wp_link_pages('before=<div class="wp-pagenavi">&after=</div>'); ?>

<?php $ads_single_bottom = get_theme_option('ads_single_bottom'); if($ads_single_bottom != '') { ?>
<div class="adsense-single ads-bottom"><?php echo stripcslashes($ads_single_bottom); ?></div>
<?php } ?>
</div>

<?php get_template_part( 'lib/templates/post-meta-bottom' ); ?>

<?php get_template_part( 'lib/templates/share-box' ); ?>

<?php get_template_part( 'lib/templates/author-bio' ); ?>

<div class="post-content-bottom">
<?php get_template_part( 'lib/templates/related' ); ?>
</div>

</article>
<!-- POST END -->

<?php if(function_exists('set_wp_post_view')) { set_wp_post_view( get_the_ID() ); } ?>

<?php endwhile; ?>

<?php comments_template(); ?>

<?php else : ?>

<?php get_template_part( 'lib/templates/result' ); ?>

<?php endif; ?>

</section>

<?php do_action( 'bp_after_blog_entry' ) ?>

</div>
<!-- POST ENTRY END -->

<?php do_action( 'bp_after_blog_home' ) ?>

</div><!-- CONTENT INNER END -->
</div><!-- CONTENT END -->

<?php do_action( 'bp_after_content' ) ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>