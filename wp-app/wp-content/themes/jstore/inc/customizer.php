<?php
/**
 * Jstore Theme Customizer.
 *
 * @package Jstore
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
 
function jstore_customize_register( $wp_customize ) {
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Home page section 
	$wp_customize->add_section("jstore_home_page_set", array(
		"title" => __("Topbar Setting ", "jstore"),
		"priority" => 30,
	));


		// for customer care text
		$wp_customize->add_setting("jstore_cust_care_text", array(
			"default" => "",
			"transport" => "refresh",
			'sanitize_callback' => 'jstore_text_sanitize'
		));
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"jstore_cust_care_text",
			array(
				"label" => __("Enter Customer Care Text", "jstore"),
				"section" => "jstore_home_page_set",
				"settings" => "jstore_cust_care_text",
				"type" => "text",
				
			)
		));
		// for customer care number
		$wp_customize->add_setting("jstore_cust_care_no", array(
			"default" => '',
			"transport" => "refresh",
			'sanitize_callback' => 'jstore_text_sanitize'
		));
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"jstore_cust_care_no",
			array(
				"label" => __("Enter Customer Care No", "jstore"),
				"section" => "jstore_home_page_set",
				"settings" => "jstore_cust_care_no",
				"type" => "text",
				
			)
		));
		
			
	// Banner image section
	$wp_customize->add_section("jstore_banner", array(
		"title" => __("Banner", "jstore"),
		"priority" => 31,
	));
		
		// for banner on off option
		$wp_customize->add_setting("jstore_home_banner_on_off", array(
			"default" => 'off',
			"transport" => "refresh",
			'sanitize_callback' => 'jstore_radio_sanitize_row',
		));
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"jstore_home_banner_on_off",
			array(
			'type' => 'radio',
			'label' => __("Banner On/Off", "jstore"),
			'section' => 'jstore_banner',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off',
			),
		)
		));		
		
		// for banner image 1
		$wp_customize->add_setting("jstore_bnr_img1", array(
			"default" => '',
			"transport" => "refresh",
			'sanitize_callback' => 'esc_url_raw'
		));
		$wp_customize->add_control(new WP_Customize_Image_Control(
			$wp_customize,
			"jstore_bnr_img1",
			array(
				"label" => __("Banner Image 1", "jstore"),
				"section" => "jstore_banner",
				"settings" => "jstore_bnr_img1",
				
			)
		));
		// for banner image 2	
		$wp_customize->add_setting("jstore_bnr_img2", array(
			"default" =>  '',
			"transport" => "refresh",
			'sanitize_callback' => 'esc_url_raw'
		));
		$wp_customize->add_control(new WP_Customize_Image_Control(
			$wp_customize,
			"jstore_bnr_img2",
			array(
				"label" => __("Banner Image 2", "jstore"),
				"section" => "jstore_banner",
				"settings" => "jstore_bnr_img2",
				
			)
		));
	
	// Smalll Banner image section
	$wp_customize->add_section("jstore-small-banner", array(
		"title" => __("Small Banner", "jstore"),
		"priority" => 32,
	));
	
		// for small banner on off option
		$wp_customize->add_setting("jstore_small_banner_on_off", array(
			"default" => 'off',
			"transport" => "refresh",
			'sanitize_callback' => 'jstore_radio_sanitize_row',
		));
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"jstore_small_banner_on_off",
			array(
			'type' => 'radio',
			'label' => __("Small Banner On/Off", "jstore"),
			'section' => 'jstore-small-banner',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off',
			),
		)
		));			
		
		// for small banner image 1	
		$wp_customize->add_setting("jstore-small-banner-1", array(
			"default" => '',
			"transport" => "refresh",
			'sanitize_callback' => 'esc_url_raw'
		));
		$wp_customize->add_control(new WP_Customize_Image_Control(
			$wp_customize,
			"jstore-small-banner-1",
			array(
				"label" => __("Small Banner Image 1", "jstore"),
				"section" => "jstore-small-banner",
				"settings" => "jstore-small-banner-1",
				
			)
		));
		
		// for small banner image 2	
		$wp_customize->add_setting("jstore-small-banner-2", array(
			"default" => '',
			"transport" => "refresh",
			'sanitize_callback' => 'esc_url_raw'
		));
		$wp_customize->add_control(new WP_Customize_Image_Control(
			$wp_customize,
			"jstore-small-banner-2",
			array(
				"label" => __("Small Banner Image 2", "jstore"),
				"section" => "jstore-small-banner",
				"settings" => "jstore-small-banner-2",
				
			)
		));
		
		// for small banner image 3	
		$wp_customize->add_setting("jstore-small-banner-3", array(
			"default" => '',
			"transport" => "refresh",
			'sanitize_callback' => 'esc_url_raw'
		));
		$wp_customize->add_control(new WP_Customize_Image_Control(
			$wp_customize,
			"jstore-small-banner-3",
			array(
				"label" => __("Small Banner Image 3", "jstore"),
				"section" => "jstore-small-banner",
				"settings" => "jstore-small-banner-3",
				
			)
		));
		
		
	// for home products heading
	$wp_customize->add_section("jstore_home_prdct_head", array(
		"title" => __("Home Poducts Heading", "jstore"),
		"priority" => 32,
	));	
		
		// for new arrival product
		$wp_customize->add_setting("jstore_new_arvl_itm", array(
			"default" => '',
			"transport" => "refresh",
			'sanitize_callback' => 'jstore_text_sanitize'
		));
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"jstore_new_arvl_itm",
			array(
				"label" => __("Heading for New Arrivals", "jstore"),
				"section" => "jstore_home_prdct_head",
				"settings" => "jstore_new_arvl_itm",
				"type" => "text",
				
			)
		));
		
		// for top rated product
		$wp_customize->add_setting("jstore_top_rtd_itm", array(
			"default" => '',
			"transport" => "refresh",
			'sanitize_callback' => 'jstore_text_sanitize'
		));
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"jstore_top_rtd_itm",
			array(
				"label" => __("Heading for Top Rated Product", "jstore"),
				"section" => "jstore_home_prdct_head",
				"settings" => "jstore_top_rtd_itm",
				"type" => "text",
				
			)
		));
		
		// for top selling product
		$wp_customize->add_setting("jstore_top_seling_itm", array(
			"default" => '',
			"transport" => "refresh",
			'sanitize_callback' => 'jstore_text_sanitize'
		));
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"jstore_top_seling_itm",
			array(
				"label" => __("Heading for Top Selling Product", "jstore"),
				"section" => "jstore_home_prdct_head",
				"settings" => "jstore_top_seling_itm",
				"type" => "text",
				
			)
		));
		
	
	// Our Brands logo image section
	$wp_customize->add_section("jstore_our_brand_logo", array(
		"title" => __("Our Brands Logo", "jstore"),
		"priority" => 33,
	));
		
		// for brand logo 1
		$wp_customize->add_setting("jstore_our_brand_logo1", array(
			"default" =>'',
			"transport" => "refresh",
			'sanitize_callback' => 'esc_url_raw'
		));
		$wp_customize->add_control(new WP_Customize_Image_Control(
			$wp_customize,
			"jstore_our_brand_logo1",
			array(
				"label" => __("Our Brand Logo 1", "jstore"),
				"section" => "jstore_our_brand_logo",
				"settings" => "jstore_our_brand_logo1",
				
			)
		));
		
		// for brand logo 2
		$wp_customize->add_setting("jstore_our_brand_logo2", array(
			"default" => '',
			"transport" => "refresh",
			'sanitize_callback' => 'esc_url_raw'
		));
		$wp_customize->add_control(new WP_Customize_Image_Control(
			$wp_customize,
			"jstore_our_brand_logo2",
			array(
				"label" => __("Our Brand Logo 2", "jstore"),
				"section" => "jstore_our_brand_logo",
				"settings" => "jstore_our_brand_logo2",
				
			)
		));
		
		// for brand logo 3
		$wp_customize->add_setting("jstore_our_brand_logo3", array(
			"default" => '',
			"transport" => "refresh",
			'sanitize_callback' => 'esc_url_raw'
		));
		$wp_customize->add_control(new WP_Customize_Image_Control(
			$wp_customize,
			"jstore_our_brand_logo3",
			array(
				"label" => __("Our Brand Logo 3", "jstore"),
				"section" => "jstore_our_brand_logo",
				"settings" => "jstore_our_brand_logo3",
				
			)
		));
		
		// for brand logo 4
		$wp_customize->add_setting("jstore_our_brand_logo4", array(
			"default" =>  '',
			"transport" => "refresh",
			'sanitize_callback' => 'esc_url_raw'
		));
		$wp_customize->add_control(new WP_Customize_Image_Control(
			$wp_customize,
			"jstore_our_brand_logo4",
			array(
				"label" => __("Our Brand Logo 4", "jstore"),
				"section" => "jstore_our_brand_logo",
				"settings" => "jstore_our_brand_logo4",
				
			)
		));
		
		// for brand logo 5
		$wp_customize->add_setting("jstore_our_brand_logo5", array(
			"default" =>  '',
			"transport" => "refresh",
			'sanitize_callback' => 'esc_url_raw'
		));
		$wp_customize->add_control(new WP_Customize_Image_Control(
			$wp_customize,
			"jstore_our_brand_logo5",
			array(
				"label" => __("Our Brand Logo 5", "jstore"),
				"section" => "jstore_our_brand_logo",
				"settings" => "jstore_our_brand_logo5",
				
			)
		));
		
		// for brand logo 6
		$wp_customize->add_setting("jstore_our_brand_logo6", array(
			"default" => '',
			"transport" => "postMessage",
			'sanitize_callback' => 'esc_url_raw'
		));
		$wp_customize->add_control(new WP_Customize_Image_Control(
			$wp_customize,
			"jstore_our_brand_logo6",
			array(
				"label" => __("Our Brand Logo 6", "jstore"),
				"section" => "jstore_our_brand_logo",
				"settings" => "jstore_our_brand_logo6",
				
			)
		));
		
	// Copyright Text section
	$wp_customize->add_section("jstore_copyright_section", array(
		"title" => __("Footer Options", "jstore"),
		"priority" => 36,
	));
	
		// for copyright text
		$wp_customize->add_setting("jstore_copyright_text", array(
			"default" => '',
			"transport" => "refresh",
			'sanitize_callback' => 'jstore_text_sanitize'
		));
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"jstore_copyright_text",
			array(
				"label" => __("Footer Bottom Text", "jstore"),
				"section" => "jstore_copyright_section",
				"settings" => "jstore_copyright_text",
				"type" => "text",
				
			)
		));
	
	
	
	
}
add_action( 'customize_register', 'jstore_customize_register' );

function jstore_text_sanitize( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function jstore_radio_sanitize_row($input) {
  $valid_keys = array(
		'on' => 'On',
		'off' => 'Off',
  );
  if ( array_key_exists( $input, $valid_keys ) ) {
	 return $input;
  } else {
	 return '';
  }
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function jstore_customize_preview_js() {
	wp_enqueue_script( 'jstore_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'jstore_customize_preview_js' );