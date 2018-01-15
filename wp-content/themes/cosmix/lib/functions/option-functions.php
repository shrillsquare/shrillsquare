<?php
////////////////////////////////////////////////////////////////////////////////
// get theme option
////////////////////////////////////////////////////////////////////////////////
if( !function_exists('get_theme_option') ):
function get_theme_option($option_n) {
$options = get_option( TEMPLATE_OPTIONS );
if( !empty($options[ $option_n ]) ) { return stripslashes( $options[ $option_n ] ); }
}
endif;

////////////////////////////////////////////////////////////////////////////////
// global upload path
////////////////////////////////////////////////////////////////////////////////
$option_upload = wp_upload_dir();
$option_upload_path = $option_upload['basedir'];
$option_upload_url = $option_upload['baseurl'];


////////////////////////////////////////////////////////////////////////////////
// multiple string option page
////////////////////////////////////////////////////////////////////////////////
function _g($str) { return $str; }
function mp_theme_admin_head_script() {
global $theme_version;
if (isset( $_GET["page"] ) && $_GET["page"] == "theme-options") {
wp_enqueue_script( 'theme-color-picker-js', get_template_directory_uri() . '/lib/admin/js/colorpicker.js', array( 'jquery' ), $theme_version );
wp_enqueue_script( 'theme-option-custom-js', get_template_directory_uri() . '/lib/admin/js/options-custom.js', array( 'jquery' ), $theme_version );
?>
<?php
}
}

function mp_theme_admin_head_style() {
global $theme_version;
if( isset( $_GET["page"] ) ):
if ($_GET["page"] == "theme-options" || $_GET["page"] == "custom-css") {
wp_enqueue_style( 'admin-css', get_template_directory_uri() . '/lib/admin/css/admin.css', array(), $theme_version );
wp_enqueue_style( 'color-picker-main', get_template_directory_uri() . '/lib/admin/css/colorpicker.css', array(), $theme_version );
?>
<?php } endif;
}
add_action('admin_footer', 'mp_theme_admin_head_script');
add_action('admin_print_styles', 'mp_theme_admin_head_style');



////////////////////////////////////////////////////////////////////////////////
// Theme Option
////////////////////////////////////////////////////////////////////////////////
$theme_data = wp_get_theme( TEMPLATE_DOMAIN );
$theme_options = TEMPLATE_OPTIONS;
$theme_version = $theme_data['Version'];
$theme_name = $theme_data['Name'];
$choose_count = array("Select a number","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20");
$choose_weight = array("Select font weight",'light','lighter','normal','bold','100','200','300','400','600','700','800','900');
/* including fonts functions */
include_once( get_template_directory() . '/lib/functions/fonts-functions.php');


function mp_theme_admin_head_global() {
global $wp_cats;
if( isset( $_GET["page"] ) && $_GET["page"] == "theme-options" ) {
$categories = get_categories('hide_empty=0&orderby=name');
//print_r($categories);
$wp_cats = array();
foreach ($categories as $category_list ) {
$wp_cats[$category_list->cat_ID] = $category_list->cat_ID;
}
array_unshift($wp_cats, "Choose a category");
}
}
add_action('admin_head','mp_theme_admin_head_global');

////////////////////////////////////////////////////////////////////////////////
//Theme Option Page
////////////////////////////////////////////////////////////////////////////////
function mp_theme_menu() {
global $theme_name;
add_theme_page( $theme_name . __(' Theme Options', TEMPLATE_DOMAIN), __('Theme Options', TEMPLATE_DOMAIN), 'edit_theme_options', 'theme-options', 'mp_theme_page');
}
add_action('admin_menu', 'mp_theme_menu');


function mp_theme_admin_tabs( $current = 'general' ) {
$tabs = array( 'general' => 'General', 'custom-css' => 'Custom CSS' );
$links = array();
echo '<div id="icon-themes" class="icon32"><br></div>';
echo '<h2 class="nav-tab-wrapper">';
foreach( $tabs as $tab => $name ){
$class = ( $tab == $current ) ? ' nav-tab-active' : '';
echo "<a class='nav-tab$class' href='?page=theme-options&tab=$tab'>$name</a>";
}
echo '</h2>';
}

