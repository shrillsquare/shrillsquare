<?php
////////////////////////////////////////////////////////////////////////////////
// Sidebar Widget
////////////////////////////////////////////////////////////////////////////////
function wp_theme_widgets_init() {
global $bp_active;
     register_sidebar(array(
    'name'=>__('Left Sidebar', TEMPLATE_DOMAIN),
    'id' => 'left-sidebar',
	'description' => __( 'Left sidebar widget area', TEMPLATE_DOMAIN ),
	'before_widget' => '<aside id="%1$s" class="effect-1 widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title"><span>',
	'after_title' => '</span></h3>',
	));

    register_sidebar(array(
    'name'=>__('Right Sidebar', TEMPLATE_DOMAIN),
    'id' => 'right-sidebar',
	'description' => __( 'Right sidebar widget area', TEMPLATE_DOMAIN ),
	'before_widget' => '<aside id="%1$s" class="effect-1 widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title"><span>',
	'after_title' => '</span></h3>',
	));

     	register_sidebar(array(
		'name'=>__('First Footer Widget Area', TEMPLATE_DOMAIN),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', TEMPLATE_DOMAIN ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
	   'before_title' => '<h3 class="widget-title"><span>',
	'after_title' => '</span></h3>',
	));

	register_sidebar( array(
		'name' => __('Second Footer Widget Area', TEMPLATE_DOMAIN),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', TEMPLATE_DOMAIN ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
	   'before_title' => '<h3 class="widget-title"><span>',
	'after_title' => '</span></h3>',
	) );

	register_sidebar( array(
		'name' => __('Third Footer Widget Area', TEMPLATE_DOMAIN),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', TEMPLATE_DOMAIN ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
	  'before_title' => '<h3 class="widget-title"><span>',
	'after_title' => '</span></h3>',
	) );
}

add_action( 'widgets_init', 'wp_theme_widgets_init' );



///////////////////////////////////////////////////////////////////////////////////
////custom most commented post widget
///////////////////////////////////////////////////////////////////////////////////
class My_THEME_Most_Commented_Widget extends WP_Widget {
function My_THEME_Most_Commented_Widget() {
//Constructor
parent::WP_Widget(false, $name = TEMPLATE_DOMAIN . ' | Most Comments', array(
'description' => __('Display your most commented posts.', TEMPLATE_DOMAIN)
));
}
function widget($args, $instance) {
// outputs the content of the widget
extract($args); // Make before_widget, etc available.
$mc_name = empty($instance['title']) ? __('Most Comments', TEMPLATE_DOMAIN) : apply_filters('widget_title', $instance['title']);
$mc_number = $instance['number'];
$mc_comment_count = $instance['commentcount'];
$unique_id = $args['widget_id'];
echo $before_widget;
echo $before_title . $mc_name . $after_title;
echo get_hot_topics($mc_number);
echo $after_widget;
}
function update($new_instance, $old_instance) {
//update and save the widget
return $new_instance;
}

function form($instance) {
// Get the options into variables, escaping html characters on the way
$mc_name = $instance['title'];
$mc_number = $instance['number'];
$mc_comment_count = $instance['commentcount'];
?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Name for most comment(optional):', TEMPLATE_DOMAIN);?>
<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" class="widefat" value="<?php echo $mc_name;?>" /></label></p>

<p>
<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Total to show: ', TEMPLATE_DOMAIN);?>
<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" class="widefat" value="<?php echo $mc_number;?>" /></label>
</p>

<p>
<label for="<?php echo $this->get_field_id('commentcount'); ?>"><?php _e('Show comments count:', TEMPLATE_DOMAIN); ?></label>
<select id="<?php echo $this->get_field_id('commentcount'); ?>" name="<?php echo $this->get_field_name('commentcount'); ?>">
<option<?php if($mc_comment_count == 'yes') { echo " selected='selected'"; } ?> name="<?php echo $this->get_field_name('commentcount'); ?>" value="yes"><?php _e('yes', TEMPLATE_DOMAIN); ?></option>
<option<?php if($mc_comment_count == 'no') { echo " selected='selected'"; } ?> name="<?php echo $this->get_field_name('commentcount'); ?>" value="no"><?php _e('no', TEMPLATE_DOMAIN); ?></option>
</select>
</p>

<?php
}
}
register_widget('My_THEME_Most_Commented_Widget');


