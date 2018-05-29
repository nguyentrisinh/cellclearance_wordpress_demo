<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Jstore_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function jstore_get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->jstore_setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function jstore_setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'jstore_sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'jstore_enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function jstore_sections( $jstore_manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . 'trt-customize-pro/premium/section-pro.php' );
		
		// Register custom section types.
		$jstore_manager->register_section_type( 'Jstore_Customize_Section_Pro' );

		// Register sections.
		$jstore_manager->add_section(
			new Jstore_Customize_Section_Pro(
				$jstore_manager,
				'jstore_pro',
				array(
					'title'    => esc_html__( 'Jstore Pro', 'jstore' ),
					'pro_text' => esc_html__( 'Go Pro','jstore' ),
					'pro_url'  => 'https://www.phoeniixx.com/product/jstore-theme/',
					'priority' => 11,
					
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function jstore_enqueue_control_scripts() {

		wp_enqueue_script( 'jstore-customize-controls', trailingslashit( get_template_directory_uri() ) . 'trt-customize-pro/premium/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'jstore-customize-controls', trailingslashit( get_template_directory_uri() ) . 'trt-customize-pro/premium/customize-controls.css' );
	}
}

// Doing this customizer thang!
Jstore_Customize::jstore_get_instance();