////////////////////////////////////////////////////////////////////////////////
//Callback function to the add_theme_page
//Will display the theme options page
////////////////////////////////////////////////////////////////////////////////
function mp_theme_page() {
global $theme_options,$theme_name;
if ( isset ( $_GET['tab'] ) ) mp_theme_admin_tabs($_GET['tab']); else mp_theme_admin_tabs('general'); ?>
<?php
if ( isset ( $_GET['tab'] ) ) $tab = $_GET['tab'];
else $tab = 'general';
switch ( $tab ) {
case 'custom-css' :
mp_custom_css_theme_page();
break;
case 'general' :
?>
<div id="custom-theme-option" class="wrap">
<?php if ( isset($_GET['settings-updated']) && false !== $_REQUEST['settings-updated'] ) : ?>
<?php echo '<div class="updated fade"><p><strong>'. $theme_name . __(' settings saved.', TEMPLATE_DOMAIN) . '</strong></p></div>'; ?>
<?php endif; ?>
<?php if ( isset($_GET['page']) && $_GET['page'] == 'theme-options' && isset($_POST['action']) && $_POST['action'] == 'settings-reset' ) : ?>
<?php echo '<div class="updated fade"><p><strong>'. $theme_name . __(' settings reset.', TEMPLATE_DOMAIN) . '</strong></p></div>'; ?>
<?php endif; ?>

<?php if( !defined('MAG_SUPPORT_FEED') ): ?>
<!-- START ANNOUCE -->
<div id="announce">
<div id="socialbox">
<p>Thank You For Using <?php echo $theme_name; ?> WordPress Theme By <a rel="nofollow" href="http://www.magpress.com" target="_blank">MagPress.com</a></p>
<a title="Like MagPress on Facebook" href="https://www.facebook.com/magpresswpthemes"><img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/lib/admin/images/facebook.png" alt="Facebook" /></a>
<a title="Follow MagPress on Twitter" href="https://twitter.com/magpresswptheme"><img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/lib/admin/images/twitter.png" alt="Twitter" /></a>
<a title="Connect with MagPress on Google+" href="https://plus.google.com/+Magpress"><img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/lib/admin/images/googleplus.png" alt="Google+" /></a>
<a title="Share with MagPress on Pinterest" href="http://pinterest.com/magpresswptheme/"><img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/lib/admin/images/pinit.png" alt="Pinit" /></a>
<a title="Stay Update with MagPress on Feeds" href="http://feeds.feedburner.com/MagPress"><img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/lib/admin/images/feeds.png" alt="RSS Feeds" /></a>
<p class="bigp"><strong>Please Note: This Free version contained theme author or contributor credits link. check <a href="http://www.magpress.com/license-terms" target="_blank" title="Theme License and Terms">license and terms</a></strong></p>
<p>If you're interested in purchasing a developer's license for this theme, you can go to <?php echo $theme_name; ?> <a href="http://www.magpress.com/wordpress-themes/<?php echo strtolower($theme_name); ?>.html">purchase link</a> or go to this <a href="http://www.magpress.com/developer-license?theme=<?php echo strtolower($theme_name); ?>" target="_blank">developer license purchase page</a>.</p>
</div>
</div>
<!-- END ANNOUCE -->
<?php endif; ?>

<form id="wp-theme-options" method="post" action="options.php">
<?php
settings_fields($theme_options);
do_settings_sections('theme-options');
?>
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Options', TEMPLATE_DOMAIN) ?>" />
</p>
</form>
<form action="<?php echo admin_url('themes.php?page=theme-options&tab=general'); ?>" method="post">
<div style="float:left;padding:0;margin:0;" class="submit">
<?php
$alert_message = __("Are you sure you want to delete all saved settings for this theme?.", TEMPLATE_DOMAIN ); ?>
<input name="reset" type="submit" class="button-secondary" onclick="return confirm('<?php echo $alert_message; ?>')" value="<?php echo esc_attr(__('Reset Options',TEMPLATE_DOMAIN)); ?>" />
<input type="hidden" name="action" value="settings-reset" />
</div>
</form>
</div>
<?php } ?>
<?php }


