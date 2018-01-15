<?php get_header(); ?>

<?php do_action( 'bp_before_content' ) ?>

<!-- CONTENT START -->
<div id="single-content" class="content">
<div class="content-inner">

<?php do_action( 'bp_before_blog_home' ) ?>

<!-- POST ENTRY END -->
<div id="post-entry">

<?php do_action( 'bp_before_blog_entry' ) ?>

<section class="post-entry-inner">

<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>

<!-- POST START -->
<article <?php post_class('post-single page-single'); ?> id="post-<?php the_ID(); ?>"<?php do_action('bp_article_start'); ?>>

<?php do_action( 'bp_before_single_title' ) ?>

<h1 class="post-title entry-title"<?php do_action('bp_article_post_title'); ?>><?php the_title(); ?></h1>
<?php get_template_part( 'lib/templates/post-meta' ); ?>

<div class="post-content">
<div class="entry-content"<?php do_action('bp_article_post_content'); ?>>
<?php the_content( __('...more &raquo;',TEMPLATE_DOMAIN) ); ?>
</div>
<?php wp_link_pages('before=<div class="wp-pagenavi">&after=</div>'); ?>
</div>

</article>
<!-- POST END -->

<?php endwhile; ?>

<?php if ( comments_open() ) { ?><?php comments_template(); ?><?php } ?> 

<?php else : ?>

<?php get_template_part( 'lib/templates/result' ); ?>

<?php endif; ?>

</section>
</div>
<!-- POST ENTRY END -->

<?php //do_action( 'bp_after_blog_home' ) ?>

</div><!-- CONTENT INNER END -->
</div><!-- CONTENT END -->

<?php do_action( 'bp_after_content' ) ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>