<?php
/* options css */
$header_image = get_header_image();
$bg_image = get_background_image();
$bg_color = get_background_color();
?>

<?php
if( get_theme_option('body_font') == 'Choose a font' || get_theme_option('body_font') == '') { ?>
body { font-family:'Roboto',sans-serif;font-weight:normal;}
<?php } else { ?>
body { font-family: <?php echo get_theme_option('body_font'); ?> !important; font-weight: <?php echo get_theme_option('body_font_weight'); ?> !important; }
<?php } ?>

<?php
if( get_theme_option('headline_font') == 'Choose a font' || get_theme_option('headline_font') == '') { ?>
h1,h2,h3,h4,h5,h6,#siteinfo h1, #siteinfo div,ul.tabbernav li a, ul.tabbernav li a:hover {font-family:'Roboto',sans-serif;font-weight:600;}
<?php } else { ?>
h1,h2,h3,h4,h5,h6,#siteinfo h1, #siteinfo div,ul.tabbernav li a, ul.tabbernav li a:hover   {
font-family:  <?php echo get_theme_option('headline_font'); ?> !important; font-weight: <?php echo get_theme_option('headline_font_weight'); ?> !important;}
<?php } ?>

<?php
if( get_theme_option('navigation_font') == 'Choose a font' || get_theme_option('navigation_font') == '') { ?>
#main-navigation, .sf-menu li a {}
<?php } else { ?>
#main-navigation, .sf-menu li a { font-family:  <?php echo get_theme_option('navigation_font'); ?> !important; font-weight: <?php echo get_theme_option('navigation_font_weight'); ?> !important;}
<?php } ?>