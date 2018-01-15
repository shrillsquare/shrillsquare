<?php
add_action( 'customize_register', 'weblizar_gl_customizer' );
function weblizar_gl_customizer( $wp_customize ) {
	wp_enqueue_style('customizr', get_template_directory_uri() .'/css/customizr.css');
	wp_enqueue_style('customizr-fa', get_template_directory_uri() .'/iconpicker-control/assets/css/font-awesome.min.css');
	wp_enqueue_script('snow', get_template_directory_uri() .'/js/snowstorm.js');
	$ImageUrl1 =  esc_url(get_template_directory_uri() ."/images/home-slide-1.png");
	$ImageUrl2 = esc_url(get_template_directory_uri() ."/images/home-slide-2.png");
	$ImageUrl3 = esc_url(get_template_directory_uri() ."/images/home-slide-3.png");
	$ImageUrl4 = esc_url(get_template_directory_uri() ."/images/home-ppt1.png");
	$ImageUrl5 = esc_url(get_template_directory_uri() ."/images/home-ppt2.png");
	$ImageUrl6 = esc_url(get_template_directory_uri() ."/images/home-ppt3.png");
	$ImageUrl7 = esc_url(get_template_directory_uri() ."/images/home-ppt4.png");
	
	/* Genral section */
		/* Slider Section */
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
	'selector' => '.site-title',
	'render_callback' => 'blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
	'selector' => '.site-title-desc',
	'render_callback' => 'blogdescription',
	) );
	$wp_customize->selective_refresh->add_partial( 'custom_logo', array(
	'selector' => '.site-custom_logo',
	'render_callback' => 'custom_logo',
	) );
	$wp_customize->add_panel( 'weblizar_gl_theme_option', array(
    'title' => __( 'Theme Options','green-lantern' ),
    'priority' => 30, // Mixed with top-level-section hierarchy.
) );
	$wp_customize->add_section(
        'general_sec',
        array(
            'title' => 'Theme General Options',
            'description' => 'Here you can customize Your theme\'s general Settings',
			'panel'=>'weblizar_gl_theme_option',
			'capabilit'=>'edit_theme_options',
            'priority' => 35,
			
        )
    );
		$wl_theme_options = weblizar_default_settings();
	$wp_customize->add_setting(
		'weblizar_options_gl[_frontpage]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['_frontpage'],
			'sanitize_callback'=>'weblizar_gl_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'weblizar_gl_front_page', array(
		'label'        => __( 'Show Front Page', 'green-lantern' ),
		'type'=>'checkbox',
		'section'    => 'general_sec',
		'settings'   => 'weblizar_options_gl[_frontpage]',
	) );
	
	$wp_customize->add_setting(
		'weblizar_options_gl[height]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['height'],
			'sanitize_callback'=>'weblizar_gl_sanitize_integer',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[width]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['width'],
			'sanitize_callback'=>'weblizar_gl_sanitize_integer',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control( 'weblizar_gl_logo_height', array(
		'label'        => __( 'Logo Height', 'green-lantern' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'weblizar_options_gl[height]',
	) );
	$wp_customize->add_control( 'weblizar_gl_logo_width', array(
		'label'        => __( 'Logo Width', 'green-lantern' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'weblizar_options_gl[width]',
	) );
	
	$wp_customize->add_setting(
	'blog_home',
	array(
		'type'    => 'option',
		'default'=>$wl_theme_options['blog_home'],
		'sanitize_callback'=>'weblizar_gl_sanitize_checkbox',
		'capability' => 'edit_theme_options'
	)
	);
	$wp_customize->add_control( 'green-lantern_show_blog', array(
		'label'        => __( 'Enable Blog on Home', 'green-lantern' ),
		'type' => 'hidden',
		'section'    => 'general_sec',
		'settings'   => 'blog_home'
	) );
	$wp_customize->add_setting(
		'weblizar_options_gl[latest_post]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['latest_post'],
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'weblizar_options_gl[latest_post]', array(
	'selector' => '.weblizar_latest_post',
	'render_callback' => 'weblizar_options_gl[latest_post]',
	) );
	$wp_customize->add_control( 'weblizar_gl_latest_post', array(
		'label'        => __( 'Home Blog Title', 'green-lantern' ),
		'type'=>'text',
		'section'    => 'general_sec',
		'settings'   => 'weblizar_options_gl[latest_post]',
	) );
	$wp_customize->add_setting(
		'weblizar_options_gl[blog_text]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['blog_text'],
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'weblizar_options_gl[blog_text]', array(
	'selector' => '.wweblizar_blog_text',
	'render_callback' => 'weweblizar_options_gl[blog_text]',
	) );
	$wp_customize->add_control( 'weblizar_gl_blog_text', array(
		'label'        => __( 'Home Blog Description', 'green-lantern' ),
		'type'=>'text',
		'section'    => 'general_sec',
		'settings'   => 'weblizar_options_gl[blog_text]',
	) );
	/* Slider options */
	$wp_customize->add_section(
        'slider_sec',
        array(
            'title' => 'Theme Slider Options',
			'panel'=>'weblizar_gl_theme_option',
            'description' => 'Here you can add slider images',
			'capabilit'=>'edit_theme_options',
            'priority' => 35,
			
        )
    );
	$wp_customize->add_setting(
		'weblizar_options_gl[side_interval]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['side_interval'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_integer'
		)
	);
	$wp_customize->add_control( 'weblizar_gl_slide_side_interval', array(
		'label'        => __( 'Slide Show Interval', 'green-lantern' ),
		'type'=>'select',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[side_interval]',
		'choices' => array(
            '2000' => '2000',
            '3000' => '3000',
			'4000' => '4000',
			'5000' => '5000',
			'6000' => '6000',
			'7000' => '7000',
			'8000' => '8000',
			'9000' => '9000',
			'10000' => '10000',
        ),
	) );
	$wp_customize->add_setting(
		'weblizar_options_gl[side_pause]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['side_pause'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text'
		)
	);
	$wp_customize->add_control( 'weblizar_gl_slide_side_pause', array(
		'label'        => __( 'Pause On Mouse Hover', 'green-lantern' ),
		'type'=>'select',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[side_pause]',
		'choices' => array(
            'yes' => 'Yes',
            'no' => 'No'
        ),
	) );
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_image]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl1,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_image_1]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl2,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_image_2]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl3,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
			
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_title]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			
		)
	);
	$wp_customize->selective_refresh->add_partial( 'weblizar_options_gl[slide_title]', array(
	'selector' => '.weblizar_slide_title',
	'render_callback' => 'weblizar_options_gl[slide_title]',
	) );
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_title_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			
		)
	);
	$wp_customize->selective_refresh->add_partial( 'weblizar_options_gl[slide_title_1]', array(
	'selector' => '.weblizar_slide_title_1',
	'render_callback' => 'weblizar_options_gl[slide_title_1]',
	) );
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_title_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			
		)
	);
	$wp_customize->selective_refresh->add_partial( 'weblizar_options_gl[slide_title_2]', array(
	'selector' => '.weblizar_slide_title_2',
	'render_callback' => 'weblizar_options_gl[slide_title_2]',
	) );
	$wp_customize->add_setting(
		'slide_desc',
		array(
			'default'=>$wl_theme_options['slide_desc'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			
		)
	);
	$wp_customize->selective_refresh->add_partial( 'slide_desc', array(
	'selector' => '.slide_desc',
	'render_callback' => 'slide_desc',
	) );
	$wp_customize->add_setting(
		'slide_desc_1',
		array(
			'default'=>$wl_theme_options['slide_desc_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			
		)
	);
	$wp_customize->selective_refresh->add_partial( 'slide_desc_1', array(
	'selector' => '.slide_desc_1',
	'render_callback' => 'slide_desc_1',
	) );
	$wp_customize->add_setting(
		'slide_desc_2',
		array(
			'default'=>$wl_theme_options['slide_desc_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			
		)
	);
	$wp_customize->selective_refresh->add_partial( 'slide_desc_2', array(
	'selector' => '.slide_desc_2',
	'render_callback' => 'slide_desc_2',
	) );
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_btn_text]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_text'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			
		)
	);
	$wp_customize->selective_refresh->add_partial( 'weblizar_options_gl[slide_btn_text]', array(
	'selector' => '.weblizar_slide_btn_text',
	'render_callback' => 'weblizar_options_gl[slide_btn_text]',
	) );
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_btn_text_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_text_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			
		)
	);
	$wp_customize->selective_refresh->add_partial( 'weblizar_options_gl[slide_btn_text_1]', array(
	'selector' => '.weblizar_slide_btn_text_1',
	'render_callback' => 'weblizar_options_gl[slide_btn_text_1]',
	) );
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_btn_text_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_text_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			
		)
	);
	$wp_customize->selective_refresh->add_partial( 'weblizar_options_gl[slide_btn_text_2]', array(
	'selector' => '.weblizar_slide_btn_text_2',
	'render_callback' => 'weblizar_options_gl[slide_btn_text_2]',
	) );
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_btn_link]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_link'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
			
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_btn_link_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_link_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
			
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_btn_link_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_link_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
			
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'weblizar_gl_slider_image', array(
		'label'        => __( 'Slider Image One', 'green-lantern' ),
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_image]'
	) ) );
	$wp_customize->add_control( 'weblizar_gl_slide_title', array(
		'label'        => __( 'Slider title one', 'green-lantern' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_title]'
	) );
	$wp_customize->add_control(new One_Page_Editor($wp_customize, 'slide_desc', array(
		'label'        => __( 'Slider description one', 'green-lantern' ),
		'section'    => 'slider_sec',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'slide_desc'
	)
	) );
	$wp_customize->add_control( 'Slider button one', array(
		'label'        => __( 'Slider Button Text One', 'green-lantern' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_btn_text]'
	) );
	
	$wp_customize->add_control( 'weblizar_gl_slide_btnlink', array(
		'label'        => __( 'Slider Button Link', 'green-lantern' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_btn_link]'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'weblizar_gl_slider_image_1', array(
		'label'        => __( 'Slider Image Two ', 'green-lantern' ),
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_image_1]'
	) ) );
	
	$wp_customize->add_control( 'weblizar_gl_slide_title_1', array(
		'label'        => __( 'Slider Title Two', 'green-lantern' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_title_1]'
	) );
	$wp_customize->add_control( new One_Page_Editor($wp_customize,'slide_desc_1', array(
		'label'        => __( 'Slider Description Two', 'green-lantern' ),
		'section'    => 'slider_sec',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'slide_desc_1'
	)
	) );
	$wp_customize->add_control( 'weblizar_gl_slide_btn_1', array(
		'label'        => __( 'Slider Button Text Two', 'green-lantern' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_btn_text_1]'
	) );
	$wp_customize->add_control( 'weblizar_gl_slide_btnlink_1', array(
		'label'        => __( 'Slider Link Two', 'green-lantern' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_btn_link_1]'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'weblizar_gl_slider_image_2', array(
		'label'        => __( 'Slider Image Three', 'green-lantern' ),
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_image_2]'
	) ) );
	$wp_customize->add_control( 'weblizar_gl_slide_title_2', array(
		'label'        => __( 'Slider Title Three', 'green-lantern' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_title_2]'
	) );
	
	$wp_customize->add_control(new One_Page_Editor($wp_customize, 'slide_desc_2', array(
		'label'        => __( 'Slider Description Three', 'green-lantern' ),
		'section'    => 'slider_sec',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'slide_desc_2'
	)
	) );
	$wp_customize->add_control( 'weblizar_gl_slide_btn_2', array(
		'label'        => __( 'Slider Button Text Three', 'green-lantern' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_btn_text_2]'
	) );
	$wp_customize->add_control( 'weblizar_gl_slide_btnlink_2', array(
		'label'        => __( 'Slider Button Link Three', 'green-lantern' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_btn_link_2]'
	) );
	/* Service Options */
	$wp_customize->add_section('service_section',array(
	'title'=>__("Service Options","green-lantern"),
	'panel'=>'weblizar_gl_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35,
	'active_callback' => 'is_front_page',
	));
	$wp_customize->add_setting(
	'service_home',
	array(
		'type'    => 'option',
		'default'=>esc_attr($wl_theme_options['service_home']),
		'sanitize_callback'=>'weblizar_gl_sanitize_checkbox',
		'capability' => 'edit_theme_options'
	)
	);
	$wp_customize->add_control( 'green-lantern_show_service', array(
		'label'        => __( 'Enable Service on Home', 'green-lantern' ),
		'type' => 'hidden',
		'section'    => 'service_section',
		'settings'   => 'service_home'
	) );
	$wp_customize->add_setting(
	'weblizar_options_gl[service_1_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_icons']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		
			)
	);
	$wp_customize->selective_refresh->add_partial( 'weblizar_options_gl[service_1_icons]', array(
	'selector' => '.weblizar_service_1_icons',
	'render_callback' => 'weblizar_options_gl[service_1_icons]',
	) );
	$wp_customize->add_setting(
	'weblizar_options_gl[service_2_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_icons']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		
		)
	);
	$wp_customize->selective_refresh->add_partial( 'weblizar_options_gl[service_2_icons]', array(
	'selector' => '.weblizar_service_2_icons',
	'render_callback' => 'weblizar_options_gl[service_2_icons]',
	) );
	$wp_customize->add_setting(
	'weblizar_options_gl[service_3_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_icons']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		
		)
	);
	$wp_customize->selective_refresh->add_partial( 'weblizar_options_gl[service_3_icons]', array(
	'selector' => '.weblizar_service_3_icons',
	'render_callback' => 'weblizar_options_gl[service_3_icons]',
	) );
	$wp_customize->add_setting(
	'weblizar_options_gl[service_4_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_4_icons']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		
		)
	);
	$wp_customize->selective_refresh->add_partial( 'weblizar_options_gl[service_4_icons]', array(
	'selector' => '.weblizar_service_4_icons',
	'render_callback' => 'weblizar_options_gl[service_4_icons]',
	) );
	$wp_customize->add_setting(
	'weblizar_options_gl[service_1_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
			)
	);
	$wp_customize->selective_refresh->add_partial( 'weblizar_options_gl[service_1_title]', array(
	'selector' => '.weblizar_service_1_title',
	'render_callback' => 'weblizar_options_gl[service_1_title]',
	) );
	$wp_customize->add_setting(
	'weblizar_options_gl[service_2_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_gl_sanitize_text'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'weblizar_options_gl[service_2_title]', array(
	'selector' => '.weblizar_service_2_title',
	'render_callback' => 'weblizar_options_gl[service_2_title]',
	) );
	$wp_customize->add_setting(
	'weblizar_options_gl[service_3_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_title']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		'capability'=>'edit_theme_options',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'weblizar_options_gl[service_3_title]', array(
	'selector' => '.weblizar_service_3_title',
	'render_callback' => 'weblizar_options_gl[service_3_title]',
	) );
	$wp_customize->add_setting(
	'weblizar_options_gl[service_4_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_4_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
			)
	);
	$wp_customize->selective_refresh->add_partial( 'weblizar_options_gl[service_4_title]', array(
	'selector' => '.weblizar_service_4_title',
	'render_callback' => 'weblizar_options_gl[service_4_title]',
	) );
	$wp_customize->add_setting(
	'service_1_text',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_text']),
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		'capability'=>'edit_theme_options',
			)
	);
	$wp_customize->selective_refresh->add_partial( 'service_1_text', array(
	'selector' => '.service_1_text',
	'render_callback' => 'service_1_text',
	) );
	$wp_customize->add_setting(
	'service_2_text',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_text']),
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		'capability'=>'edit_theme_options',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'service_2_text', array(
	'selector' => '.service_2_text',
	'render_callback' => 'service_2_text',
	) );
	$wp_customize->add_setting(
	'service_3_text',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_text']),
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		'capability'=>'edit_theme_options',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'service_3_text', array(
	'selector' => '.service_3_text',
	'render_callback' => 'service_3_text',
	) );
	$wp_customize->add_setting(
	'service_4_text',
		array(
		'default'=>esc_attr($wl_theme_options['service_4_text']),
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		'capability'=>'edit_theme_options',
			)
	);
	$wp_customize->selective_refresh->add_partial( 'service_4_text', array(
	'selector' => '.service_4_text',
	'render_callback' => 'service_4_text',
	) );
	$wp_customize->add_control(
    new weblizar_gl_Customize_Misc_Control(
        $wp_customize,
        'service_options1-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));

	$wp_customize->add_control( 'service_one_title', array(
		'label'        => __( 'Service One Title', 'green-lantern' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'weblizar_options_gl[service_1_title]'
	) );
	
	$wp_customize->add_control(new green_lantern_Customizer_Icon_Picker_Control($wp_customize,'weblizar_options_gl[service_1_icons]',
        array(
			'label'        => __( 'Service Icon One', 'green-lantern' ),
			'type'=>'text',
            'section'  => 'service_section',
			'settings'   => 'weblizar_options_gl[service_1_icons]'
        ))
    );

	$wp_customize->add_control( new One_Page_Editor($wp_customize,'service_1_text', array(
		'label'        => __( 'Service One Text', 'green-lantern' ),
		'section'    => 'service_section',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'service_1_text',
	)
	) );
		$wp_customize->add_control(
    new weblizar_gl_Customize_Misc_Control(
        $wp_customize,
        'service_options2-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));
	$wp_customize->add_control( 'service_two_title', array(
		'label'        => __( 'Service Two Title', 'green-lantern' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'weblizar_options_gl[service_2_title]'
	) );
		$wp_customize->add_control(new green_lantern_Customizer_Icon_Picker_Control($wp_customize, 'weblizar_options_gl[service_2_icons]',
        array(
			'label'        => __( 'Service Icon Two', 'green-lantern' ),
            'section'  => 'service_section',
			'type'=>'text',
			'settings'   => 'weblizar_options_gl[service_2_icons]'
        ))
    );
	$wp_customize->add_control( new One_Page_Editor($wp_customize, 'service_2_text', array(
		'label'        => __( 'Service Two Text', 'green-lantern' ),
		'section'    => 'service_section',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'service_2_text',
	)
	) );

		$wp_customize->add_control(new weblizar_gl_Customize_Misc_Control(
        $wp_customize, 'weblizar_gl_service_options3-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));
	$wp_customize->add_control( 'weblizar_gl_service_three_title', array(
		'label'        => __( 'Service Three Title', 'green-lantern' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'weblizar_options_gl[service_3_title]'
	) );
	$wp_customize->add_control(new green_lantern_Customizer_Icon_Picker_Control($wp_customize,'weblizar_options_gl[service_3_icons]',
        array(
			'label'        => __( 'Service Icon Three', 'green-lantern' ),
            'section'  => 'service_section',
			'type'=>'text',
			'settings'   => 'weblizar_options_gl[service_3_icons]'
        ))
    );
	$wp_customize->add_control( new One_Page_Editor($wp_customize, 'service_3_text', array(
		'label'        => __( 'Service Three Text', 'green-lantern' ),
		'section'    => 'service_section',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'service_3_text',
	)
	) );
	$wp_customize->add_control(new weblizar_gl_Customize_Misc_Control(
        $wp_customize, 'weblizar_gl_service_options4-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));
	$wp_customize->add_control( 'weblizar_gl_service_four_title', array(
		'label'        => __( 'Service Four Title', 'green-lantern' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'weblizar_options_gl[service_4_title]'
	) );
	$wp_customize->add_control(new green_lantern_Customizer_Icon_Picker_Control($wp_customize,'weblizar_options_gl[service_4_icons]',
        array(
			'label'        => __( 'Service Icon Four', 'green-lantern' ),
            'section'  => 'service_section',
			'type'=>'text',
			'settings'   => 'weblizar_options_gl[service_4_icons]'
        ))
    );
	$wp_customize->add_control(  new One_Page_Editor($wp_customize,'service_4_text', array(
		'label'        => __( 'Service Four Text', 'green-lantern' ),
		'section'    => 'service_section',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'service_4_text',
	)
	) );

/* Social options */
	$wp_customize->add_section('social_section',array(
	'title'=>__("Social Options","green-lantern"),
	'panel'=>'weblizar_gl_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	
	$wp_customize->add_setting(
	'weblizar_options_gl[footer_section_social_media_enbled]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_section_social_media_enbled']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_gl_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'weblizar_options_gl[footer_section_social_media_enbled]', array(
	'selector' => '.weblizar_social_media_enbled',
	'render_callback' => 'weblizar_options_gl[footer_section_social_media_enbled]',
	) );
	$wp_customize->add_control( 'footer_section_social_media_enbled', array(
		'label'        => __( 'Enable Social Media Icons in Footer', 'green-lantern' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'weblizar_options_gl[footer_section_social_media_enbled]'
	) );
	$wp_customize->add_setting(
	'weblizar_options_gl[social_media_twitter_link]',
		array(
		'default'=>esc_attr($wl_theme_options['social_media_twitter_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'social_media_twitter_link', array(
		'label'        =>  __('Twitter', 'green-lantern' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'weblizar_options_gl[social_media_twitter_link]'
	) );
	$wp_customize->add_setting(
	'weblizar_options_gl[social_media_facebook_link]',
		array(
		'default'=>esc_attr($wl_theme_options['social_media_facebook_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'social_media_facebook_link', array(
		'label'        => __( 'Facebook', 'green-lantern' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'weblizar_options_gl[social_media_facebook_link]'
	) );
	$wp_customize->add_setting(
	'weblizar_options_gl[social_media_linkedin_link]',
		array(
		'default'=>esc_attr($wl_theme_options['social_media_linkedin_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'weblizar_options_gl[social_media_linkedin_link]', array(
	'selector' => '.weblizar_linkedin_link',
	'render_callback' => 'weblizar_options_gl[social_media_linkedin_link]',
	) );
		$wp_customize->add_control( 'social_media_linkedin_link', array(
		'label'        => __( 'LinkedIn', 'green-lantern' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'weblizar_options_gl[social_media_linkedin_link]'
	) );
	
	$wp_customize->add_setting(
	'weblizar_options_gl[social_media_google_plus]',
		array(
		'default'=>esc_attr($wl_theme_options['social_media_google_plus']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'social_media_google_plus', array(
		'label'        => __( 'Goole+', 'green-lantern' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'weblizar_options_gl[social_media_google_plus]'
	) );
	/* Footer Options */
	$wp_customize->add_section('footer_section',array(
	'title'=>__("Footer Options","green-lantern"),
	'panel'=>'weblizar_gl_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'weblizar_options_gl[footer_customizations]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_customizations']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'weblizar_options_gl[footer_customizations]', array(
	'selector' => '.weblizar_footer_customizations',
	'render_callback' => 'weblizar_options_gl[footer_customizations]',
	) );
	$wp_customize->add_control( 'footer_customizations', array(
		'label'        => __( 'Footer Customization Text', 'green-lantern' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'weblizar_options_gl[footer_customizations]'
	) );
	
	$wp_customize->add_setting(
	'weblizar_options_gl[developed_by_text]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_text']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'developed_by_text', array(
		'label'        => __( 'Footer Customization Text', 'green-lantern' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'weblizar_options_gl[developed_by_text]'
	) );
	$wp_customize->add_setting(
	'weblizar_options_gl[developed_by_weblizar_text]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_weblizar_text']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'developed_by_weblizar_text', array(
		'label'        => __( 'Footer Customization Text', 'green-lantern' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'weblizar_options_gl[developed_by_weblizar_text]'
	) );
	$wp_customize->add_setting(
	'weblizar_options_gl[developed_by_link]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_link']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_control( 'developed_by_link', array(
		'label'        => __( 'Footer Customization Text', 'green-lantern' ),
		'type'=>'url',
		'section'    => 'footer_section',
		'settings'   => 'weblizar_options_gl[developed_by_link]'
	) );
	
	/* Font Family Section */
	$wp_customize->add_section('font_section', array(
	'title' => __('Typography Setting', 'green-lantern'),
	'panel' => 'weblizar_gl_theme_option',
	'capability' => 'edit_theme_options',
	'priority' => 35
	));
	
	$wp_customize->add_setting(
	'weblizar_options_gl[main_heading_font]',
	array(
	'default' => esc_attr($wl_theme_options['main_heading_font']),
	'type' => 'option',
	'sanitize_callback'=>'weblizar_gl_sanitize_text',
	'capability'=>'edit_theme_options'
    ));
	$wp_customize->add_control(new green_lantrn_Font_Control($wp_customize, 'main_heading_font', array(
	'label' => __('Logo Font Style', 'green-lantern'),
	'section' => 'font_section',
	'settings' => 'weblizar_options_gl[main_heading_font]'
	)));
	
	$wp_customize->add_setting(
	'weblizar_options_gl[menu_font]',
	array(
	'default' => esc_attr($wl_theme_options['menu_font']),
	'type' => 'option',
	'sanitize_callback'=>'weblizar_gl_sanitize_text',
	'capability'=>'edit_theme_options'
    ));
	$wp_customize->add_control(new green_lantrn_Font_Control($wp_customize, 'menu_font', array(
	'label' => __('Header Menu Font Style', 'green-lantern'),
	'section' => 'font_section',
	'settings' => 'weblizar_options_gl[menu_font]'
	)));
	
	$wp_customize->add_setting(
	'weblizar_options_gl[theme_title]',
	array(
	'default' => esc_attr($wl_theme_options['theme_title']),
	'type' => 'option',
	'sanitize_callback'=>'weblizar_gl_sanitize_text',
	'capability'=>'edit_theme_options'
    ));
	$wp_customize->add_control(new green_lantrn_Font_Control($wp_customize, 'theme_title', array(
	'label' => __('Theme Title Font Style', 'green-lantern'),
	'section' => 'font_section',
	'settings' => 'weblizar_options_gl[theme_title]'
	)));
	
	$wp_customize->add_setting(
	'weblizar_options_gl[desc_font_all]',
	array(
	'default' => esc_attr($wl_theme_options['desc_font_all']),
	'type' => 'option',
	'sanitize_callback'=>'weblizar_gl_sanitize_text',
	'capability'=>'edit_theme_options'
    ));
	$wp_customize->add_control(new green_lantrn_Font_Control($wp_customize, 'desc_font_all', array(
	'label' => __('Theme Description Font', 'green-lantern'),
	'section' => 'font_section',
	'settings' => 'weblizar_options_gl[desc_font_all]'
	)));	
	
	// excerpt option 
    $wp_customize->add_section('excerpt_option',array(
    'title'=>__("Excerpt Option",'green-lantern'),
    'panel'=>'weblizar_gl_theme_option',
    'capability'=>'edit_theme_options',
    'priority' => 37,
    ));
    
    $wp_customize->add_setting( 'weblizar_options_gl[excerpt_blog]', array(
        'default'=>_($wl_theme_options['excerpt_blog']),
        'type'=>'option',
        'sanitize_callback'=>'weblizar_gl_sanitize_integer',
        'capability'=>'edit_theme_options'
    ) );
        $wp_customize->add_control( 'excerpt_blog', array(
        'label'        => __( 'Excerpt length blog section', 'green-lantern' ),
        'type'=>'number',
        'section'    => 'excerpt_option',
		'description' => esc_html__('Excerpt length only for home blog section.', 'green-lantern'),
		'settings'   => 'weblizar_options_gl[excerpt_blog]'
    ) );
	
	// home layout //
	$wp_customize->add_section('Home_Page_Layout',array(
    'title'=>__("Home Page Layout Option",'green-lantern'),
    'panel'=>'weblizar_gl_theme_option',
    'capability'=>'edit_theme_options',
    'priority' => 50,
    ));
	$wp_customize->add_setting('home_reorder',
            array(
				'type'=>'theme_mod',
                'sanitize_callback' => 'sanitize_json_string',
				'capability'        => 'edit_theme_options',
            )
        );
    $wp_customize->add_control(new green_lantern_Custom_sortable_Control($wp_customize,'home_reorder', array(
		'label'=>__( 'Front Page Layout Option', 'green-lantern' ),
        'section' => 'Home_Page_Layout',
        'type'    => 'home-sortable',
        'choices' => array(
            'service'      => __('Home Services', 'green-lantern'),
            'blog'        => __('Home Blog', 'green-lantern'),
        ),
		'settings'=>'home_reorder',
    )));
	// home layout close //

	$wp_customize->add_section( 'gl_more' , array(
				'title'      	=> __( 'Upgrade to Green-Lantern Premium', 'green-lantern' ),
				'priority'   	=> 999,
				'panel'=>'weblizar_gl_theme_option',
			) );

			$wp_customize->add_setting( 'gl_more', array(
				'default'    		=> null,
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( new More_gl_Control( $wp_customize, 'gl_more', array(
				'label'    => __( 'Green-Lantern Premium', 'green-lantern' ),
				'section'  => 'gl_more',
				'settings' => 'gl_more',
				'priority' => 1,
			) ) );
}
function weblizar_gl_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function weblizar_gl_sanitize_checkbox( $input ) {
    return $input;
}
function weblizar_gl_sanitize_integer( $input ) {
    return (int)($input);
}
/* Custom Control Class */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'weblizar_gl_Customize_Misc_Control' ) ) :
class weblizar_gl_Customize_Misc_Control extends WP_Customize_Control {
    public $settings = 'blogname';
    public $description = '';
    public function render_content() {
        switch ( $this->type ) {
            default:
           
            case 'heading':
                echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
                break;
 
            case 'line' :
                echo '<hr />';
                break;
			
        }
    }
}
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'More_gl_Control' ) ) :
class More_gl_Control extends WP_Customize_Control {

	/**
	* Render the content on the theme customizer page
	*/
	public function render_content() {
		?>
		<label style="overflow: hidden; zoom: 1;">
			<div class="col-md-2 col-sm-6 upsell-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="https://weblizar.com/themes/green-lantern-premium-theme/" target="blank" class="btn btn-success btn"><?php _e('Upgrade to Incredible Premium','green-lantern'); ?> </a>
			</div>
			<div class="col-md-4 col-sm-6">
				<img class="enigma_img_responsive " src="<?php echo get_template_directory_uri() .'/images/glp-slide-1.jpg'?>">
			</div>			
			<div class="col-md-3 col-sm-6">
				<h3 style="margin-top:10px;margin-left: 20px;text-decoration:underline;color:#333;"><?php echo _e( 'Green-Lantern Premium - Features','green-lantern'); ?></h3>
					<ul style="padding-top:20px">
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Responsive Design','green-lantern'); ?> </li>						
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('More than 13 Templates','green-lantern'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('8 Different Types of Blog Templates','green-lantern'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('6 Types of Portfolio Templates','green-lantern'); ?></li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('12 types Themes Colors Scheme','green-lantern'); ?></li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Patterns Background','green-lantern'); ?>   </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('WPML Compatible','green-lantern'); ?>   </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Woo-commerce Compatible','green-lantern'); ?>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Image Background','green-lantern'); ?>  </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Rich Short codes','green-lantern'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Translation Ready','green-lantern'); ?> </li>
					
					</ul>
			</div>
			<div class="col-md-2 col-sm-6 upsell-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="https://weblizar.com/themes/green-lantern-premium-theme/" target="blank" class="btn btn-success btn"><?php _e('Upgrade to Green-Lantern Premium','green-lantern'); ?> </a>
			</div>
			<span class="customize-control-title"><?php _e( 'Enjoying Green-Lantern ?', 'green-lantern' ); ?></span>
			<p>
				<?php
					printf( __( 'If you Like our Products , Please do Rate us on %sWordPress.org%s?  We\'d really appreciate it!', 'green-lantern' ), '<a target="" href="https://wordpress.org/support/view/theme-reviews/green-lantern?filter=5">', '</a>' );
				?>
			</p>
		</label>
		<?php
	}
}
endif;

/* class for font-family */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'green_lantrn_Font_Control' ) ) :
class green_lantrn_Font_Control extends WP_Customize_Control 
{  
 public function render_content() 
 {?>
   <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
   <select <?php $this->link(); ?> >
    <option  value="Abril Fatface"<?php if($this->value()== 'Abril Fatface') echo 'selected="selected"';?>><?php _e('Abril Fatface','green-lantern'); ?></option>
	<option  value="Advent Pro"<?php if($this->value()== 'Advent Pro')  echo 'selected="selected"';?>><?php _e('Advent Pro','green-lantern'); ?></option>
	<option  value="Aldrich"<?php if($this->value()== 'Aldrich') echo 'selected="selected"';?>><?php _e('Aldrich','green-lantern'); ?></option>
	<option  value="Alex Brush"<?php if($this->value()== 'Alex Brush') echo 'selected="selected"';?>><?php _e('Alex Brush','green-lantern'); ?></option>
	<option  value="Allura"<?php if($this->value()== 'Allura') echo 'selected="selected"';?>><?php _e('Allura','green-lantern'); ?></option>
	<option  value="Amatic SC"<?php if($this->value()== 'Amatic SC') echo 'selected="selected"';?>><?php _e('Amatic SC','green-lantern'); ?></option>
	<option  value="arial"<?php if($this->value()== 'arial') echo 'selected="selected"';?>><?php _e('Arial','green-lantern'); ?></option>
	<option  value="Astloch"<?php if($this->value()== 'Astloch') echo 'selected="selected"';?>><?php _e('Astloch','green-lantern'); ?></option>
	<option  value="arno pro bold italic"<?php if($this->value()== 'arno pro bold italic') echo 'selected="selected"';?>><?php _e('Arno pro bold italic','green-lantern'); ?></option>
	<option  value="Bad Script"<?php if($this->value()== 'Bad Script') echo 'selected="selected"';?>><?php _e('Bad Script','green-lantern'); ?></option>
	<option  value="Bilbo"<?php if($this->value()== 'Bilbo') echo 'selected="selected"';?>><?php _e('Bilbo','green-lantern'); ?></option>
	<option  value="Calligraffitti"<?php if($this->value()== 'Calligraffitti') echo 'selected="selected"';?>><?php _e('Calligraffitti','green-lantern'); ?></option>
	<option  value="Candal"<?php if($this->value()== 'Candal') echo 'selected="selected"';?>><?php _e('Candal','green-lantern'); ?></option>
	<option  value="Cedarville Cursive"<?php if($this->value()== 'Cedarville Cursive') echo 'selected="selected"';?>><?php _e('Cedarville Cursive','green-lantern'); ?></option>
	<option  value="Clicker Script"<?php if($this->value()== 'Clicker Script') echo 'selected="selected"';?>><?php _e('Clicker Script','green-lantern'); ?></option>
	<option  value="Dancing Script"<?php if($this->value()== 'Dancing Script') echo 'selected="selected"';?>><?php _e('Dancing Script','green-lantern'); ?></option>
	<option  value="Dawning of a New Day"<?php if($this->value()== 'Dawning of a New Day') echo 'selected="selected"';?>><?php _e('Dawning of a New Day','green-lantern'); ?></option>
	<option  value="Fredericka the Great"<?php if($this->value()== 'Fredericka the Great') echo 'selected="selected"';?>><?php _e('Fredericka the Great','green-lantern'); ?></option>
	<option  value="Felipa"<?php if($this->value()== 'Felipa') echo 'selected="selected"';?>><?php _e('Felipa','green-lantern'); ?></option>
	<option  value="Give You Glory"<?php if($this->value()== 'Give You Glory') echo 'selected="selected"';?>><?php _e('Give You Glory','green-lantern'); ?></option>
	<option  value="Great vibes"<?php if($this->value()== 'Great vibes') echo 'selected="selected"';?>><?php _e('Great vibes','green-lantern'); ?></option>
	<option  value="Homemade Apple"<?php if($this->value()== 'Homemade Apple') echo 'selected="selected"';?>><?php _e('Homemade Apple','green-lantern'); ?></option>
	<option  value="Indie Flower"<?php if($this->value()== 'Indie Flower') echo 'selected="selected"';?>><?php _e('Indie Flower','green-lantern'); ?></option>
	<option  value="Italianno"<?php if($this->value()== 'Italianno') echo 'selected="selected"';?>><?php _e('Italianno','green-lantern'); ?></option>
	<option  value="Jim Nightshade"<?php if($this->value()== 'Jim Nightshade') echo 'selected="selected"';?>><?php _e('Jim Nightshade','green-lantern'); ?></option>
	<option  value="Kaushan Script"<?php if($this->value()== 'Kaushan Script') echo 'selected="selected"';?>><?php _e('Kaushan Script','green-lantern'); ?></option>
	<option  value="Kristi"<?php if($this->value()== 'Kristi') echo 'selected="selected"';?>><?php _e('Kristi','green-lantern'); ?></option>
	<option  value="La Belle Aurore"<?php if($this->value()== 'La Belle Aurore') echo 'selected="selected"';?>><?php _e('La Belle Aurore','green-lantern'); ?></option>
	<option  value="Meddon"<?php if($this->value()== 'Meddon') echo 'selected="selected"';?>><?php _e('Meddon','green-lantern'); ?></option>
	<option  value="Montez"<?php if($this->value()== 'Montez') echo 'selected="selected"';?>><?php _e('Montez','green-lantern'); ?></option>
	<option  value="Megrim"<?php if($this->value()== 'Megrim') echo 'selected="selected"';?>><?php _e('Megrim','green-lantern'); ?></option>
	<option  value="Mr Bedfort"<?php if($this->value()== 'Mr Bedfort') echo 'selected="selected"';?>><?php _e('Mr Bedfort','green-lantern'); ?></option>
	<option  value="Neucha"<?php if($this->value()== 'Neucha') echo 'selected="selected"';?>><?php _e('Neucha','green-lantern'); ?></option>
	<option  value="Nothing You Could Do"<?php if($this->value()== 'Nothing You Could Do') echo 'selected="selected"';?>><?php _e('Nothing You Could Do','green-lantern'); ?></option>
	<option  value="Open Sans"<?php if($this->value()== 'Open Sans') echo 'selected="selected"';?>><?php _e('Open Sans','green-lantern'); ?></option>
	<option  value="Over the Rainbow"<?php if($this->value()== 'Over the Rainbow') echo 'selected="selected"';?>><?php _e('Over the Rainbow','green-lantern'); ?></option>
	<option  value="Pinyon Script"<?php if($this->value()== 'Pinyon Script') echo 'selected="selected"';?>><?php _e('Pinyon Script','green-lantern'); ?></option>
	<option  value="Princess Sofia"<?php if($this->value()== 'Princess Sofia') echo 'selected="selected"';?>><?php _e('Princess Sofia','green-lantern'); ?></option>
	<option  value="Reenie Beanie"<?php if($this->value()== 'Reenie Beanie') echo 'selected="selected"';?>><?php _e('Reenie Beanie','green-lantern'); ?></option>
	<option  value="Rochester"<?php if($this->value()== 'Rochester') echo 'selected="selected"';?>><?php _e('Rochester','green-lantern'); ?></option>
	<option  value="Rock Salt"<?php if($this->value()== 'Rock Salt') echo 'selected="selected"';?>><?php _e('Rock Salt','green-lantern'); ?></option>
	<option  value="Ruthie"<?php if($this->value()== 'Ruthie') echo 'selected="selected"';?>><?php _e('Ruthie','green-lantern'); ?></option>
	<option  value="Sacramento"<?php if($this->value()== 'Sacramento') echo 'selected="selected"';?>><?php _e('Sacramento','green-lantern'); ?></option>
	<option  value="Sans Serif"<?php if($this->value()== 'Sans Serif') echo 'selected="selected"';?>><?php _e('Sans Serif','green-lantern'); ?></option>
	<option  value="Seaweed Script"<?php if($this->value()== 'Seaweed Script') echo 'selected="selected"';?>><?php _e('Seaweed Script','green-lantern'); ?></option>
	<option  value="Shadows Into Light"<?php if($this->value()== 'Shadows Into Light') echo 'selected="selected"';?>><?php _e('Shadows Into Light','green-lantern'); ?></option>
	<option  value="Smythe"<?php if($this->value()== 'Smythe') echo 'selected="selected"';?>><?php _e('Smythe','green-lantern'); ?></option>
	<option  value="Stalemate"<?php if($this->value()== 'Stalemate') echo 'selected="selected"';?>><?php _e('Stalemate','green-lantern'); ?></option>
	<option  value="Tahoma"<?php if($this->value()== 'Tahoma') echo 'selected="selected"';?>><?php _e('Tahoma','green-lantern'); ?></option>
	<option  value="Tangerine"<?php if($this->value()== 'Tangerine') echo 'selected="selected"';?>><?php _e('Tangerine','green-lantern'); ?></option>
	<option  value="Trade Winds"<?php if($this->value()== 'Trade Winds') echo 'selected="selected"';?>><?php _e('Trade Winds','green-lantern'); ?></option>
	<option  value="UnifrakturMaguntia"<?php if($this->value()== 'UnifrakturMaguntia') echo 'selected="selected"';?>><?php _e('UnifrakturMaguntia','green-lantern'); ?></option>
	<option  value="Waiting for the Sunrise"<?php if($this->value()== 'Waiting for the Sunrise') echo 'selected="selected"';?>><?php _e('Waiting for the Sunrise','green-lantern'); ?></option>
	<option  value="Warnes"<?php if($this->value()== 'Warnes') echo 'selected="selected"';?>><?php _e('Warnes','green-lantern'); ?></option>
	<option  value="Yesteryear"<?php if($this->value()== 'Yesteryear') echo 'selected="selected"';?>><?php _e('Yesteryear','green-lantern'); ?></option>
	<option  value="Zeyada"<?php if($this->value()== 'Zeyada') echo 'selected="selected"';?>><?php _e('Zeyada','green-lantern'); ?></option>
    </select>		
		
  <?php
 }
}
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'green_lantern_Customizer_Icon_Picker_Control' ) ) :
	class green_lantern_Customizer_Icon_Picker_Control extends WP_Customize_Control {
		public function enqueue() {
			wp_enqueue_script( 'fontawesome-iconpicker', get_stylesheet_directory_uri() . '/iconpicker-control/assets/js/fontawesome-iconpicker.min.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'iconpicker-control', get_stylesheet_directory_uri() . '/iconpicker-control/assets/js/iconpicker-control.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_style( 'fontawesome-iconpicker', get_stylesheet_directory_uri() . '/iconpicker-control/assets/css/fontawesome-iconpicker.min.css' );
		}
		
		
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</span>
				<div class="input-group icp-container">
					<input data-placement="bottomRight" class="icp icp-auto" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" type="text">
					<span class="input-group-addon"></span>
				</div>
			</label>
			<?php
		}
	}
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'green_lantern_Custom_sortable_Control' ) ) :
class green_lantern_Custom_sortable_Control extends WP_Customize_Control
{
    public $type = 'home-sortable';
    /*Enqueue resources for the control*/
    public function enqueue()
    {

        wp_enqueue_style('customizer-repeater-admin-stylesheet', get_template_directory_uri() . '/assets/customizer_js_css/css/green_lantern-admin-style.css', time());

        wp_enqueue_script('customizer-repeater-script', get_template_directory_uri() . '/assets/customizer_js_css/js/green_lantern-customizer_repeater.js', array('jquery', 'jquery-ui-draggable'), time(), true);

    }
    public function render_content()
    {
        if (empty($this->choices)) {
            return;
        }
        $values = json_decode($this->value());
        $name         = $this->id;
        ?>

		<span class="customize-control-title">
			<?php echo esc_attr($this->label); ?>
		</span>

		<?php if (!empty($this->description)): ?>
			<span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
		<?php endif;?>

		<div class="customizer-repeater-general-control-repeater customizer-repeater-general-control-droppable">
			<?php 
			if(!empty($values)){ 
				foreach ($values as $value) {?>
					<div class="customizer-repeater-general-control-repeater-container customizer-repeater-draggable ui-sortable-handle">
					<div class="customizer-repeater-customize-control-title">
						<?php echo $this->choices[$value]; ?>
					</div>
					<input type="hidden" class="section-id" value="<?php echo $value; ?>">
					</div>	
				<?php }?>
				
			<?php }else{
			foreach ($this->choices as $value => $label): ?>
					<div class="customizer-repeater-general-control-repeater-container customizer-repeater-draggable ui-sortable-handle">
					<div class="customizer-repeater-customize-control-title">
						<?php echo $label; ?>
					</div>
					<input type="hidden" class="section-id" value="<?php echo $value; ?>">
					</div>

				<?php endforeach;
			}
        		if (!empty($value)) {?>
					<input type="hidden"
					       id="customizer-repeater-<?php echo $this->id; ?>-colector" <?php esc_url($this->link());?>
					       class="customizer-repeater-colector"
					       value="<?php echo esc_textarea(json_encode($value)); ?>"/>
					<?php
				} else {?>
					<input type="hidden"
					       id="customizer-repeater-<?php echo $this->id; ?>-colector" <?php esc_url($this->link());?>
					       class="customizer-repeater-colector"/>
					<?php
				}?>
		</div>
		<?php
}
}
endif;

function sanitize_json_string($json){
    $sanitized_value = array();
    foreach (json_decode($json,true) as $value) {
        $sanitized_value[] = esc_attr($value);
    }
    return json_encode($sanitized_value);
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'One_Page_Editor' ) ) :
/* Class to create a custom tags control */
class One_Page_Editor extends WP_Customize_Control {	
	private $include_admin_print_footer = false;
	private $teeny = false;
	public $type = 'text-editor';
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		if ( ! empty( $args['include_admin_print_footer'] ) ) {
			$this->include_admin_print_footer = $args['include_admin_print_footer'];
		}
		if ( ! empty( $args['teeny'] ) ) {
			$this->teeny = $args['teeny'];
		}
	}
	/* Enqueue scripts */
	public function enqueue() {
		wp_enqueue_script( 'one_lite_text_editor', get_template_directory_uri() . '/inc/customizer-page-editor/js/one-lite-text-editor.js', array( 'jquery' ), false, true );
	}
	/* Render the content on the theme customizer page */
	public function render_content() {
		?>

		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<input type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>">
		<?php
		$settings = array(
			'textarea_name' => $this->id,
			'teeny' => $this->teeny,
		);
		$control_content = $this->value();
		wp_editor( $control_content, $this->id, $settings );

		if ( $this->include_admin_print_footer === true ) {
			do_action( 'admin_print_footer_scripts' );
		}
	}
}
endif;

function show_on_front() {
	if(is_front_page())
	{
		return is_front_page() && 'posts' !== get_option( 'show_on_front' );
	}
	elseif(is_home()) 
	{
		return is_home();
	}
}
?>