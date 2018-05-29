<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Jstore
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses jstore_header_style()
 */
function jstore_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'jstore_custom_header_args', array(
		'default-image'          =>'',
		'width'                  => 2000,
		'height'                 => 200,
		'flex-height'            => true,
		'wp-head-callback'       => 'jstore_header_style',
	) ) );
	
}
add_action( 'after_setup_theme', 'jstore_custom_header_setup' );

if ( ! function_exists( 'jstore_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see jstore_custom_header_setup().
 */
 
function jstore_custom_css_func() {
	
	wp_enqueue_style(
		'jstore-custom-style',
		get_template_directory_uri() . '/css/jstore_custom_script.css'
	);
	
	$jstore_custom_css = "
					.site-title,
					.site-description {
					position: absolute;
					clip: rect(1px, 1px, 1px, 1px);
				}";
	wp_add_inline_style( 'jstore-custom-style', $jstore_custom_css );
} 

add_action('jstore_sit_ttle_func','jstore_custom_css_func');
 
function jstore_hdr_txt_css_func() {
	
	wp_enqueue_style(
		'jstore-custom-style',
		get_template_directory_uri() . '/css/jstore_custom_script.css'
	);
	$header_text_color = get_header_textcolor();
	
	$jstore_hdr_css = "
					.site-title a,
		.site-description {
			color: #".esc_attr($header_text_color).";
		}";
	wp_add_inline_style( 'jstore-custom-style', $jstore_hdr_css );
} 

add_action('jstore_sit_hdr_txt_func','jstore_hdr_txt_css_func');



function jstore_header_style() {
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
		if ( ! display_header_text() ) :
			
			do_action('jstore_sit_ttle_func');
	
		// If the user has set a custom color for the text use that.
		else :
			
			do_action('jstore_sit_hdr_txt_func');
		
		endif; ?>
	</style>
	<?php
}
endif;
