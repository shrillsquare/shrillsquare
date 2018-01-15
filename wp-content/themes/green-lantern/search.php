<?php get_header(); ?>
<?php get_template_part('index', 'banner'); ?>
<div class="content-wrapper">
	<div class="body-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-9">
						<!-- Blog Post -->
						<div class="blog-post">
							<div class="blog-post-date">
								<div class="blog-post-icon"><i class="icon-pencil"> </i></div>						
							</div>
							<?php if ( have_posts() ) : ?>	
							<div class="blog-span">																	
								<h2><?php printf( __( 'Search Results for: %s', 'green-lantern' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
								
								<?php /* Start the Loop */ ?>			
								<?php get_template_part( 'content', get_post_format() ); ?>
								<div class="space-sep20"></div>
																
							</div>
							<?php else : ?>
							<div class="blog-span">
							<header class="entry-header">
								<h1 class="entry-title"><?php _e( 'Nothing Found', 'green-lantern' ); ?></h1>
							</header>

							<div class="entry-content">
								<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'green-lantern' ); ?></p>
								<?php get_search_form(); ?>
							</div><!-- .entry-content -->
							</div>
						<?php endif; ?>
						</div>
				</div>   
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>