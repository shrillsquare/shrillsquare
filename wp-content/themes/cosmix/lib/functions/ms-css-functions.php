<?php

function mp_custom_css_theme_page() {
global $theme_name,$theme_options;
?>
<div id="custom-theme-option" class="wrap">
<?php if ( isset($_GET['settings-updated']) && false !== $_REQUEST['settings-updated'] ) : ?>
<?php echo '<div class="updated fade"><p><strong>'. $theme_name . __(' Custom CSS saved.', TEMPLATE_DOMAIN) . '</strong></p></div>'; ?>
<?php endif; ?>
<?php if ( isset($_POST['action']) && $_POST['action'] == 'settings-reset' ) : ?>
<?php echo '<div class="updated fade"><p><strong>'. $theme_name . __(' Custom CSS Reset.', TEMPLATE_DOMAIN) . '</strong></p></div>';
?>
<?php endif; ?>

<form id="template" method="post" action="options.php" >
<?php
settings_fields($theme_options);
do_settings_sections('custom-css');
?>
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Custom CSS', TEMPLATE_DOMAIN) ?>" />
</p>
</form>
<form action="<?php echo admin_url('themes.php?page=theme-options&tab='.$_GET['tab']); ?>" method="post">
<div style="float:left;padding:0;margin:0;" class="submit">
<?php
$alert_message = __("Are you sure you want to delete all saved custom css?.", TEMPLATE_DOMAIN ); ?>
<input name="reset" type="submit" class="button-secondary" onclick="return confirm('<?php echo $alert_message; ?>')" value="<?php echo esc_attr(__('Reset Custom CSS',TEMPLATE_DOMAIN)); ?>" />
<input type="hidden" name="action" value="settings-reset" />
</div>
</form>
</div>
<?php
}

// theme section
function mp_custom_css_display_section($section){}

// theme display
function mp_custom_css_display_setting($args) {
global $theme_name, $theme_options;
extract( $args );
$option_name = $theme_options;
$options = get_option( $option_name );
switch ( $type ) {
case 'textarea':
$options[$id] = !empty($options[$id]) ? $options[$id] : "";
$options[$id] = stripslashes($options[$id]);
$options[$id] = esc_attr( $options[$id]);
?>
<textarea id="<?php echo $id; ?>" name="<?php echo $option_name . "[$id]"; ?>" cols="60%" rows="8" /><?php if ( $options[$id] != "" ) { echo $options[$id]; } ?>
</textarea>
<?php if($desc != '') { ?>
<br /><label class="description" for="<?php echo $label_for; ?>"><?php echo $desc; ?></label>
<?php } ?>
<?php
break;
default;
break;
}
}

//reset custom css options
function mp_custom_css_reset() {
global $font_family_group, $wp_cats, $choose_count, $theme_name, $theme_options, $global_options;
$option_name = $theme_options;
$options = get_option( $option_name );
if ( isset($_GET['page']) && $_GET["page"] == "theme-options" && isset($_GET['tab']) && $_GET["tab"] == "custom-css" ) {
if ( isset($_POST['action']) && $_POST['action'] == 'settings-reset'  ) {
foreach ( $global_options as $val ){ $options[$val['id']] = $options[$val['id']]; }
$options['custom_css'] = '';
update_option( $option_name, $options );
} } }
add_action('admin_head', 'mp_custom_css_reset');

?>