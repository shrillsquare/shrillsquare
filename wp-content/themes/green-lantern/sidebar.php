<div class="col-md-3 col-sm-3">
	<!-- Sidebar Block -->
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-primary') ) {
		the_widget('WP_Widget_Archives');
		the_widget('WP_Widget_Categories');
	} ?>
</div>