//Register the settings to use on the theme options page
add_action( 'admin_init', 'mp_register_settings' );
function mp_register_settings() {
global $font_family_group, $wp_cats, $choose_count, $theme_options, $theme_name, $global_options;
include_once( get_template_directory() . '/lib/functions/option-settings.php');
// Register the settings with Validation callback
register_setting( $theme_options, $theme_options, 'mp_validate_settings' );

// main options setting
$setting_list = array('header','typography','post','slider','ads','social');

foreach($setting_list as $list) {
add_settings_section( 'mp_'. $list . '_section', ucfirst($list). __(' Settings', TEMPLATE_DOMAIN), 'mp_display_section', 'theme-options' );
}
foreach ($global_options as $value){
// Create textbox field
    $field_args = array(
      'type'      => $value['type'],
      'section'   => $value['section'],
      'id'        => $value['id'],
      'name'      => $value['name'],
      'desc'      => $value['description'],
      'std'       => $value['default'],
      'label_for' => $value['name'],
      'class'     => ''
    );
add_settings_field( $value['id'], $value['name'], 'mp_display_setting', 'theme-options', 'mp_'. $value['section'] . '_section', $field_args );
}

// custom css options setting
add_settings_section( 'mp_custom_css_section', __('Custom CSS', TEMPLATE_DOMAIN), 'mp_custom_css_display_section', 'custom-css' );
// Create textbox field
    $field_args = array(
      'type'      => 'textarea',
      'section'   => 'custom_css',
      'id'        => 'custom_css',
      'name'      => 'custom_css',
      'desc'      => __("Insert Custom CSS for this theme", TEMPLATE_DOMAIN ),
      'std'       => '',
      'label_for' => 'custom-css',
      'class'     => ''
    );
add_settings_field( 'custom_css', __('Custom CSS', TEMPLATE_DOMAIN), 'mp_custom_css_display_setting', 'custom-css', 'mp_custom_css_section', $field_args );

}

//Function to add extra text to display on each section
function mp_display_section($section){}

