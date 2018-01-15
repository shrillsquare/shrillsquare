<?php
/**
 * Sample implementation of the Custom Header feature.
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package eDS_Opener
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses enigma_header_style()
 */
function green_lantern_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'green_lantern_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'ffffff',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'green_lantern_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'green_lantern_custom_header_setup' );

if ( ! function_exists( 'green_lantern_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see wp_news_custom_header_setup().
 */
function green_lantern_header_style() {
	$header_text_color = get_header_textcolor();

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
	 */
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}		

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :  ?>
		.logo a,.logo a:hover {
		color: rgba(241, 241, 241, 0);
		clip: rect(1px 1px 1px 1px);
		}
		.logo p {
		color: rgba(241, 241, 241, 0);
		position:absolute;
		clip: rect(1px 1px 1px 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :	?>
		.logo a, .logo p {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php } endif; ?>