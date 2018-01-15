<?php get_header();
get_template_part('index', 'banner'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12">			
			<div class="not-found-404">
				<h2><?php _e('Error 404','green-lantern'); ?><i class="iscon-remove-sign skin-text"></i></h2>
				<p><?php _e("We're sorry, but the page you were looking for doesn't exist.", 'green-lantern'); ?></p> 
				<p class="search-404"><a href="<?php echo esc_html(site_url()); ?>" class="btn btn-primary search-submit"><?php _e('Go to Homepage','green-lantern'); ?></a></p>					
			</div>
		</div>
	</div>
 </div>
<?php get_footer(); ?>