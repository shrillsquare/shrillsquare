</div><!-- CONTAINER WRAP END -->
</section><!-- CONTAINER END -->

</div><!-- BODYCONTENT END -->

<footer class="footer-top">
<div class="innerwrap">
<div class="ftop">
<div class="footer-container-wrap">
<div class="fbox footer-one">
<div class="widget-area the-icons">
<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
<?php else: ?>
<aside class="widget widget_recent_entries">
<h3 class="widget-title"><span><?php _e('About This Theme', TEMPLATE_DOMAIN); ?></span></h3>
<div class="textwidget">
<?php if( function_exists('mp_theme_info') ) { echo mp_theme_info(); } ?>
</div>
</aside>
<?php endif; ?>
</div>
</div>


<div class="fbox wider-cat footer-two">
<div class="widget-area the-icons">
<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
<?php else: ?>
<aside class="widget widget_recent_entries">
<h3 class="widget-title"><span><?php _e('Recent Posts', TEMPLATE_DOMAIN); ?></span></h3>
<ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul>
</aside>
<?php endif; ?>
</div>
</div>


<div class="fbox footer-three">
<div class="widget-area the-icons">
<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
<?php else: ?>
<aside class="widget">
<h3 class="widget-title"><span><?php _e('Hot Topics',TEMPLATE_DOMAIN); ?></span></h3>
<?php get_hot_topics(5); ?>
</aside>
<?php endif; ?>
</div>
</div>


</div>
</div>
</div>

</footer>


<footer class="footer-bottom">
<div class="innerwrap">
<div class="fbottom">

<div class="footer-right">
<div class="footer-nav">
<?php
if( !has_nav_menu('footer') ) {
echo '<ul>';
wp_list_pages('sort_column=menu_order&title_li=&depth=1');
echo '</ul>';
} else {
wp_nav_menu( array(
	'theme_location' => 'footer',
	'container' => false,
	'depth' => 1,
	'fallback_cb' => ''
	));
}
?>
</div>
</div>

<div class="footer-left">
<?php _e('Copyright &copy;', TEMPLATE_DOMAIN); ?> <?php echo gmdate(__('Y', TEMPLATE_DOMAIN)); ?> <?php bloginfo('name'); ?> <span class="gobacktotop"><a href="#custom"><?php _e('Go back to top', TEMPLATE_DOMAIN); ?> &uarr;</a></span>
 </div>

</div>
</div>
</footer><!-- FOOTER BOTTOM END -->

</div><!-- BODY-CONTENT END -->

</div><!-- BODYWRAP INNERWRAP END -->

</div><!-- WRAPPER MAIN END -->

</div><!-- WRAPPER END -->


<?php wp_footer(); ?>

<?php $footer_code = get_theme_option('footer_code'); echo stripcslashes($footer_code); ?>

</body>

</html>