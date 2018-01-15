<?php do_action( 'bp_before_commentpost' ); ?>

<div id="commentpost">

<?php if ( !comments_open() && !have_comments() ) : ?>
<?php else: ?>
<?php if ( have_comments() ) : ?>
<h4 id="comments"><span><?php comments_number(__('No Comments Yet', TEMPLATE_DOMAIN), __('1 Comment Already', TEMPLATE_DOMAIN), __('% Comments Already', TEMPLATE_DOMAIN)); ?></span></h4>
<?php endif; ?>     
<?php endif; ?>


<?php if ( have_comments() ) : ?>
<?php do_action( 'bp_before_blog_comment_list' ) ?>
<ol class="commentlist">
<?php wp_list_comments('type=comment&callback=get_the_list_comments'); ?>
</ol>
<?php do_action( 'bp_after_blog_comment_list' ) ?>
<?php endif; ?>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
<div id="post-navigator-single">
<div class="alignright"><?php if(function_exists('paginate_comments_links')) {  paginate_comments_links(); } ?></div>
</div>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
<?php comment_form(); ?>
<?php else: ?>
<?php endif; ?>

<?php get_template_part( 'lib/templates/paginate' ); ?>

</div>

<?php do_action( 'bp_after_commentpost' ); ?>