<?php get_header(); ?>
<?php get_template_part('index', 'banner'); ?>
<div class="content-wrapper">
	<div class="body-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-9">
						<!-- Blog Post -->
						<div class="blog-post">
							
							<?php the_post(); ?>	
							<div class="blog-span">						
								
								
								<div class="space-sep20"></div>
								<?php $defalt_arg =array('class' => "img-responsive" ); ?>								
								<?php if(has_post_thumbnail()): ?>											
								<div class="blog-post-featured-img img-overlay">
									<?php the_post_thumbnail(' ', $defalt_arg); 
										$post_thumbnail_id = get_post_thumbnail_id();
										$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id );
									?>									
								</div>
								<?php endif; ?>	
								<div class="space-sep20"></div>
								<div class="blog-post-body">
								<?php the_content( __( 'Read More' , 'green-lantern' ) ); ?>
								<?php $defaults = array(
								'before' => '<div class="pagination">' . __( 'Pages:','green-lantern' ),
								'after'            => '</div>',
								'link_before'      => '',
								'link_after'       => '',
								'next_or_number'   => 'number',
								'separator'        => ' ',
								'nextpagelink'     => __( 'Next page','green-lantern' ),
								'previouspagelink' => __( 'Previous page','green-lantern' ),
								'pagelink'         => '%',
								'echo'             => 1
								);
								wp_link_pages( $defaults );
							?>			
								</div>
							</div>
						</div>
						<!-- //Blog Post// -->						
						<!-- Comments -->				
					<?php comments_template('',true); ?>
				</div>   
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>