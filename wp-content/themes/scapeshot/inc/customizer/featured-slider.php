<?php
/**
 * Featured Slider Options
 *
 * @package ScapeShot
 */

/**
 * Add hero content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function scapeshot_slider_options( $wp_customize ) {
	$wp_customize->add_section( 'scapeshot_featured_slider', array(
			'panel' => 'scapeshot_theme_options',
			'title' => esc_html__( 'Featured Slider', 'scapeshot' ),
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_slider_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'scapeshot_sanitize_select',
			'choices'           => scapeshot_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'scapeshot' ),
			'section'           => 'scapeshot_featured_slider',
			'type'              => 'select',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_slider_number',
			'default'           => '4',
			'sanitize_callback' => 'scapeshot_sanitize_number_range',

			'active_callback'   => 'scapeshot_is_slider_active',
			'description'       => esc_html__( 'Save and refresh the page if No. of Slides is changed (Max no of slides is 20)', 'scapeshot' ),
			'input_attrs'       => array(
				'style' => 'width: 100px;',
				'min'   => 0,
				'max'   => 20,
				'step'  => 1,
			),
			'label'             => esc_html__( 'No of Slides', 'scapeshot' ),
			'section'           => 'scapeshot_featured_slider',
			'type'              => 'number',
		)
	);

	$slider_number = get_theme_mod( 'scapeshot_slider_number', 4 );

	for ( $i = 1; $i <= $slider_number ; $i++ ) {
		// Slider Note
		scapeshot_register_option( $wp_customize, array(
				'name'              => 'scapeshot_slider_note_' . $i,
				'sanitize_callback' => 'sanitize_text_field',
				'custom_control'    => 'ScapeShot_Note_Control',
				'active_callback'   => 'scapeshot_is_slider_active',
				'label'             => esc_html__( 'Slide #', 'scapeshot' ) . $i,
				'section'           => 'scapeshot_featured_slider',
				'type'              => 'description',
			)
		);

		// Page Sliders
		scapeshot_register_option( $wp_customize, array(
				'name'              => 'scapeshot_slider_page_' . $i,
				'sanitize_callback' => 'scapeshot_sanitize_post',
				'active_callback'   => 'scapeshot_is_slider_active',
				'label'             => esc_html__( 'Page', 'scapeshot' ),
				'section'           => 'scapeshot_featured_slider',
				'type'              => 'dropdown-pages',
			)
		);

		scapeshot_register_option( $wp_customize, array(
				'name'              => 'scapeshot_slider_logo_image_' . $i,
				'sanitize_callback' => 'esc_url_raw',
				'active_callback'   => 'scapeshot_is_slider_active',
				'custom_control'    => 'WP_Customize_Image_Control',
				'description'       => esc_html__( 'Displays above title', 'scapeshot' ),
				'label'             => esc_html__( 'Logo', 'scapeshot' ),
				'section'           => 'scapeshot_featured_slider',
			)
		);
	} // End for().
}
add_action( 'customize_register', 'scapeshot_slider_options' );

/** Active Callback Functions */

if ( ! function_exists( 'scapeshot_is_slider_active' ) ) :
	/**
	* Return true if slider is active
	*
	* @since ScapeShot Pro 1.0
	*/
	function scapeshot_is_slider_active( $control ) {
		$enable = $control->manager->get_setting( 'scapeshot_slider_option' )->value();

		//return true only if previwed page on customizer matches the type option selected
		return scapeshot_check_section( $enable );
	}
endif;