///////////////////////////////////////////////////////////////////////////////////
////wordpress and buddypress recent comment widget
///////////////////////////////////////////////////////////////////////////////////
class My_THEME_Recent_Comments_Widget extends WP_Widget {
function My_THEME_Recent_Comments_Widget() {
//Constructor
parent::WP_Widget(false, $name = TEMPLATE_DOMAIN . ' | Recent Comments', array(
'description' => __('Display your recent comments with user avatar.', TEMPLATE_DOMAIN)
));
}
function widget($args, $instance) {
// outputs the content of the widget
extract($args); // Make before_widget, etc available.
$rc_name = empty($instance['title']) ? __('Recent Comments', TEMPLATE_DOMAIN) : apply_filters('widget_title', $instance['title']);

$rc_avatar = $instance['avatar_on'];
$rc_number = $instance['number'];

$unique_id = $args['widget_id'];

global $wpdb;

$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved,
comment_type,comment_author_url,
SUBSTRING(comment_content,1,45) AS com_excerpt
FROM $wpdb->comments
LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
$wpdb->posts.ID)
WHERE comment_approved = '1' AND comment_type = '' AND
post_password = ''
ORDER BY comment_date_gmt DESC LIMIT $rc_number";

$comments = $wpdb->get_results($sql);
$output = $pre_HTML;
echo $before_widget;
echo $before_title . $rc_name . $after_title;
echo "<ul class='gravatar_recent_comment'>";
foreach ($comments as $comment) {
$grav_email = $comment->comment_author_email;
$grav_name = $comment->comment_author_name;
$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($email). "&amp;size=32";
?>
<li>
<?php if($rc_avatar == 'yes') {  ?><?php echo get_avatar( $grav_email, '32'); ?><?php } ?>

<div class="gravatar-meta">
<span class="author"><span class="aname"><?php echo strip_tags($comment->comment_author); ?></span> <?php _e('Says:', TEMPLATE_DOMAIN); ?></span>
<span class="comment"><a href="<?php echo get_permalink($comment->ID); ?>#comment-<?php echo $comment->comment_ID; ?>" title="on <?php echo $comment->post_title; ?>"><?php echo strip_tags($comment->com_excerpt); ?>...</a></span>
</div>

</li>
<?php
}
echo "</ul> ";
echo $after_widget;
?>
<?php }

function update($new_instance, $old_instance) {
//update and save the widget
return $new_instance;
}
function form($instance) {
// Get the options into variables, escaping html characters on the way
$rc_name = $instance['title'];
$rc_number = $instance['number'];
$rc_avatar = $instance['avatar_on'];
?>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Name for recent comment(optional):', TEMPLATE_DOMAIN); ?>
<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" class="widefat" value="<?php echo $rc_name; ?>" /></label></p>

<p>
<label for="<?php echo $this->get_field_id('avatar_on'); ?>"><?php _e('Enable avatar?:', TEMPLATE_DOMAIN); ?></label>
<select id="<?php echo $this->get_field_id('avatar_on'); ?>" name="<?php echo $this->get_field_name('avatar_on'); ?>">
<option<?php if($rc_avatar == 'yes') { echo " selected='selected'"; } ?> name="<?php echo $this->get_field_name('avatar_on'); ?>" value="yes"><?php _e('yes', TEMPLATE_DOMAIN); ?></option>
<option<?php if($rc_avatar == 'no') { echo " selected='selected'"; } ?> name="<?php echo $this->get_field_name('avatar_on'); ?>" value="no"><?php _e('no', TEMPLATE_DOMAIN); ?></option>
</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Total to show:', TEMPLATE_DOMAIN); ?>
<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" class="widefat" value="<?php echo $rc_number; ?>" /></label></p>

<?php
}
}
register_widget('My_THEME_Recent_Comments_Widget');



