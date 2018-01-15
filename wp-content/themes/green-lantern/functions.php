<?php
/*	*Theme Name	: Green-Lantern
	*Theme Core Functions and Codes
*/	
	/**Includes reqired resources here**/
	define('GL_TEMPLATE_DIR_URI', get_template_directory_uri());
	define('GL_TEMPLATE_DIR', get_template_directory());
	define('GL_TEMPLATE_DIR_CORE' , GL_TEMPLATE_DIR . '/core');
	require( get_template_directory() . '/class-tgm-plugin-activation.php' );
	require( GL_TEMPLATE_DIR_CORE . '/menu/default_menu_walker.php' ); // for Default Menus
	require( GL_TEMPLATE_DIR_CORE . '/menu/weblizar_nav_walker.php' ); // for Custom Menus	
	require( GL_TEMPLATE_DIR_CORE . '/comment-box/comment-function.php' ); //for comments
	require get_template_directory() . '/core/custom-header.php';
	require(dirname(__FILE__).'/customizer.php');
	add_action( 'after_setup_theme', 'wl_setup' ); 	
	function wl_setup()
	{	
		global $content_width;
		//content width
		if ( ! isset( $content_width ) ) $content_width = 720; //px
	
		// Load text domain for translation-ready
		load_theme_textdomain( 'green-lantern', GL_TEMPLATE_DIR_CORE . '/lang' );	
		
		add_theme_support( 'post-thumbnails' ); //supports featured image
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', __( 'Primary Menu', 'green-lantern' ) );
		// theme support 	
		//$args = array('default-color' => '000000',);
		//add_theme_support( 'custom-background', $args); 
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links'); 
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		// Logo
		add_theme_support( 'custom-logo', array(
			'width'       => 250,
			'height'      => 250,
			'flex-width'  => true,
			'flex-height'  => true,
		));
		
		require_once('theme-option-data.php');
			//Function To get the Options-DATA
		function weblizar_get_options() {
			// Options API
			return wp_parse_args( get_option( 'weblizar_options_gl', array() ), weblizar_default_settings());
		}			
	}
	if ( ! function_exists( 'wl_render_title' ) ) :
	function wl_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'wl_render_title' );
endif;
	function weblizar_scripts()
	{	
		wp_enqueue_style('font-awesome-css', GL_TEMPLATE_DIR_URI . '/css/font-awesome.css');
		wp_enqueue_style('font-awesome-css-4.6.3', GL_TEMPLATE_DIR_URI . '/css/font-awesome-4.7.0/css/font-awesome.css');

		wp_enqueue_style('font-awesome-css', GL_TEMPLATE_DIR_URI . '/css/elegant_font/HTML CSS/style.css');

		wp_enqueue_style('bootstrap', GL_TEMPLATE_DIR_URI . '/css/bootstrap.css');
		wp_enqueue_style('responsive', GL_TEMPLATE_DIR_URI . '/css/responsive.css');
		wp_enqueue_style('green', GL_TEMPLATE_DIR_URI . '/css/skins/green.css');	
		wp_enqueue_style('theme-menu', GL_TEMPLATE_DIR_URI . '/css/theme-menu.css');
		wp_enqueue_style('carousel', GL_TEMPLATE_DIR_URI . '/css/carousel.css');
		// Js
			wp_enqueue_script('jquery');
		wp_enqueue_script('menu', GL_TEMPLATE_DIR_URI .'/js/menu/menu.js', array('jquery'));
		wp_enqueue_script('bootstrap-js', GL_TEMPLATE_DIR_URI .'/js/menu/bootstrap.js');
		wp_enqueue_script('holder-js', GL_TEMPLATE_DIR_URI .'/js/holder.js');
		
		if(is_front_page()) {
		wp_enqueue_script('jquery.themepunch.plugins', GL_TEMPLATE_DIR_URI .'/js/jquery.themepunch.plugins.js');
		wp_enqueue_script('jquery.themepunch.revolution', GL_TEMPLATE_DIR_URI .'/js/jquery.themepunch.revolution.js');
		wp_enqueue_script('jquery.carouFredSel-6.2.1-packed', GL_TEMPLATE_DIR_URI .'/js/jquery.carouFredSel-6.2.1-packed.js');
		wp_enqueue_script('green-laltern', GL_TEMPLATE_DIR_URI .'/js/green-lantern.js');
		wp_enqueue_script('jquery.prettyPhoto', GL_TEMPLATE_DIR_URI .'/js/jquery.prettyPhoto.js');		
		wp_enqueue_style('revolution_settings', GL_TEMPLATE_DIR_URI . '/css/revolution_settings.css');
		wp_enqueue_style('animate', GL_TEMPLATE_DIR_URI . '/css/animate.css');
		wp_enqueue_style('prettyPhoto', GL_TEMPLATE_DIR_URI . '/css/prettyPhoto.css');
		}	
	}
	add_action('wp_enqueue_scripts', 'weblizar_scripts'); 
	if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 

	// Read more tag to formatting in blog page 
	function weblizar_content_more($more)
	{  global $post;							
	   return '<div class="blog-post-details-item blog-read-more"><a href="'.get_permalink().'">Read More...</a></div>';
	}  

