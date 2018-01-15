<?php
$feat_cat_one = get_theme_option('feat_cat_one');
$feat_cat_two = get_theme_option('feat_cat_two');
$feat_cat_three = get_theme_option('feat_cat_three');
$feat_cat_four = get_theme_option('feat_cat_four');
$feat_cat_five = get_theme_option('feat_cat_five');
$feat_cat_six = get_theme_option('feat_cat_six');
$num = '6';
$eleght = '25';
?>


<?php if( ($feat_cat_one == '' && $feat_cat_two == '' && $feat_cat_three == '' && $feat_cat_four == '' && $feat_cat_five == '') || ($feat_cat_one == 'Choose a category' && $feat_cat_two == 'Choose a category' && $feat_cat_three == 'Choose a category' && $feat_cat_four == 'Choose a category' && $feat_cat_five == 'Choose a category') ): ?>

<?php else: ?>


<div id="homefeat">

<div class="featblk-content">

<?php if($feat_cat_one != '' && $feat_cat_one != 'Choose a category') {
$cat_name = get_cat_name($feat_cat_one);
$cat_id = get_cat_ID($cat_name);
?>
<div class="homefeatbox blkfeat<?php echo $cat_id; ?>">
<h3><a href="<?php echo get_category_link( $feat_cat_one ); ?>"><?php echo get_cat_name($feat_cat_one); ?></a></h3>

<?php $catdesc = category_description( $cat_id ); if($catdesc) { echo '<span class="homefeat-desc">'.category_description( $cat_id ).'</span>'; } ?>

<?php
$oddpost = 'alt-post';$postcount = 0;
$query = new WP_Query( "cat=".$feat_cat_one."&posts_per_page=". $num. "&orderby=date" );
while ( $query->have_posts() ) : $query->the_post();
$thepostlink = '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';
?>
<!-- POST START -->
<article <?php post_class('homefeat-post'); ?> id="post-<?php the_ID(); ?>">
<?php echo get_featured_post_image("<div class='post-thumb'>".$thepostlink, "</a></div>", 300, 300, "alignnone", 'medium', mp_get_image_alt_text(),the_title_attribute('echo=0'), false); ?>
</article>
<!-- POST END -->
<?php endwhile; wp_reset_query(); ?>
</div>
<?php } ?>

<?php do_action('mp_after_featcat_one'); ?>

<?php if($feat_cat_two != '' && $feat_cat_two != 'Choose a category') {
$cat_name = get_cat_name($feat_cat_two);
$cat_id = get_cat_ID($cat_name);
?>
<div class="homefeatbox blkfeat<?php echo $cat_id; ?>">
<h3><a href="<?php echo get_category_link( $feat_cat_two ); ?>"><?php echo get_cat_name($feat_cat_two); ?></a></h3>

<?php $catdesc = category_description( $cat_id ); if($catdesc) { echo '<span class="homefeat-desc">'.category_description( $cat_id ).'</span>'; } ?>

<?php
$oddpost = 'alt-post';$postcount = 0;
$query = new WP_Query( "cat=".$feat_cat_two."&posts_per_page=". $num. "&orderby=date" );
while ( $query->have_posts() ) : $query->the_post();
$thepostlink = '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';
?>
<!-- POST START -->
<article <?php post_class('homefeat-post'); ?> id="post-<?php the_ID(); ?>">
<?php echo get_featured_post_image("<div class='post-thumb'>".$thepostlink, "</a></div>", 300, 300, "alignnone", 'medium', mp_get_image_alt_text(),the_title_attribute('echo=0'), false); ?>
</article>
<!-- POST END -->
<?php endwhile; wp_reset_query(); ?>
</div>
<?php } ?>

<?php do_action('mp_after_featcat_two'); ?>

</div>

<div class="featblk-content">

<?php if($feat_cat_three != '' && $feat_cat_three != 'Choose a category') {
$cat_name = get_cat_name($feat_cat_three);
$cat_id = get_cat_ID($cat_name);
?>
<div class="homefeatbox blkfeat<?php echo $cat_id; ?>">
<h3><a href="<?php echo get_category_link( $feat_cat_three ); ?>"><?php echo get_cat_name($feat_cat_three); ?></a></h3>

<?php $catdesc = category_description( $cat_id ); if($catdesc) { echo '<span class="homefeat-desc">'.category_description( $cat_id ).'</span>'; } ?>

<?php
$oddpost = 'alt-post';$postcount = 0;
$query = new WP_Query( "cat=".$feat_cat_three."&posts_per_page=". $num. "&orderby=date" );
while ( $query->have_posts() ) : $query->the_post();
$thepostlink = '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';
?>
<!-- POST START -->
<article <?php post_class('homefeat-post'); ?> id="post-<?php the_ID(); ?>">
<?php echo get_featured_post_image("<div class='post-thumb'>".$thepostlink, "</a></div>", 300, 300, "alignnone", 'medium', mp_get_image_alt_text(),the_title_attribute('echo=0'), false); ?>
</article>
<!-- POST END -->
<?php endwhile; wp_reset_query(); ?>
</div>
<?php } ?>