//////////////////////////////////////////////////////////////////////////
// Multi Category Featured Posts Widget
///////////////////////////////////////////////////////////////////////////
class My_THEME_Featured_Multi_Category_Widget extends WP_Widget {
function My_THEME_Featured_Multi_Category_Widget() {
//Constructor
parent::WP_Widget(false, $name = TEMPLATE_DOMAIN . ' | Featured Categories', array(
'description' => __('Displays multi category posts with thumbnail.', TEMPLATE_DOMAIN)
));
}
function widget($args, $instance) {
global $bp_existed, $post;
// outputs the content of the widget
extract($args); // Make before_widget, etc available.

$feat_title = empty($instance['title']) ? __('Featured Categories', TEMPLATE_DOMAIN) : apply_filters('widget_title', $instance['title']);

$feat_name = isset($instance['featcatname']) ? $instance['featcatname'] : "";
$feat_thumb = isset($instance['featthumb']) ? $instance['featthumb'] : "";
$feat_thumb_size = isset($instance['featthumbsize']) ? $instance['featthumbsize'] : "";
$feat_data = isset($instance['featdata']) ? $instance['featdata'] : "";
$feat_total = isset($instance['feattotal']) ? $instance['feattotal'] : "";

$unique_id = $args['widget_id'];

echo $before_widget;

echo $before_title . $feat_title . $after_title;

echo "<ul class='featured-cat-posts'>";
$my_query = new WP_Query('cat='. $feat_name . '&' . 'showposts=' . $feat_total);
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate = $post->ID;
$the_post_ids = get_the_ID();
$thepostlink = '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';
?>

<li class="<?php echo get_has_thumb(); ?> <?php echo 'the-sidefeat-'.$feat_thumb_size; ?>">
<?php if($feat_thumb == 'yes') { ?>
<?php if($feat_thumb_size == '' || $feat_thumb_size == 'thumbnail'): ?>
<?php echo get_featured_post_image($thepostlink,'</a>',50,50,'featpost alignleft','thumbnail', mp_get_image_alt_text(), the_title_attribute('echo=0'), false); ?>
<?php else: ?>
<?php echo get_featured_post_image(''.$thepostlink,'</a>',480,320,'featpost alignleft','medium', mp_get_image_alt_text(), the_title_attribute('echo=0'), false); ?>
<?php endif; ?>
<?php } ?>
<div class="feat-post-meta">
<h5 class="feat-title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
<?php if($feat_data != 'disable') { ?>
<div class="feat-meta">
<small><?php echo the_time( get_option( 'date_format' ) ); ?><?php if ( comments_open() ) { ?><span class="widget-feat-comment"> - <?php comments_popup_link(__('No Comment',TEMPLATE_DOMAIN), __('1 Comment',TEMPLATE_DOMAIN), __('% Comments',TEMPLATE_DOMAIN) ); ?></span><?php } ?></small></div>
<?php } ?>
</div>
</li>
<?php endwhile; wp_reset_query(); ?>
<?php
echo "</ul>";
echo $after_widget;
// end echo result
}


function update($new_instance, $old_instance) {
//update and save the widget
return $new_instance;
}
function form($instance) {
// Get the options into variables, escaping html characters on the way
$feat_title = isset($instance['title']) ? $instance['title'] : "";
$feat_name = isset($instance['featcatname']) ? $instance['featcatname'] : "";
$feat_thumb_size = isset($instance['featthumbsize']) ? $instance['featthumbsize'] : "";
$feat_thumb = isset($instance['featthumb']) ? $instance['featthumb'] : "";
$feat_total = isset($instance['feattotal']) ? $instance['feattotal'] : "";
$feat_data = isset($instance['featdata']) ? $instance['featdata'] : "";
?>


<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e("Title:",TEMPLATE_DOMAIN); ?> <em><?php _e("*required",TEMPLATE_DOMAIN); ?></em></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $feat_title; ?>" />
</p>

<p><label for="<?php echo $this->get_field_id('featcatname'); ?>"><?php _e("Category ID:",TEMPLATE_DOMAIN); ?><br /><em><?php _e("*separate by commas [,]",TEMPLATE_DOMAIN); ?></em> </label>
<input type="text" class="widefat" id="<?php echo $this->get_field_id('featcatname'); ?>" name="<?php echo $this->get_field_name('featcatname'); ?>" value="<?php echo $feat_name; ?>" />
</p>

<p><label for="<?php echo $this->get_field_id('featthumb'); ?>"><?php _e('Enable Thumbnails?:<br /><em>*post featured images</em>', TEMPLATE_DOMAIN); ?></label>
<select class="widefat" id="<?php echo $this->get_field_id('featthumb'); ?>" name="<?php echo $this->get_field_name('featthumb'); ?>">
<option<?php if($feat_thumb == 'yes') { echo " selected='selected'"; } ?> name="<?php echo $this->get_field_name('featthumb'); ?>" value="yes"><?php _e('yes', TEMPLATE_DOMAIN); ?></option>
<option<?php if($feat_thumb== 'no') { echo " selected='selected'"; } ?> name="<?php echo $this->get_field_name('featthumb'); ?>" value="no"><?php _e('no', TEMPLATE_DOMAIN); ?></option>
</select>
</p>

<p><label for="<?php echo $this->get_field_id('featthumbsize'); ?>"><?php _e('Thumbnails Size?:', TEMPLATE_DOMAIN); ?>    </label>
<select class="widefat" id="<?php echo $this->get_field_id('featthumbsize'); ?>" name="<?php echo $this->get_field_name('featthumbsize'); ?>">
<option<?php if($feat_thumb_size == 'thumbnail') { echo " selected='selected'"; } ?> name="<?php echo $this->get_field_name('featthumbsize'); ?>" value="thumbnail"><?php _e('thumbnail', TEMPLATE_DOMAIN); ?></option>
<option<?php if($feat_thumb_size == 'medium') { echo " selected='selected'"; } ?> name="<?php echo $this->get_field_name('featthumbsize'); ?>" value="medium"><?php _e('medium', TEMPLATE_DOMAIN); ?></option>
</select>
</p>


<p><label for="<?php echo $this->get_field_id('featdata'); ?>"><?php _e('Enable Post Meta?:<br /><em>*post date and post comments count</em>', TEMPLATE_DOMAIN); ?></label>
<select class="widefat" id="<?php echo $this->get_field_id('featdata'); ?>" name="<?php echo $this->get_field_name('featdata'); ?>">
<option<?php if($feat_data == 'enable') { echo " selected='selected'"; } ?> name="<?php echo $this->get_field_name('featdata'); ?>" value="enable"><?php _e('Enable', TEMPLATE_DOMAIN); ?></option>
<option<?php if($feat_data == 'disable') { echo " selected='selected'"; } ?> name="<?php echo $this->get_field_name('featdata'); ?>" value="disable"><?php _e('Disable', TEMPLATE_DOMAIN); ?></option>
</select>
</p>

<p><label for="<?php echo $this->get_field_id('feattotal'); ?>"><?php _e("Total:",TEMPLATE_DOMAIN); ?></label> <br />
<input class="widefat" id="<?php echo $this->get_field_id('feattotal'); ?>" name="<?php echo $this->get_field_name('feattotal'); ?>" type="text" value="<?php echo $feat_total; ?>" />
</p>
<?php
}
}
register_widget('My_THEME_Featured_Multi_Category_Widget');




