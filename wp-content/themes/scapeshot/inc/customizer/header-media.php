<?php
/**
 * Header Media Options
 *
 * @package ScapeShot
 */

/**
 * Add Header Media options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function scapeshot_header_media_options( $wp_customize ) {
	$wp_customize->get_section( 'header_image' )->description = esc_html__( 'If you add video, it will only show up on Homepage/FrontPage. Other Pages will use Header/Post/Page Image depending on your selection of option. Header Image will be used as a fallback while the video loads ', 'scapeshot' );

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_header_media_option',
			'default'           => 'entire-site',
			'sanitize_callback' => 'scapeshot_sanitize_select',
			'choices'           => array(
				'homepage'               => esc_html__( 'Homepage / Frontpage', 'scapeshot' ),
				'entire-site'            => esc_html__( 'Entire Site', 'scapeshot' ),
				'disable'                => esc_html__( 'Disabled', 'scapeshot' ),
			),
			'label'             => esc_html__( 'Enable on', 'scapeshot' ),
			'section'           => 'header_image',
			'type'              => 'select',
			'priority'          => 1,
		)
	);

	/*Overlay Option for Header Media*/
	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_header_media_image_opacity',
			'default'           => '0',
			'sanitize_callback' => 'scapeshot_sanitize_number_range',
			'label'             => esc_html__( 'Header Media Overlay ( 0 - 100 )', 'scapeshot' ),
			'section'           => 'header_image',
			'type'              => 'number',
			'input_attrs'       => array(
				'style' => 'width: 60px;',
				'min'   => 0,
				'max'   => 100,
			),
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_header_media_sub_title',
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Header Media Tagline', 'scapeshot' ),
			'section'           => 'header_image',
			'type'              => 'text',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_header_media_logo_option',
			'default'           => 'homepage',
			'sanitize_callback' => 'scapeshot_sanitize_select',
			'active_callback'   => 'scapeshot_is_header_media_logo_active',
			'choices'           => array(
				'homepage'    => esc_html__( 'Homepage / Frontpage', 'scapeshot' ),
				'entire-site' => esc_html__( 'Entire Site', 'scapeshot' ) ),
			'label'             => esc_html__( 'Enable Header Media logo on', 'scapeshot' ),
			'section'           => 'header_image',
			'type'              => 'select',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_header_media_logo',
			'sanitize_callback' => 'esc_url_raw',
			'custom_control'    => 'WP_Customize_Image_Control',
			'label'             => esc_html__( 'Header Media Logo', 'scapeshot' ),
			'section'           => 'header_image',
		)
	);

    scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_header_media_title',
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Header Media Title', 'scapeshot' ),
			'section'           => 'header_image',
			'type'              => 'text',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_header_media_text',
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Site Header Text', 'scapeshot' ),
			'section'           => 'header_image',
			'type'              => 'textarea',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_header_media_url',
			'default'           => '#',
			'sanitize_callback' => 'esc_url_raw',
			'label'             => esc_html__( 'Header Media Url', 'scapeshot' ),
			'section'           => 'header_image',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_header_media_url_text',
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Header Media Url Text', 'scapeshot' ),
			'section'           => 'header_image',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_header_url_target',
			'sanitize_callback' => 'scapeshot_sanitize_checkbox',
			'label'             => esc_html__( 'Open Link in New Window/Tab', 'scapeshot' ),
			'section'           => 'header_image',
			'custom_control'    => 'ScapeShot_Toggle_Control',
		)
	);
}
add_action( 'customize_register', 'scapeshot_header_media_options' );

/** Active Callback Functions */

if ( ! function_exists( 'scapeshot_is_header_media_logo_active' ) ) :
	/**
	* Return true if header logo is active
	*
	* @since ScapeShot Pro 1.0
	*/
	function scapeshot_is_header_media_logo_active( $control ) {
		$logo = $control->manager->get_setting( 'scapeshot_header_media_logo' )->value();
		if ( '' != $logo ) {
			return true;
		} else {
			return false;
		}
	}
endif;