<?php do_action('mp_after_featcat_three'); ?>

<?php if($feat_cat_four != '' && $feat_cat_four != 'Choose a category') {
$cat_name = get_cat_name($feat_cat_four);
$cat_id = get_cat_ID($cat_name);
?>
<div class="homefeatbox blkfeat<?php echo $cat_id; ?>">
<h3><a href="<?php echo get_category_link( $feat_cat_four ); ?>"><?php echo get_cat_name($feat_cat_four); ?></a></h3>

<?php $catdesc = category_description( $cat_id ); if($catdesc) { echo '<span class="homefeat-desc">'.category_description( $cat_id ).'</span>'; } ?>

<?php
$oddpost = 'alt-post';$postcount = 0;
$query = new WP_Query( "cat=".$feat_cat_four."&posts_per_page=". $num. "&orderby=date" );
while ( $query->have_posts() ) : $query->the_post();
$thepostlink = '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';
?>
<!-- POST START -->
<article <?php post_class('homefeat-post'); ?> id="post-<?php the_ID(); ?>">
<?php echo get_featured_post_image("<div class='post-thumb'>".$thepostlink, "</a></div>", 300, 300, "alignnone", 'medium', mp_get_image_alt_text(),the_title_attribute('echo=0'), false); ?>
</article>
<!-- POST END -->
<?php endwhile; wp_reset_query(); ?>
</div>
<?php } ?>

<?php do_action('mp_after_featcat_four'); ?>

</div>


<div class="featblk-content">

<?php if($feat_cat_five != '' && $feat_cat_five != 'Choose a category') {
$cat_name = get_cat_name($feat_cat_five);
$cat_id = get_cat_ID($cat_name);
?>
<div class="homefeatbox blkfeat<?php echo $cat_id; ?>">
<h3><a href="<?php echo get_category_link( $feat_cat_five ); ?>"><?php echo get_cat_name($feat_cat_five); ?></a></h3>

<?php $catdesc = category_description( $cat_id ); if($catdesc) { echo '<span class="homefeat-desc">'.category_description( $cat_id ).'</span>'; } ?>

<?php
$oddpost = 'alt-post';$postcount = 0;
$query = new WP_Query( "cat=".$feat_cat_five."&posts_per_page=". $num. "&orderby=date" );
while ( $query->have_posts() ) : $query->the_post();
$thepostlink = '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';
?>
<!-- POST START -->
<article <?php post_class('homefeat-post'); ?> id="post-<?php the_ID(); ?>">
<?php echo get_featured_post_image("<div class='post-thumb'>".$thepostlink, "</a></div>", 300, 300, "alignnone", 'medium', mp_get_image_alt_text(),the_title_attribute('echo=0'), false); ?>
</article>
<!-- POST END -->
<?php endwhile; wp_reset_query(); ?>
</div>
<?php } ?>

<?php do_action('mp_after_featcat_five'); ?>

<?php if($feat_cat_six != '' && $feat_cat_six != 'Choose a category') {
$cat_name = get_cat_name($feat_cat_six);
$cat_id = get_cat_ID($cat_name);
?>
<div class="homefeatbox blkfeat<?php echo $cat_id; ?>">
<h3><a href="<?php echo get_category_link( $feat_cat_six ); ?>"><?php echo get_cat_name($feat_cat_six); ?></a></h3>

<?php $catdesc = category_description( $cat_id ); if($catdesc) { echo '<span class="homefeat-desc">'.category_description( $cat_id ).'</span>'; } ?>

<?php
$oddpost = 'alt-post';$postcount = 0;
$query = new WP_Query( "cat=".$feat_cat_six."&posts_per_page=". $num. "&orderby=date" );
while ( $query->have_posts() ) : $query->the_post();
$thepostlink = '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';
?>
<!-- POST START -->
<article <?php post_class('homefeat-post'); ?> id="post-<?php the_ID(); ?>">
<?php echo get_featured_post_image("<div class='post-thumb'>".$thepostlink, "</a></div>", 300, 300, "alignnone", 'medium', mp_get_image_alt_text(),the_title_attribute('echo=0'), false); ?>
</article>
<!-- POST END -->
<?php endwhile; wp_reset_query(); ?>
</div>
<?php } ?>

<?php do_action('mp_after_featcat_six'); ?>

</div>

</div>
<?php endif; ?>