//////////////////////////////////////////////////////////////////////////
// Multi Custom Post Type Featured Posts Widget
///////////////////////////////////////////////////////////////////////////
class My_THEME_Featured_Multi_CPT_Widget extends WP_Widget {
function My_THEME_Featured_Multi_CPT_Widget() {
//Constructor
parent::WP_Widget(false, $name = TEMPLATE_DOMAIN . ' | Custom Post Type', array(
'description' => __('Displays custom post type posts with thumbnail.', TEMPLATE_DOMAIN)
));
}
function widget($args, $instance) {
global $bp_existed, $post;
// outputs the content of the widget
extract($args); // Make before_widget, etc available.

$cpt_title = empty($instance['title']) ? __('Custom Posts', TEMPLATE_DOMAIN) : apply_filters('widget_title', $instance['title']);

$cpt_name = isset($instance['cptname']) ? $instance['cptname'] : "";
$cpt_thumb = isset($instance['cptthumb']) ? $instance['cptthumb'] : "";
$cpt_thumb_size = isset($instance['cptthumbsize']) ? $instance['cptthumbsize'] : "";
$cpt_data = isset($instance['cptdata']) ? $instance['cptdata'] : "";
$cpt_total = isset($instance['cpttotal']) ? $instance['cpttotal'] : "";

$unique_id = $args['widget_id'];

echo $before_widget;

echo $before_title . $cpt_title . $after_title;

echo "<ul class='featured-cat-posts'>";
$my_query = new WP_Query('post_type='. $cpt_name . '&' . 'showposts=' . $cpt_total);
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate = $post->ID;
$the_post_ids = get_the_ID();
$thepostlink = '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';
?>

<li class="<?php echo get_has_thumb(); ?> <?php echo 'the-sidefeat-'.$cpt_thumb_size; ?>">
<?php if($cpt_thumb == 'yes') { ?>
<?php if($cpt_thumb_size == '' || $cpt_thumb_size == 'thumbnail'): ?>
<?php echo get_featured_post_image($thepostlink,'</a>',50,50,'featpost alignleft','thumbnail', mp_get_image_alt_text(), the_title_attribute('echo=0'), false); ?>
<?php else: ?>
<?php echo get_featured_post_image(''.$thepostlink,'</a>',480,320,'featpost alignleft','medium', mp_get_image_alt_text(), the_title_attribute('echo=0'), false); ?>
<?php endif; ?>
<?php } ?>
<div class="feat-post-meta">
<h5 class="feat-title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
<?php if($cpt_data != 'disable') { ?>
<div class="feat-meta">
<small><?php echo the_time( get_option( 'date_format' ) ); ?><?php if ( comments_open() ) { ?><span class="widget-feat-comment"> - <?php comments_popup_link(__('No Comment',TEMPLATE_DOMAIN), __('1 Comment',TEMPLATE_DOMAIN), __('% Comments',TEMPLATE_DOMAIN) ); ?></span><?php } ?></small></div>
<?php } ?>
</div>
</li>
<?php endwhile; wp_reset_postdata(); ?>
<?php
echo "</ul>";
echo $after_widget;
// end echo result
}


function update($new_instance, $old_instance) {
//update and save the widget
return $new_instance;
}
function form($instance) {
// Get the options into variables, escaping html characters on the way
$cpt_title = isset($instance['title']) ? $instance['title'] : "";
$cpt_name = isset($instance['cptname']) ? $instance['cptname'] : "";
$cpt_thumb = isset($instance['cptthumb']) ? $instance['cptthumb'] : "";
$cpt_thumb_size = isset($instance['cptthumbsize']) ? $instance['cptthumbsize'] : "";
$cpt_data = isset($instance['cptdata']) ? $instance['cptdata'] : "";
$cpt_total = isset($instance['cpttotal']) ? $instance['cpttotal'] : "";
?>


<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e("Title:",TEMPLATE_DOMAIN); ?> <em><?php _e("*required",TEMPLATE_DOMAIN); ?></em></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $cpt_title; ?>" />
</p>

<p><label for="<?php echo $this->get_field_id('cptname'); ?>"><?php _e("Select Custom Post Type:",TEMPLATE_DOMAIN); ?></label>

<select class="widefat" id="<?php echo $this->get_field_id('cptname'); ?>" name="<?php echo $this->get_field_name('cptname'); ?>">

<?php
$all_cpt = mp_get_all_posttype();
foreach($all_cpt as $cpts) {
if($cpt_name == $cpts) { $is_selected = ' selected="selected" '; } else { $is_selected = ""; }
$cptlist = '<option '. $is_selected . 'name="'.$this->get_field_name('cptname').'" value="'.$cpts.'">'. $cpts. '</option>';
echo $cptlist;
}
?>
</select>

</p>

<p><label for="<?php echo $this->get_field_id('cptthumb'); ?>"><?php _e('Enable Thumbnails?:<br /><em>*post featured images</em>', TEMPLATE_DOMAIN); ?></label>
<select class="widefat" id="<?php echo $this->get_field_id('cptthumb'); ?>" name="<?php echo $this->get_field_name('cptthumb'); ?>">
<option<?php if($cpt_thumb == 'yes') { echo " selected='selected'"; } ?> name="<?php echo $this->get_field_name('cptthumb'); ?>" value="yes"><?php _e('yes', TEMPLATE_DOMAIN); ?></option>
<option<?php if($cpt_thumb== 'no') { echo " selected='selected'"; } ?> name="<?php echo $this->get_field_name('cptthumb'); ?>" value="no"><?php _e('no', TEMPLATE_DOMAIN); ?></option>
</select>
</p>

<p><label for="<?php echo $this->get_field_id('cptthumbsize'); ?>"><?php _e('Thumbnails Size?:', TEMPLATE_DOMAIN); ?>    </label>
<select class="widefat" id="<?php echo $this->get_field_id('cptthumbsize'); ?>" name="<?php echo $this->get_field_name('cptthumbsize'); ?>">
<option<?php if($cpt_thumb_size == 'thumbnail') { echo " selected='selected'"; } ?> name="<?php echo $this->get_field_name('cptthumbsize'); ?>" value="thumbnail"><?php _e('thumbnail', TEMPLATE_DOMAIN); ?></option>
<option<?php if($cpt_thumb_size == 'medium') { echo " selected='selected'"; } ?> name="<?php echo $this->get_field_name('cptthumbsize'); ?>" value="medium"><?php _e('medium', TEMPLATE_DOMAIN); ?></option>
</select>
</p>


<p><label for="<?php echo $this->get_field_id('cptdata'); ?>"><?php _e('Enable Post Meta?:<br /><em>*post date and post comments count</em>', TEMPLATE_DOMAIN); ?></label>
<select class="widefat" id="<?php echo $this->get_field_id('cptdata'); ?>" name="<?php echo $this->get_field_name('cptdata'); ?>">
<option<?php if($cpt_data == 'enable') { echo " selected='selected'"; } ?> name="<?php echo $this->get_field_name('cptdata'); ?>" value="enable"><?php _e('Enable', TEMPLATE_DOMAIN); ?></option>
<option<?php if($cpt_data == 'disable') { echo " selected='selected'"; } ?> name="<?php echo $this->get_field_name('cptdata'); ?>" value="disable"><?php _e('Disable', TEMPLATE_DOMAIN); ?></option>
</select>
</p>

<p><label for="<?php echo $this->get_field_id('cpttotal'); ?>"><?php _e("Total:",TEMPLATE_DOMAIN); ?></label> <br />
<input class="widefat" id="<?php echo $this->get_field_id('cpttotal'); ?>" name="<?php echo $this->get_field_name('cpttotal'); ?>" type="text" value="<?php echo $cpt_total; ?>" />
</p>
<?php
}
}
register_widget('My_THEME_Featured_Multi_CPT_Widget');




