<?php $wl_theme_options = weblizar_get_options(); ?>
<style>
.logo a
{
    font-family: <?php echo $wl_theme_options['main_heading_font']; ?> !important;
}
.navbar-default .navbar-nav li a
{
    font-family: <?php echo $wl_theme_options['menu_font']; ?> !important;
}

.h2-section-title, .feature .feature-content h3, .h1-page-title, .h3-sidebar-title, h2.widgettitle,
.blog-post .blog-span h2, .footer .footer-col .footer-title, .footer .copyright a:hover,
.blog-post h2 a{
    font-family: <?php echo $wl_theme_options['theme_title']; ?>  !important;
}

.tp-caption.main_color_text h1, .default_text, .btn.btn-primary,
.content-box h4, .content-box-text p, .center-title p, .feature .feature-content p,
.feature .feature-details, .blog-post .blog-post-details .blog-post-details-item, .blog-post p, .hc_comment_title h3, .comment_detail_title, 
.comment_detail p, .comment-reply-link, .title-block .h3-body-title, .logged-in-as, .form-wrapper label,
#wl_btn,
.footer .footer-col .footer-content .footer-content-text p, .footer-wrapper .col-md-3 ul li a, .posts-list .posts-list-meta,
ul.contact-info li .contact-title, ul.contact-info li .contact-details,
.footer .copyright .copyright-text,
.col-md-3 ul li a, .textwidget, .blog-post-body h3{
    font-family: <?php echo $wl_theme_options['desc_font_all']; ?> !important;
}

</style>