<?php
/*--------------------------------------------
Description: add top header ads
---------------------------------------------*/
function add_topheader_ads() {
$header_banner = get_theme_option('ads_top_header');
if($header_banner != '') {
echo '<div id="topbanner">';
echo stripcslashes(do_shortcode($header_banner));
echo '</div>';
}
}
add_action('bp_inside_header','add_topheader_ads');


function mp_add_custom_img_header() {
if( get_header_image() ) {
echo '<div id="custom-img-header">';
echo '<img src="' . get_header_image() . '" alt="'. get_bloginfo('name') . '" /></div>';
}
}
add_action('bp_after_header','mp_add_custom_img_header');

/*--------------------------------------------
Description: add fav icon
---------------------------------------------*/
function add_mp_fav_icon() {
if( get_theme_option('fav_icon') ) {
echo '<link rel="icon" href="'. get_theme_option('fav_icon') . '" type="images/x-icon" />';
}
}
add_action('wp_head','add_mp_fav_icon');
add_action('admin_head','add_mp_fav_icon');
add_action('login_head','add_mp_fav_icon');

/*--------------------------------------------
Description: check show avatars
---------------------------------------------*/
function add_mp_check_avatars() {
$show_avatars = get_option('show_avatars');
if( $show_avatars != '1'  ) {
echo '<style>'; ?>
#custom ol.commentlist li div.vcard {padding-left: 0px;}
#custom #commentpost ol.commentlist li ul li .vcard {padding-left: 0 !important;}
#post-entry #author-bio #author-description {margin: 0;}
#custom ol.commentlist li ul.children li.depth-4 {margin: 0;}
<?php echo '</style>';
}
}
add_action('wp_head','add_mp_check_avatars');