/////////////////////////////////////////////////////////////////////////////////
// register widget template
/////////////////////////////////////////////////////////////////////////////////
function theme_widget_right_sidebar_ads() {
$get_right_ads_code = get_theme_option('ads_right_sidebar'); if($get_right_ads_code != '') { ?>
<aside class="widget">
<div class="textwidget adswidget"><?php echo stripcslashes(do_shortcode($get_right_ads_code)); ?></div>
</aside>
<?php }
}
wp_register_sidebar_widget( TEMPLATE_DOMAIN.'_ads_right',ucfirst(TEMPLATE_DOMAIN).' - Ads Right', 'theme_widget_right_sidebar_ads','' );

function theme_widget_left_sidebar_ads() {
$get_left_ads_code = get_theme_option('ads_left_sidebar'); if($get_left_ads_code != '') { ?>
<aside class="widget ctr-ad">
<div class="textwidget adswidget"><?php echo stripcslashes(do_shortcode($get_left_ads_code)); ?></div>
</aside>
<?php }
}
wp_register_sidebar_widget( TEMPLATE_DOMAIN.'_ads_left',ucfirst(TEMPLATE_DOMAIN).' - Ads Left', 'theme_widget_left_sidebar_ads','' );

function theme_widget_twitter_box() {
if( get_theme_option('twitter_widget_id') ) { ?>
<aside class="widget effect-1" id="twitter-blk">
<h3 class="widget-title"><i class="fa fa-twitter"></i><span><?php _e('Recent Tweets', TEMPLATE_DOMAIN); ?></span></h3>
<div class="textwidget" id="twitter-news"></div>
</aside>
<?php
}
}
wp_register_sidebar_widget( TEMPLATE_DOMAIN.'_twitter_box',ucfirst(TEMPLATE_DOMAIN).' - Twitter Box', 'theme_widget_twitter_box','' );