////////////////////////////////////////////////////////////////////////////////
// Function to display the settings on the page
// This is setup to be expandable by using a switch on the type variable.
// In future you can add multiple types to be display from this function,
// Such as checkboxes, select boxes, file upload boxes etc.
////////////////////////////////////////////////////////////////////////////////
function mp_display_setting($args) {
global $font_family_group, $wp_cats, $choose_count, $choose_weight, $theme_name, $theme_options, $global_options;
extract( $args );
$option_name = $theme_options;
$options = get_option( $option_name );

switch ( $type ) {
case 'text':
$options[$id] = !empty($options[$id]) ? $options[$id] : $std;
$options[$id] = stripslashes($options[$id]);
$options[$id] = esc_attr( $options[$id]);

echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";
echo ($desc != '') ? "<br /><label class='description'>$desc</label>" : "";


break;
case 'textarea':
$options[$id] = !empty($options[$id]) ? $options[$id] : $std;
$options[$id] = stripslashes($options[$id]);
$options[$id] = esc_attr( $options[$id]);
?>

<textarea id="<?php echo $id; ?>" name="<?php echo $option_name . "[$id]"; ?>" cols="60%" rows="8" /><?php if ( $options[$id] != "" ) { echo $options[$id]; } else { echo $std; } ?>
</textarea>
<?php if($desc != '') { ?>
<br /><label class="description" for="<?php echo $label_for; ?>"><?php echo $desc; ?></label>
<?php } ?>


<?php break;
case 'colorpicker':
$options[$id] = !empty($options[$id]) ? $options[$id] : $std;
$options[$id] = stripslashes($options[$id]);
$options[$id] = esc_attr( $options[$id]);
?>

<div id="<?php echo $id . '_picker'; ?>" class="colorSelector">
<div style="background-color:<?php if( $options[$id] ) { echo $options[$id]; } ?>"></div></div>&nbsp;
<input class="of-color" name="<?php echo $option_name. "[$id]"; ?>" id="<?php echo $id; ?>" type="text" value="<?php if( $options[$id] ) { echo $options[$id]; } ?>" />
<?php if($desc != '') { ?>
<br /><label class="description" for="<?php echo $label_for; ?>">&nbsp;&nbsp;&nbsp;<?php echo $desc; ?></label>
<?php } ?>


<?php break;
case 'select-fonts':
$options[$id] = !empty($options[$id]) ? $options[$id] : $std;
$options[$id] = stripslashes($options[$id]);
$options[$id] = esc_attr( $options[$id]);
?>

<select name="<?php echo $option_name. "[$id]"; ?>" id="<?php echo $id; ?>">
<?php foreach ($font_family_group as $font) { ?>
<option value="<?php echo $font; ?>"<?php if ( $options[$id]  == $font ) { echo ' selected="selected"'; } ?>><?php echo $font; ?></option>
<?php } ?>
</select>

<?php if($desc != '') { ?>
<label class="description" for="<?php echo $label_for; ?>"><?php echo $desc; ?></label>
<?php } ?>


<?php break;
case 'select-fonts-weight':
$options[$id] = !empty($options[$id]) ? $options[$id] : $std;
$options[$id] = stripslashes($options[$id]);
$options[$id] = esc_attr( $options[$id]);
?>

<select name="<?php echo $option_name. "[$id]"; ?>" id="<?php echo $id; ?>">
<?php foreach ($choose_weight as $count) { ?>
<option value="<?php if($count == 'Select font weight') { echo 'Select font weight'; } else { echo $count; } ?>"<?php if ( $options[$id] == $count ) { echo ' selected="selected"'; } ?>><?php echo $count; ?></option>
<?php } ?>
</select>

<?php if($desc != '') { ?>
<label class="description" for="<?php echo $label_for; ?>"><?php echo $desc; ?></label>
<?php } ?>


<?php break;

case 'select-cat':
$options[$id] = !empty($options[$id]) ? $options[$id] : $std;
$options[$id] = stripslashes($options[$id]);
$options[$id] = esc_attr( $options[$id]);
?>
<select name="<?php echo $option_name. "[$id]"; ?>" id="<?php echo $id; ?>">
<?php foreach ($wp_cats as $cat) { ?>
<option value="<?php if($cat == 'Choose a category') { echo 'Choose a category'; } else { echo $cat; } ?>"<?php if ( $options[$id] == $cat ) { echo ' selected="selected"'; } ?>><?php if( !get_cat_name( $cat ) ) { echo 'Choose a category'; } else { echo get_cat_name( $cat ); }?></option>
<?php } ?>
</select>
<?php if($desc != '') { ?>
<br /><label class="description" for="<?php echo $label_for; ?>"><?php echo $desc; ?></label>
<?php } ?>


<?php break;

case 'select-count':
$options[$id] = !empty($options[$id]) ? $options[$id] : $std;
$options[$id] = stripslashes($options[$id]);
$options[$id] = esc_attr( $options[$id]);
?>
<select name="<?php echo $option_name. "[$id]"; ?>" id="<?php echo $id; ?>">
<?php foreach ($choose_count as $count) { ?>
<option value="<?php if($count == 'Select a number') { echo 'Select a number'; } else { echo $count; } ?>"<?php if ( $options[$id] == $count ) { echo ' selected="selected"'; } ?>><?php echo $count; ?></option>
<?php } ?>
</select>
<?php if($desc != '') { ?>
<br /><label class="description" for="<?php echo $label_for; ?>"><?php echo $desc; ?></label>
<?php } ?>


<?php break;

case 'checkbox-enable-disable':
$options[$id] = !empty($options[$id]) ? $options[$id] : $std;
$options[$id] = stripslashes($options[$id]);
$options[$id] = esc_attr( $options[$id]);
$checked = "checked=\"checked\"";
?>
<input type="checkbox" class="checkbox" name="<?php echo $option_name. "[$id]"; ?>" id="<?php echo $id; ?>" value="Enable" <?php if($options[$id] == 'Enable') { echo $checked; } ?> />&nbsp;&nbsp;<?php _e('Enable', TEMPLATE_DOMAIN); ?>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" class="checkbox" name="<?php echo $option_name. "[$id]"; ?>" id="<?php echo $id; ?>" value="Disable" <?php if($options[$id] == 'Disable') { echo $checked; } ?> />&nbsp;&nbsp;<?php _e('Disable', TEMPLATE_DOMAIN); ?>
<?php if($desc != '') { ?>
<br /><label class="description" for="<?php echo $label_for; ?>"><?php echo $desc; ?></label>
<?php } ?>


<?php break;

case 'radio-feat-type':
$options[$id] = !empty($options[$id]) ? $options[$id] : $std;
$options[$id] = stripslashes($options[$id]);
$options[$id] = esc_attr( $options[$id]);
$checked = "checked=\"checked\"";
?>
<input type="radio" name="<?php echo $option_name. "[$id]"; ?>" id="<?php echo $id; ?>" value="Slider" <?php if($options[$id] == 'Slider') { echo $checked; } ?> />&nbsp;&nbsp;<?php _e('Slider', TEMPLATE_DOMAIN); ?>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="<?php echo $option_name. "[$id]"; ?>" id="<?php echo $id; ?>" value="Article" <?php if($options[$id] == 'Article') { echo $checked; } ?> />&nbsp;&nbsp;<?php _e('Article', TEMPLATE_DOMAIN); ?>
<?php if($desc != '') { ?>
<br /><label class="description" for="<?php echo $label_for; ?>"><?php echo $desc; ?></label>
<?php } ?>


<?php break;

case 'radio-enable-disable':
$options[$id] = !empty($options[$id]) ? $options[$id] : $std;
$options[$id] = stripslashes($options[$id]);
$options[$id] = esc_attr( $options[$id]);
$checked = "checked=\"checked\"";
?>
<input type="radio" name="<?php echo $option_name. "[$id]"; ?>" id="<?php echo $id; ?>" value="Enable" <?php if($options[$id] == 'Enable') { echo $checked; } ?> />&nbsp;&nbsp;<?php _e('Enable', TEMPLATE_DOMAIN); ?>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="<?php echo $option_name. "[$id]"; ?>" id="<?php echo $id; ?>" value="Disable" <?php if($options[$id] == 'Disable') { echo $checked; } ?>  />&nbsp;&nbsp;<?php _e('Disable', TEMPLATE_DOMAIN); ?>
<?php if($desc != '') { ?>
<br /><label class="description" for="<?php echo $label_for; ?>"><?php echo $desc; ?></label>
<?php } ?>

<?php break;

case 'radio-image-size':
$options[$id] = !empty($options[$id]) ? $options[$id] : $std;
$options[$id] = stripslashes($options[$id]);
$options[$id] = esc_attr( $options[$id]);
$checked = "checked=\"checked\"";
?>
<input type="radio" name="<?php echo $option_name. "[$id]"; ?>" id="<?php echo $id; ?>" value="thumbnail" <?php if($options[$id] == 'thumbnail') { echo $checked; } ?> />&nbsp;&nbsp;<?php _e('Thumbnail', TEMPLATE_DOMAIN); ?>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="<?php echo $option_name. "[$id]"; ?>" id="<?php echo $id; ?>" value="medium" <?php if($options[$id] == 'medium') { echo $checked; } ?>  />&nbsp;&nbsp;<?php _e('Medium', TEMPLATE_DOMAIN); ?>
&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="<?php echo $option_name. "[$id]"; ?>" id="<?php echo $id; ?>" value="large" <?php if($options[$id] == 'large') { echo $checked; } ?>  />&nbsp;&nbsp;<?php _e('Large', TEMPLATE_DOMAIN); ?>
<?php if($desc != '') { ?>
<br /><label class="description" for="<?php echo $label_for; ?>"><?php echo $desc; ?></label>
<?php } ?>

<?php break;

default;
break;
}
}


