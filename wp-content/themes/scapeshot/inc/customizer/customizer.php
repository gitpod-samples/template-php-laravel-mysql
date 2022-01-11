<?php
/**
 * Theme Customizer
 *
 * @package ScapeShot
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function scapeshot_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport              = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport       = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport      = 'postMessage';
	$wp_customize->get_setting( 'header_video' )->transport          = 'refresh';
	$wp_customize->get_setting( 'external_header_video' )->transport = 'refresh';
	$wp_customize->get_setting( 'header_image' )->transport 		 = 'refresh';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'container_inclusive' => false,
			'render_callback' => 'scapeshot_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'container_inclusive' => false,
			'render_callback' => 'scapeshot_customize_partial_blogdescription',
		) );
	}

	$wp_customize->get_control( 'header_textcolor' )->priority= 1;
	$wp_customize->get_control( 'header_textcolor' )->description = esc_html__( '(This option does not work if Header Media or Featured Slider is enabled. Go to Header Text Color With Header Media below to change Header Text Color )', 'scapeshot' );

	// Header Text Color With Header Media.
	scapeshot_register_option( $wp_customize, array(
			'name'              => 'header_textcolor_with_header_media',
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
			'custom_control'    => 'WP_Customize_Color_Control',
			'label'             => esc_html__( 'Header Text Color With Header Media', 'scapeshot' ),
			'description'		=> esc_html__( '(Only works with either Header Media or Featured Slider is enabled)', 'scapeshot' ),
			'section'           => 'colors',
			'priority'      	=> 2,
		)
	);

	// Important Links.
	$wp_customize->add_section( 'scapeshot_important_links', array(
		'priority'      => 999,
		'title'         => esc_html__( 'Important Links', 'scapeshot' ),
	) );

	// Has dummy Sanitizaition function as it contains no value to be sanitized.
	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_important_links',
			'sanitize_callback' => 'sanitize_text_field',
			'custom_control'    => 'ScapeShot_Important_Links_Control',
			'label'             => esc_html__( 'Important Links', 'scapeshot' ),
			'section'           => 'scapeshot_important_links',
			'type'              => 'scapeshot_important_links',
		)
	);
	// Important Links End.
}
add_action( 'customize_register', 'scapeshot_customize_register', 11 );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function scapeshot_customize_preview_js() {
	$min  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	$path = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'assets/js/source/' : 'assets/js/';

	wp_enqueue_script( 'scapeshot-customize-preview', get_theme_file_uri( $path . 'customize-preview' . $min . '.js' ), array( 'customize-preview' ), '20180103', true );
}
add_action( 'customize_preview_init', 'scapeshot_customize_preview_js' );

/**
 * Include Custom Controls
 */
require get_parent_theme_file_path( 'inc/customizer/custom-controls.php' );

/**
 * Include Header Media Options
 */
require get_parent_theme_file_path( 'inc/customizer/header-media.php' );

/**
 * Include Theme Options
 */
require get_parent_theme_file_path( 'inc/customizer/theme-options.php' );

/**
 * Include Hero Content
 */
require get_parent_theme_file_path( 'inc/customizer/hero-content.php' );

/**
 * Include Featured Slider
 */
require get_parent_theme_file_path( 'inc/customizer/featured-slider.php' );

/**
 * Include Featured Content
 */
require get_parent_theme_file_path( 'inc/customizer/featured-content.php' );

/**
 * Include Testimonial
 */
require get_parent_theme_file_path( 'inc/customizer/testimonial.php' );

/**
 * Include Portfolio
 */
require get_parent_theme_file_path( 'inc/customizer/portfolio.php' );

/**
 * Include Customizer Helper Functions
 */
require get_parent_theme_file_path( 'inc/customizer/helpers.php' );

/**
 * Include Sanitization functions
 */
require get_parent_theme_file_path( 'inc/customizer/sanitize-functions.php' );

/**
 * Include Service
 */
require get_parent_theme_file_path( 'inc/customizer/service.php' );

/**
 * Include Reset Button
 */
require get_parent_theme_file_path( 'inc/customizer/reset.php' );

/**
 * Upgrade to Pro Button
 */
require get_parent_theme_file_path( 'inc/customizer/upgrade-button/class-customize.php' );