/*  Font Family */	
 add_action('wp_enqueue_scripts', 'green_lantrn_font_family');
 function green_lantrn_font_family()
   {
	 wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Rock+Salt|Neucha|Sans+Serif|Indie+Flower|Shadows+Into+Light|Dancing+Script|Kaushan+Script|Tangerine|Pinyon+Script|Great+Vibes|Bad+Script|Calligraffitti|Homemade+Apple|Allura|Megrim|Nothing+You+Could+Do|Fredericka+the+Great|Rochester|Arizonia|Astloch|Bilbo|Cedarville+Cursive|Clicker+Script|Dawning+of+a+New+Day|Ewert|Felipa|Give+You+Glory|Italianno|Jim+Nightshade|Kristi|La+Belle+Aurore|Meddon|Montez|Mr+Bedfort|Over+the+Rainbow|Princess+Sofia|Reenie+Beanie|Ruthie|Sacramento|Seaweed+Script|Stalemate|Trade+Winds|UnifrakturMaguntia|Waiting+for+the+Sunrise|Yesteryear|Zeyada|Warnes|Abril+Fatface|Advent+Pro|Aldrich|Alex+Brush|Amatic+SC|Antic+Slab|Candal');
     
	 wp_enqueue_style ('googleFonts');
    }
	
	add_filter( 'the_content_more_link', 'weblizar_content_more' );
	
	/*
	* Weblizar widget area
	*/
	add_action( 'widgets_init', 'weblizar_widgets_init');
	function weblizar_widgets_init() {
		/*sidebar*/
		register_sidebar( array(
			'name' => __( 'Sidebar', 'green-lantern' ),
			'id' => 'sidebar-primary',
			'description' => __( 'The primary widget area', 'green-lantern' ),
			'before_widget' => '<div class="sidebar-block">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="h3-sidebar-title sidebar-title">',
			'after_title' => '</h3>'
		) );

		register_sidebar( array(
			'name' => __( 'Footer Widget Area', 'green-lantern' ),
			'id' => 'footer-widget-area',
			'description' => __( 'footer widget area', 'green-lantern' ),
			'before_widget' => '<div class="col-md-3 col-sm-3 footer-col">',
			'after_widget' => '</div>',
			'before_title' => '<div class="footer-title">',
			'after_title' => '</div>',
		) );             
	}
		$args = array(
	'flex-width'    => true,
	'width'         => 2000,
	'flex-height'    => true,
	'height'        => 100,
	'default-image' => get_template_directory_uri() . '/images/header-bg.png',
);
add_theme_support( 'custom-header', $args );
	
	/*
	* Image resize and crop
	*/
	 if ( ( 'add_image_size' ) ) 
	 { add_image_size('wl_media_sidebar_img',54,54,true);
		add_image_size('wl_media_blog_img',800,400,true);
		add_image_size('wl_blog_img',350,150,true);
		/*** blog ***/
		add_image_size('home_blog',360,165,true);
	}
	/* code for home slider post types 
	add_filter( 'intermediate_image_sizes', 'weblizar_image_presets');
	function weblizar_image_presets($sizes){
	   $type = get_post_type($_REQUEST['post_id']);	
		foreach($sizes as $key => $value)
		{	if($type=='post'  && $value != 'home_blog' &&  $value != 'wl_media_blog_img' &&  $value != 'wl_media_sidebar_img' && $value != 'wl_blog_img')
			{   unset($sizes[$key]);      }		 
		}
		return $sizes;	 
	}*/
	if (is_admin()) {
	require_once('core/admin/admin-themes.php');
	
}




//Plugin Recommend
add_action('tgmpa_register','green_laltern_plugin_recommend');
function green_laltern_plugin_recommend(){
	$plugins = array(
	array(
            'name'      => 'Responsive Coming Soon',
            'slug'      => 'responsive-coming-soon-page',
            'required'  => false,
        ),/* 
	array(
            'name'      => 'Photo Video Link Gallery',
            'slug'      => 'photo-video-link-gallery',
            'required'  => false,
        ),
	array(
            'name'      => 'Lightbox Gallery',
            'slug'      => 'simple-lightbox-gallery',
            'required'  => false,
        ),
	array(
            'name'      => 'Instagram Gallery',
            'slug'      => 'gallery-for-instagram',
            'required'  => false,
        ),
	array(
            'name'      => 'Ultimate Responsive Image Slider',
            'slug'      => 'ultimate-responsive-image-slider',
            'required'  => false,
        ),
	array(
            'name'      => 'Flickr Album Gallery',
            'slug'      => 'flickr-album-gallery',
            'required'  => false,
        ),
	array(
            'name'      => 'Gallery Pro',
            'slug'      => 'gallery-pro',
            'required'  => false,
        ), */
	array(
            'name'      => 'Admin Custom Login',
            'slug'      => 'admin-custom-login',
            'required'  => false,
        )
		
	);
    tgmpa( $plugins );
}
add_action( 'admin_notices', 'green_lantern_rating' );
function green_lantern_rating() {
    ?>
    <div class="notice error my-acf-notice is-dismissible notice-box" >
        <p><?php _e( 'Thank You for using Weblizar Theme, Please give your Rating/Review on Green-lantern theme. Your rating will help us to improve our themes' ,'green-lantern'); ?></p>
		<p style="font-size:17px;"> 
			<a style="color: #fff;background: #ec635b;padding: 3px 7px 4px 6px;border-radius: 5px;" href="<?php echo esc_url('https://wordpress.org/support/theme/green-lantern/reviews/?filter=5');  ?>" target="_blank"><?php _e('Rate the theme','green-lantern') ?></a>
		</p>
    </div>
    <?php
}
function enqueue_custom_admin_style() {
        wp_register_style( 'custom_admin_css', get_template_directory_uri() . '/core/admin/admin-rating.css');
        wp_enqueue_style( 'custom_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'enqueue_custom_admin_style' );
?>