function theme_widget_social_box() { ?>
<?php get_template_part('lib/templates/social-box'); ?>
<?php
}
//wp_register_sidebar_widget( TEMPLATE_DOMAIN.'_social_box',ucfirst(TEMPLATE_DOMAIN).' - Social Box', 'theme_widget_social_box','' );


function theme_widget_random_posts() {
echo '<aside class="widget effect-1">';
echo '<h3 class="widget-title"><span>'. __('Random Posts', TEMPLATE_DOMAIN) . '</span></h3>';
mp_get_random_post(10);
echo '</ul></aside>';
}
wp_register_sidebar_widget( TEMPLATE_DOMAIN.'_random_posts',ucfirst(TEMPLATE_DOMAIN).' - Random Posts', 'theme_widget_random_posts','' );

////////////////////////////////////////////////////////////////////////////////
// widget css
////////////////////////////////////////////////////////////////////////////////

function theme_add_widget_style_head() {
print "<style type='text/css' media='screen'>"; ?>
.gravatar_recent_comment li { padding:0px; font-size: 1.025em; line-height:1.5em;  }
.gravatar_recent_comment span.author { font-weight:bold; }
.gravatar_recent_comment img { width:32px; height:32px; float:left; margin: 0 10px 0 0; }
<?php print "</style>";
}
add_action('wp_head','theme_add_widget_style_head');


?>