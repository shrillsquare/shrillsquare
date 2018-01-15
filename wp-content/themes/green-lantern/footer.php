<footer>
    <div class="footer">
        <div class="container">
            <div class="footer-wrapper">
                <div class="row">
				<?php 
				if(is_active_sidebar( 'footer-widget-area' ))
				{ 
					dynamic_sidebar( 'footer-widget-area' ); 
				} else 
				{  
				?>
				<!-- Footer Col. -->
						<div class="col-md-3 col-sm-3 footer-col">
							<div class="footer-content">
								<div class="footer-title"><?php _e('About Us','green-lantern'); ?> </div>
								<div class="footer-content-text">
									<p><?php _e('Lorem ipsum dolor sit amet nec, consectetuer adipiscing elit. Aenean commodo ligula eget
									dolor.Lorem ipsum dolor sit amet nec, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.','green-lantern'); ?></p>
									<p><?php _e('Lorem ipsum dolor sit amet nec, consectetuer adipiscing elit. Aenean commodo ligula eget
									dolor.Lorem ipsum dolor sit amet nec, consectetuer adipiscing elit. Aenean commodo ligula eget
									dolor.Lorem ipsum dolor sit amet nec, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.','green-lantern'); ?></p>
								</div>
							</div>
						</div>
						<!-- //Footer Col.// -->

						<!-- Footer Col. -->
						<div class="col-md-3 col-sm-3 footer-col">
							<div class="footer-title"><?php _e('Recent Posts','green-lantern'); ?> </div>
							<div class="footer-content">
								<div class="footer-posts">
									<ul class="posts-list">
										<li>
											<div class="posts-list-thumbnail">
												<a href="">
													<img src="<?php echo GL_TEMPLATE_DIR_URI; ?>/images/blog1-thumb.jpg" alt=""/>
												</a>
											</div>
											<div class="posts-list-content">
												<a href="" class="posts-list-title"><?php _e('Sidebar post example','green-lantern'); ?> </a>
												<span class="posts-list-meta"><?php _e('July','green-lantern'); ?> 30, 2013</span>
											</div>
										</li>
										<li>
											<div class="posts-list-thumbnail">
												<a href="">
													<img src="<?php echo GL_TEMPLATE_DIR_URI; ?>/images/blog2-thumb.jpg" alt=""/>
												</a>
											</div>
											<div class="posts-list-content">
												<a href="" class="posts-list-title"><?php _e('Sidebar post example','green-lantern'); ?> </a>
												<span class="posts-list-meta"><?php _e('July','green-lantern'); ?> 30, 2013	</span>
											</div>
										</li>                                       
										<li>
											<div class="posts-list-thumbnail">
												<a href="">
													<img src="<?php echo GL_TEMPLATE_DIR_URI; ?>/images/blog3-thumb.jpg" alt=""/>
												</a>
											</div>
											<div class="posts-list-content">
												<a href="" class="posts-list-title"><?php _e('Sidebar post example','green-lantern'); ?> </a>
												<span class="posts-list-meta"><?php _e('July','green-lantern'); ?> 30, 2013	</span>
											</div>
										</li>
										<li>
											<div class="posts-list-thumbnail">
												<a href="">
													<img src="<?php echo GL_TEMPLATE_DIR_URI; ?>/images/blog4-thumb.jpg" alt=""/>
												</a>
											</div>
											<div class="posts-list-content">
												<a href="" class="posts-list-title"><?php _e('Sidebar post example','green-lantern'); ?> </a>
												<span class="posts-list-meta"><?php _e('July','green-lantern'); ?> 30, 2013	</span>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- //Footer Col.// -->

						<!-- Footer Col. -->
						<div class="col-md-3 col-sm-3 footer-col">
							<div class="footer-title"><?php _e('Get In Touch','green-lantern'); ?></div>
							<div class="footer-content">
								<ul class="contact-info">
									<li>
										<div class="contact-title">
											<i class="fa fa-map-marker"></i><?php _e('Address','green-lantern'); ?>
										</div>
										<div class="contact-details">38222 <?php _e('California, Los Angeles 22','green-lantern'); ?></div>
									</li>
									<li>
										<div class="contact-title">
											<i class="fa fa-phone"></i><?php _e('phone','green-lantern'); ?>
										</div>
										<div class="contact-details">123-345-6666</div>
									</li>
									<li>
										<div class="contact-title">
											<i class="fa fa-envelope"></i><?php _e('eMail','green-lantern'); ?>
										</div>
										<div class="contact-details"><a href="mailto:info@company.com">info@companyname.com</a></div>
									</li>
									<li>
										<div class="contact-title">
											<i class="fa fa-globe"></i><?php _e('Website','green-lantern'); ?>
										</div>
										<div class="contact-details"><a href="#">www.companyname.com</a></div>
									</li>
									
								</ul>
							</div>
						</div>
						<!-- //Footer Col.// -->
						
						<!-- Footer Col. -->
						<div class="col-md-3 col-sm-3 footer-col">
							<div class="footer-title">
								<?php _e('Photo Stream','green-lantern'); ?>
							</div>
							<div class="footer-content">
								<div class="flickr_badge_wrapper">
									<div class="flickr_badge_image" id="flickr_badge_image1"><a href="#"><img src="<?php echo GL_TEMPLATE_DIR_URI; ?>/images/blog4-thumb.jpg" alt="A photo on Flickr" title="" height="75" width="75"></a></div>
								</div>
								<div class="flickr_badge_wrapper">
									<div class="flickr_badge_image" id="flickr_badge_image2"><a href="#"><img src="<?php echo GL_TEMPLATE_DIR_URI; ?>/images/blog3-thumb.jpg" alt="A photo on Flickr" title="" height="75" width="75"></a></div>
								</div>
								<div class="flickr_badge_wrapper">
									<div class="flickr_badge_image" id="flickr_badge_image3"><a href="#"><img src="<?php echo GL_TEMPLATE_DIR_URI; ?>/images/blog2-thumb.jpg" alt="A photo on Flickr" title="" height="75" width="75"></a></div>
								</div>
								<div class="flickr_badge_wrapper">
									<div class="flickr_badge_image" id="flickr_badge_image4"><a href="#"><img src="<?php echo GL_TEMPLATE_DIR_URI; ?>/images/blog2-thumb.jpg" alt="A photo on Flickr" title="" height="75" width="75"></a></div>
								</div>
								<div class="flickr_badge_wrapper">
									<div class="flickr_badge_image" id="flickr_badge_image5"><a href="#"><img src="<?php echo GL_TEMPLATE_DIR_URI; ?>/images/blog3-thumb.jpg" alt="A photo on Flickr" title="" height="75" width="75"></a></div>
								</div>
								<div class="flickr_badge_wrapper">
									<div class="flickr_badge_image" id="flickr_badge_image6"><a href="#"><img src="<?php echo GL_TEMPLATE_DIR_URI; ?>/images/blog4-thumb.jpg" alt="A photo on Flickr" title="" height="75" width="75"></a></div>
								</div>
								<div class="flickr_badge_wrapper">
									<div class="flickr_badge_image" id="flickr_badge_image7"><a href="#"><img src="<?php echo GL_TEMPLATE_DIR_URI; ?>/images/blog4-thumb.jpg" alt="A photo on Flickr" title="" height="75" width="75"></a></div>
								</div>
								<div class="flickr_badge_wrapper">
									<div class="flickr_badge_image" id="flickr_badge_image8"><a href="#"><img src="<?php echo GL_TEMPLATE_DIR_URI; ?>/images/blog3-thumb.jpg" alt="A photo on Flickr" title="" height="75" width="75"></a></div>
								</div>
								<div class="flickr_badge_wrapper">
									<div class="flickr_badge_image" id="flickr_badge_image9"><a href="#"><img src="<?php echo GL_TEMPLATE_DIR_URI; ?>/images/blog2-thumb.jpg" alt="A photo on Flickr" title="" height="75" width="75"></a></div>
								</div>								
							<!-- //Footer Col.// -->
							</div>
						</div>
						<?php } ?>
                </div>				
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
				<?php $wl_theme_options = weblizar_get_options(); ?>
                    <div class="col-md-6 col-sm-6">
                        <div class="copyright-text weblizar_footer_customizations"><?php 
							if($wl_theme_options['footer_customizations']) { echo $wl_theme_options['footer_customizations']; }
							if($wl_theme_options['developed_by_text']) { echo "|" .$wl_theme_options['developed_by_text']; } ?>
							<a  rel="nofollow" href="<?php if($wl_theme_options['developed_by_link']) { echo esc_url( $wl_theme_options['developed_by_link']);} ?>" target="_blank">
							<?php if($wl_theme_options['developed_by_weblizar_text']) { echo $wl_theme_options['developed_by_weblizar_text']; } ?>
							</a>
						</div>
                    </div>
                    <div class="weblizar_social_media_enbled">
					<?php if($wl_theme_options['footer_section_social_media_enbled'] == 'on') { ?>
                    <div class="col-md-6 col-sm-6"> 
						<div class="social-icons">
							<ul>
								<?php if($wl_theme_options['social_media_facebook_link']) { ?>
								<li><a href="<?php echo esc_url( $wl_theme_options['social_media_facebook_link']) ?>" title="facebook" target="_blank" class="social-media-icon facebook-icon">facebook</a></li>
								<?php } 
								if($wl_theme_options['social_media_twitter_link']) { ?>
								<li><a href="<?php echo esc_url( $wl_theme_options['social_media_twitter_link']) ?>" title="twitter" target="_blank" class="social-media-icon twitter-icon">twitter</a></li>
								<?php } 
								if($wl_theme_options['social_media_google_plus']) { ?>
								<li><a href="<?php echo esc_url( $wl_theme_options['social_media_google_plus']) ?>" title="googleplus" target="_blank" class="social-media-icon googleplus-icon">googleplus</a></li>
								<?php } 
								if($wl_theme_options['social_media_linkedin_link']) { ?>
								<li class="weblizar_linkedin_link"><a href="<?php echo esc_url( $wl_theme_options['social_media_linkedin_link']) ?>" title="inkedin" target="_blank" class="social-media-icon linkedin-icon">Linkedin</a></li>
								<?php } ?>
							</ul>
						</div>
                    </div>
					<?php } ?>
				</div>
                </div>
            </div>
        </div>	
		<?php if($wl_theme_options['custom_css']) ?>
		<style type="text/css">
			<?php { echo $wl_theme_options['custom_css']; } ?>
		</style>
    </div>
</footer>
</div>
<?php get_template_part('font','settings'); ?>
<?php wp_footer(); ?>
</body>
</html>