//including multisite custom css functions
include_once( get_template_directory() . '/lib/functions/ms-css-functions.php');

//////////////////////////////////////////////////////////////////////////////////////////////////
//Callback function to the register_settings function will pass through an input variable
// You can then validate the values and the return variable will be the values stored in the database.
///////////////////////////////////////////////////////////////////////////////////////////////////

//validate all options
function mp_validate_settings($input) {
global $font_family_group, $wp_cats, $choose_count, $theme_name, $theme_options, $global_options;
$option_name = $theme_options;
$newinput = get_option( $option_name );
foreach($input as $k => $v) {
$newinput[$k] = trim($v);
}
return $newinput;
}


//reset main theme options
function mp_theme_options_reset() {
global $font_family_group, $wp_cats, $choose_count, $theme_name, $theme_options, $global_options;
$option_name = $theme_options;
$options = get_option( $option_name );
if ( isset($_GET['page']) && $_GET["page"] == "theme-options" && $_GET["tab"] != "custom-css" ) {
if ( isset($_POST['action']) && $_POST['action'] == 'settings-reset' ) {
foreach ( $global_options as $val ){ $options[$val['id']] = ''; }
$options['custom_css'] = $options['custom_css'];
update_option( $option_name, $options );
} } }
add_action('admin_head', 'mp_theme_options_reset');

?>