/*--------------------------------------------
Description: add featured slider js
---------------------------------------------*/
function add_article_slider_js() {
$featured_on = get_theme_option('slider_on');
$paged = get_query_var( 'paged' );
if ( ( is_home() || is_front_page() || is_page_template('page-templates/template-blog.php') ) && $featured_on == 'Enable' ):
if ( !$paged ) :
?>
<script>
        jQuery(document).ready(function ($) {
            var options = {

                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
                $UISearchMode: 0,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $Loop: 1,                                       //[Optional] Enable loop(circular) of carousel or not, 0: stop, 1: loop, 2 rewind, default value is 1
                    $SpacingX: 3,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 8,                              //[Optional] Number of pieces to display, default value is 1

                    $ParkingPosition: 253,                          //[Optional] The offset position to park thumbnail,

                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                        $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                        $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                        $Steps: 6                                       //[Optional] Steps to go for each navigation request, default value is 1
                    }
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider1.$ScaleWidth(Math.min(parentWidth, 1000));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
<?php endif; endif;
}
add_action('bp_after_wp_head','add_article_slider_js');

/*--------------------------------------------
Description: add featured article
---------------------------------------------*/
function add_article_slider_header() {
global $page, $paged;
$paged = get_query_var( 'paged' );
if( ( is_home() || is_front_page() || is_page_template('page-templates/template-blog.php')) && get_theme_option('slider_on') == 'Enable') {
if ( !$paged ) {
get_template_part( 'lib/sliders/gallery-slider' );
}
}
}
add_action('bp_before_blog_home','add_article_slider_header');


/*--------------------------------------------
Description: add headline
---------------------------------------------*/
function add_header_headline() {
if( is_archive() && get_post_type() == 'post' ) {
get_template_part( 'lib/templates/headline' );
}
}
add_action('bp_before_blog_home','add_header_headline');

/*--------------------------------------------
Description: add breadcrumbs
---------------------------------------------*/
function add_header_breadcrumbs() {
if( is_archive()) { mp_the_breadcrumb(); }
}
add_action('bp_before_blog_home','add_header_breadcrumbs');

function add_header_single_breadcrumbs() {
if( is_singular() ) { mp_the_breadcrumb(); }
}
add_action('bp_before_blog_home','add_header_single_breadcrumbs');

/*--------------------------------------------
Description: add left sidebar
---------------------------------------------*/
function add_mp_sidebar_left() {
global $in_bbpress, $bp_active;
if( is_singular() || ($bp_active == 'true' && function_exists('bp_is_blog_page') && !bp_is_blog_page() ) || (function_exists('is_in_woocommerce_page') && is_in_woocommerce_page() )  || ($in_bbpress == 'true') ) {
} else {
get_sidebar( 'left' );
}
}
add_action('bp_after_blog_home','add_mp_sidebar_left');


/*--------------------------------------------
Description: add post-entry-right
---------------------------------------------*/
function add_featured_cat_box() {
global $page, $paged;
$paged = get_query_var( 'paged' );
if ( is_home() || is_front_page() ) {
if ( !$paged ) {
get_template_part('lib/templates/feat-cat');
}
}
}
add_action('bp_after_content','add_featured_cat_box');

/*--------------------------------------------
Description: add mobile nav
---------------------------------------------*/
function mp_add_mobile_nav() {
echo '<div id="mobile-nav">';
get_mobile_navigation( $type='top', $nav_name="primary" );
echo '</div>';
}
add_action('bp_inside_nav','mp_add_mobile_nav');


/*--------------------------------------------
Description: add search in nav
---------------------------------------------*/
function mp_add_nav_search() {
echo '<div id="nav-searchform">';
echo get_search_form();
echo '</div>';
}
add_action('bp_inside_nav','mp_add_nav_search');

/*--------------------------------------------
Description: add social in nav
---------------------------------------------*/
function mp_add_nav_social() {
echo '<div id="nav-social">';
get_template_part('lib/templates/social-box');
echo '</div>';
}
//add_action('bp_inside_header','mp_add_nav_social');

/*--------------------------------------------
Description: add ads in post loop
---------------------------------------------*/
function mp_add_ads_post_loop() {
global $postcount;
$get_ads_code_one = get_theme_option('ads_loop_one');
$get_ads_code_two = get_theme_option('ads_loop_two');
if( !is_singular() ) {
if( $get_ads_code_one == '' && $get_ads_code_two == '') {
} else {
if( 2 == $postcount && $get_ads_code_one ){
echo '<div class="ad-loop-post">';
echo stripcslashes(do_shortcode($get_ads_code_one));
echo '<div class="separator"></div></div>';
} elseif( 4 == $postcount && $get_ads_code_two ){
echo '<div class="ad-loop-post">';
echo stripcslashes(do_shortcode($get_ads_code_two));
echo '<div class="separator"></div></div>';
}
}
}
}
add_action('bp_after_blog_post','mp_add_ads_post_loop');




/*****************************************************************************************
Add Color Option to Category
http://wordpress.stackexchange.com/questions/112866/adding-colorpicker-field-to-category
*****************************************************************************************/
$categories2 = get_categories('hide_empty=0&orderby=name');
$wp_cats2 = array();
foreach ($categories2 as $category_list ) {
$wp_cats2[$category_list->cat_ID] = $category_list->cat_name;
}
function mp_extra_category_fields( $tag ) {
$t_id = $tag->term_id;
$cat_meta = get_option( "category_$t_id" );
?>
<tr class="form-field">
<th scope="row" valign="top"><label for="meta-color"><?php _e('Category Color'); ?></label></th>
<td>
<div id="colorpicker">
<input type="text" name="cat_meta[catBG]" class="colorpicker" size="10" style="width:50%;" value="<?php echo (isset($cat_meta['catBG'])) ? $cat_meta['catBG'] : ''; ?>" />
</div>
<br />
<span class="description"></span>
<br />
</td>
</tr>
<?php
}


/** Save Category Meta **/
function mp_save_extra_category_fileds( $term_id ) {
if ( isset( $_POST['cat_meta'] ) ) {
        $t_id = $term_id;
        $cat_meta = get_option( "category_$t_id");
        $cat_keys = array_keys($_POST['cat_meta']);
foreach ($cat_keys as $key){
if (isset($_POST['cat_meta'][$key])){
$cat_meta[$key] = $_POST['cat_meta'][$key];
}
}
//save the option array
update_option( "category_$t_id", $cat_meta );
}
}


/** Enqueue Color Picker **/
function mp_colorpicker_enqueue() {
wp_enqueue_style( 'wp-color-picker' );
wp_enqueue_script( 'colorpicker-js', get_template_directory_uri() . '/lib/admin/js/wp-colorpicker.js', array( 'wp-color-picker' ) );
}

add_action ('category_add_form_fields', 'mp_extra_category_fields');
add_action ('category_edit_form_fields','mp_extra_category_fields');
add_action ('edited_category', 'mp_save_extra_category_fileds');
add_action ('admin_enqueue_scripts', 'mp_colorpicker_enqueue' );


/*****************************************************************************************
Add Cat Color Options
*****************************************************************************************/
function dev_theme_custom_style_init() {
global $wp_cats2;
print '<style type="text/css" media="all">' . "\n";
foreach ($wp_cats2 as $cat_value) {
$cat_id = get_cat_ID($cat_value);
$cat_data = get_option("category_$cat_id");
$cat_color = $cat_data['catBG']; if($cat_color) { ?>
#post-entry article.cat_<?php echo $cat_id; ?> span.color-category a { color: <?php echo $cat_color; ?> !important; }
<?php } }
print '</style>' . "\n";
}
add_action('wp_head','dev_theme_custom_style_init',10);


/*--------------------------------------------
Description: disable index for paginate comments
---------------------------------------------*/
function mp_seo_for_comments() {
 global $cpage, $post;
 if ( $cpage > 1 && is_single() ) {
  echo "\n";
  echo "<meta name='robots' content='noindex,follow' />";
  echo "\n";
}
}
add_action( 'wp_head', 'mp_seo_for_comments' );

/*--------------------------------------------
Description: remove pingback for interlink
---------------------------------------------*/
function mp_disable_self_ping( &$links ) {
foreach ( $links as $l => $link )
if ( 0 === strpos( $link, get_option( 'home' ) ) )
unset($links[$l]);
}
add_action( 'pre_ping', 'mp_disable_self_ping' );


/*--------------------------------------------
Description: alter comment_form
---------------------------------------------*/
function mp_alter_comment_form_fields($fields){
$fields['author'] = '<p class="comment-form-author"><i class="fa fa-user"></i><input id="author" name="author" type="text" placeholder="" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
$fields['email'] = '<p class="comment-form-email"><i class="fa fa-envelope"></i><input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
$fields['url'] = '<p class="comment-form-url"><i class="fa fa-link"></i><input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';
return $fields;
}
//add_filter('comment_form_default_fields','mp_alter_comment_form_fields');

function mp_alter_comment_form_default($default){
$default['comment_notes_before'] = '';
$default['comment_notes_after'] = '';
$default['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';
return $default;
}
//add_filter('comment_form_defaults','mp_alter_comment_form_default');



/*--------------------------------------------
Description: add schema for post
---------------------------------------------*/
function mp_add_itemtype_article() { echo ' itemscope="" itemtype="http://schema.org/Article"'; }
function mp_add_itemtype_post_title() { echo ' itemprop="name headline"'; }
function mp_add_itemtype_post_content() { echo ' itemprop="articleBody"'; }



if( !function_exists('mp_out_custom_excerpt') ) {
function mp_out_custom_excerpt($text,$limit) {
global $post;
$output = strip_tags($text);
$output = strip_shortcodes($output);
$output = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $output );
$output = str_replace( '"', "'", $output);
$output = explode(' ', $output, $limit);
if (count($output)>=$limit) {
array_pop($output);
$output = implode(" ",$output).'...';
} else {
$output = implode(" ",$output);
}
return trim($output);
}
}

if(!function_exists('mp_get_user_role')) {
function mp_get_user_role($id) {
$user = new WP_User( $id );
if ( !empty( $user->roles ) && is_array( $user->roles ) ) {
foreach ( $user->roles as $role )
return ucfirst($role);
} else {
return 'User';
}
}
}


function mp_add_custom_schema($content) {
global $post,$aioseop_options;
if( is_single() ) {
$post_aioseo_title = get_post_meta($post->ID, '_aioseop_title', true);
$author_id = get_the_author_meta('ID');
$author_email = get_the_author_meta('user_email');
$author_displayname = get_the_author_meta('display_name');
$author_nickname = get_the_author_meta('nickname');
$author_firstname = get_the_author_meta('first_name');
$author_lastname = get_the_author_meta('last_name');
$author_url = get_the_author_meta('user_url');
$author_status = get_the_author_meta('user_level');
$author_description = get_the_author_meta('user_description');
$author_role = mp_get_user_role($author_id);
// get post thumbnail
$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "thumbnail" );
$large_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "large" );
$schema = '';
?>
<?php
$schema .=  '<!-- start data:schema --><span class="post-schema">';
$schema .= '<a itemprop="url" href="'. get_permalink() . '" rel="bookmark" title="' . the_title_attribute('echo=0') . ' ">' . get_permalink() . '</a>';

if($post_aioseo_title):
$schema .= '<span itemprop="alternativeHeadline">' . $post_aioseo_title . '</span>';
endif;

if($large_src):
$schema .= '<span itemprop="image">' . $large_src[0] . '</span>';
endif;
if($thumbnail_src):
$schema .= '<span itemprop="thumbnailUrl">' . $thumbnail_src[0] . '</span>';
endif;
$getmodtime = get_the_modified_time();
if( $getmodtime > get_the_time() ) {
$modtime = get_the_modified_time('c');
} else {
$modtime = get_the_time('c');
}
$schema .= '<time datetime="'.get_the_time('Y-m-d') . '" itemprop="datePublished"><span class="date updated">'. $modtime . '</span></time><span class="vcard author"><span class="fn">'.get_the_author().'</span></span>';
$categories = get_the_category();
$separator = ', ';
$output = '';
if($categories){
foreach($categories as $category) {
$schema .= '<span itemprop="articleSection">' . $category->cat_name . '</span>';
}
}
$posttags = get_the_tags();
$post_tags_list = '';
if ($posttags) {
$schema .= '<span itemprop="keywords">';
foreach($posttags as $tag) {
$post_tags_list .= $tag->name . ',';
}
$schema .= substr( $post_tags_list,0,-1 );
$schema .= '</span>';
}
$schema .= '<div itemprop="description">'. mp_out_custom_excerpt(get_the_content(),50) .'</div>';
$schema .= '<span itemprop="author" itemscope="" itemtype="http://schema.org/Person">';
if($author_googleplus_profile):
$schema .= '<span itemprop="name">'.$author_displayname.'</span><a href="'. $author_googleplus_profile. '?rel=author" itemprop="url">'. $author_googleplus_profile . '</a>';
endif;
$schema .= '<span itemprop="givenName">'.$author_firstname.'</span>
<span itemprop="familyName">'.$author_lastname.'</span><span itemprop="email">'.$author_email . '</span><span itemprop="jobTitle">'. $author_role . '</span>';
if($author_description):
$schema .= '<span itemprop="knows">'.stripcslashes($author_description).'</span>';
endif;
$schema .= '<span itemprop="brand">'. get_bloginfo('name').'</span>';
$schema .= '</span>';
$schema .= '</span><!-- end data:schema -->';
return $content . $schema;
} else {
return $content;
}
}


function mp_init_schema_features() {
/* check if schema is on */
$schema_on = '';
$schema_on = get_theme_option('schema_post_on');
/* if another plugin schema is active */
if( function_exists('sj_add_google_author_schema') && get_option('sj_gplus_schema') == 'Enable' ) {
} else {
if( $schema_on == 'Enable' ) {
add_filter('the_content', 'mp_add_custom_schema');
add_action('bp_article_start','mp_add_itemtype_article');
add_action('bp_article_post_title','mp_add_itemtype_post_title');
add_action('bp_article_post_content','mp_add_itemtype_post_content');
}
}
}
add_action('wp_head','mp_init_schema_features');




?>