<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?>

<?php do_action( 'bp_before_content' ) ?>
<!-- CONTENT START -->
<div id="single-content" class="content full-width">
<div class="content-inner">

<?php do_action( 'bp_before_blog_home' ) ?>

<!-- POST ENTRY -->
<div id="post-entry">
<section class="post-entry-inner">

<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>

<article <?php post_class('post-single page-single'); ?> id="post-<?php the_ID(); ?>"<?php do_action('bp_article_start'); ?>>

<h1 class="post-title entry-title"<?php do_action('bp_article_post_title'); ?>><?php the_title(); ?></h1>
<div class="post-content entry-content"<?php do_action('bp_article_post_content'); ?>>
<?php the_content( __('...Continue reading', TEMPLATE_DOMAIN) ); ?>
<?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>
</div><!-- POST CONTENT END -->
</article>

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

<?php //do_action( 'bp_after_content' ) ?>

<?php get_footer(); ?>