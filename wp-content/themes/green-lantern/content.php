<div class="blog-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-span">
		<?php if(has_post_thumbnail()): ?>
		<div class="blog-post-featured-img img-overlay">
			<?php $defalt_arg =array('class' => "img-responsive" ); ?>						
			<a  href="<?php the_permalink(); ?>"><?php the_post_thumbnail('wl_media_blog_img', $defalt_arg); ?></a>
		</div>
		<?php endif; ?>
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h2>
		<div class="blog-post-details">
			<div class="blog-post-details-item blog-post-details-item-left">
				<i class="fa fa-clock-o"></i>
				<a href="#">
					<?php echo get_the_date('M d, y'); ?>
				</a>
			</div>
			<div class="blog-post-details-item blog-post-details-item-left">
				<i class="fa fa-user"></i>
				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a>
			</div>
			<?php if(get_the_tag_list() != '') { ?>
			<div class="blog-post-details-item blog-post-details-item-left">
				<i class="fa fa-tag"></i><?php the_tags('', ', ', '<br />'); ?>									
			</div>
			<?php } ?>
			<div class="blog-post-details-item blog-post-details-item-left">
				<i class="fa fa-comment"></i>
				
					<?php comments_number( 'No Comments', 'one comments', '% comments' ); ?>
				
			</div>
		</div>
		<div class="space-sep20"></div>
		<div class="blog-post-body"><?php the_content( __( 'Read More' , 'green-lantern' ) ); ?>
		</div>
	</div>
</div>