<!DOCTYPE html>
<!--[if lt IE 7 ]>	<html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>		<html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>		<html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>		<html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<?php if(!function_exists('check_theme_license')) { wp_die(); } ?>   
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<?php global $is_IE; if($is_IE): ?><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><?php endif; ?>

<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=yes">
<meta name="HandheldFriendly" content="true">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>

<?php $header_code = get_theme_option('header_code'); echo stripcslashes($header_code); ?>

<?php do_action('bp_after_wp_head'); ?>

</head>

<body <?php body_class(); ?> id="custom">

<?php do_action( 'bp_before_wrapper' ) ?>

<div id="wrapper">

<div id="wrapper-main">

<div id="body-wrap">

<div id="body-content">


<?php do_action( 'bp_before_header' ) ?>
<!-- HEADER START -->
<header class="iegradient" id="header" role="banner">
<div class="innerwrap">
<div class="header-inner">

<div id="siteinfo">
<?php if( get_theme_option('header_logo') ) { ?>
<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_theme_option('header_logo'); ?>" alt="<?php bloginfo('name'); ?>" /></a>
<?php } else { ?>
<<?php if( !is_singular()) { echo 'h1'; } else { echo 'div'; } ?>><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></<?php if( !is_singular()) { echo 'h1'; } else { echo 'div'; } ?>><p id="site-description"><?php bloginfo( 'description' ); ?></p>
<?php } ?>
<?php do_action('bp_inside_siteinfo'); ?>
</div>
<?php do_action('bp_inside_header'); ?>


<?php do_action( 'bp_before_nav' ) ?>
<!-- NAVIGATION START -->
<nav id="main-navigation" role="navigation">
<?php if ( function_exists( 'wp_nav_menu' ) ) {  ?>
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'sf-menu', 'fallback_cb' => 'revert_wp_menu_page','walker' => new Custom_Description_Walker )); ?>
<?php } ?>
<?php do_action('bp_inside_nav'); ?>
</nav>
<!-- NAVIGATION END -->
<?php do_action( 'bp_after_nav' ) ?>

</div>
<!-- end header-inner -->
</div>
</header>
<!-- HEADER END -->
<?php do_action( 'bp_after_header' ) ?>

<div id="bodycontent" class="innerwrap">

<?php do_action( 'bp_before_container' ) ?>

<!-- CONTAINER START -->
<section id="container">

<div class="container-wrap">