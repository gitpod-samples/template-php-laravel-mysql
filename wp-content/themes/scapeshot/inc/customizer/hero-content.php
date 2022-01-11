<?php
/**
 * Hero Content Options
 *
 * @package ScapeShot
 */

/**
 * Add hero content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function scapeshot_hero_content_options( $wp_customize ) {
	$wp_customize->add_section( 'scapeshot_hero_content_options', array(
			'title' => esc_html__( 'Hero Content', 'scapeshot' ),
			'panel' => 'scapeshot_theme_options',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_hero_content_visibility',
			'default'           => 'disabled',
			'sanitize_callback' => 'scapeshot_sanitize_select',
			'choices'           => scapeshot_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'scapeshot' ),
			'section'           => 'scapeshot_hero_content_options',
			'type'              => 'select',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_hero_content_section_tagline',
			'sanitize_callback' => 'sanitize_text_field',
			'active_callback'   => 'scapeshot_is_hero_content_active',
			'label'             => esc_html__( 'Section Tagline', 'scapeshot' ),
			'description'       => esc_html__( 'Displays above title', 'scapeshot' ),
			'section'           => 'scapeshot_hero_content_options',
			'type'              => 'text',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_hero_content',
			'default'           => '0',
			'sanitize_callback' => 'scapeshot_sanitize_post',
			'active_callback'   => 'scapeshot_is_hero_content_active',
			'label'             => esc_html__( 'Page', 'scapeshot' ),
			'section'           => 'scapeshot_hero_content_options',
			'type'              => 'dropdown-pages',
		)
	);
	
	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_hero_content_section_description',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'scapeshot_is_hero_content_active',
			'label'             => esc_html__( 'Section Description', 'scapeshot' ),
			'section'           => 'scapeshot_hero_content_options',
			'type'              => 'textarea',
		)
	);
}
add_action( 'customize_register', 'scapeshot_hero_content_options' );

/** Active Callback Functions **/
if ( ! function_exists( 'scapeshot_is_hero_content_active' ) ) :
	/**
	* Return true if hero content is active
	*
	* @since ScapeShot Pro 1.0
	*/
	function scapeshot_is_hero_content_active( $control ) {
		$enable = $control->manager->get_setting( 'scapeshot_hero_content_visibility' )->value();

		return scapeshot_check_section( $enable );
	}
endif;
