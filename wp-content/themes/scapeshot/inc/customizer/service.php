<?php
/**
 * Services options
 *
 * @package ScapeShot
 */

/**
 * Add services content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function scapeshot_service_options( $wp_customize ) {
	// Add note to Jetpack Testimonial Section
    scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_service_jetpack_note',
			'sanitize_callback' => 'sanitize_text_field',
			'custom_control'    => 'ScapeShot_Note_Control',
			'label'             => sprintf( esc_html__( 'For Service Options for ScapeShot Theme, go %1$shere%2$s', 'scapeshot' ),
				 '<a href="javascript:wp.customize.section( \'scapeshot_service\' ).focus();">',
				 '</a>'
			),
			'section'           => 'ect_service',
			'type'              => 'description',
			'priority'          => 1,
		)
	);

    $wp_customize->add_section( 'scapeshot_service', array(
			'title' => esc_html__( 'Services', 'scapeshot' ),
			'panel' => 'scapeshot_theme_options',
		)
	);

	$action = 'install-plugin';
    $slug   = 'essential-content-types';

    $install_url = wp_nonce_url(
        add_query_arg(
            array(
                'action' => $action,
                'plugin' => $slug
            ),
            admin_url( 'update.php' )
        ),
        $action . '_' . $slug
    );

    scapeshot_register_option( $wp_customize, array(
            'name'              => 'scapeshot_service_jetpack_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'ScapeShot_Note_Control',
          	'active_callback'   => 'scapeshot_is_ect_services_inactive',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
            'label'             => sprintf( esc_html__( 'For Service, install %1$sEssential Content Types%2$s Plugin with Service Type Enabled', 'scapeshot' ),
                '<a target="_blank" href="' . esc_url( $install_url ) . '">',
                '</a>'

            ),
           'section'            => 'scapeshot_service',
            'type'              => 'description',
            'priority'          => 1,
        )
    );


	// Add color scheme setting and control.
	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_service_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'scapeshot_sanitize_select',
			'active_callback'   => 'scapeshot_is_ect_services_active',
			'choices'           => scapeshot_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'scapeshot' ),
			'section'           => 'scapeshot_service',
			'type'              => 'select',
		)
	);

    scapeshot_register_option( $wp_customize, array(
            'name'              => 'scapeshot_service_cpt_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'ScapeShot_Note_Control',
            'active_callback'   => 'scapeshot_is_services_active',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
			'label'             => sprintf( esc_html__( 'For CPT heading and sub-heading, go %1$shere%2$s', 'scapeshot' ),
                 '<a href="javascript:wp.customize.control( \'ect_service_title\' ).focus();">',
                 '</a>'
            ),
            'section'           => 'scapeshot_service',
            'type'              => 'description',
        )
    );

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_service_number',
			'default'           => 3,
			'sanitize_callback' => 'scapeshot_sanitize_number_range',
			'active_callback'   => 'scapeshot_is_services_active',
			'description'       => esc_html__( 'Save and refresh the page if No. of Services is changed (Max no of Services is 20)', 'scapeshot' ),
			'input_attrs'       => array(
				'style' => 'width: 100px;',
				'min'   => 0,
			),
			'label'             => esc_html__( 'No of items', 'scapeshot' ),
			'section'           => 'scapeshot_service',
			'type'              => 'number',
			'transport'         => 'postMessage',
		)
	);

	$number = get_theme_mod( 'scapeshot_service_number', 3 );

	//loop for services post content
	for ( $i = 1; $i <= $number ; $i++ ) {
		scapeshot_register_option( $wp_customize, array(
				'name'              => 'scapeshot_service_cpt_' . $i,
				'sanitize_callback' => 'scapeshot_sanitize_post',
				'active_callback'   => 'scapeshot_is_services_active',
				'label'             => esc_html__( 'Services', 'scapeshot' ) . ' ' . $i ,
				'section'           => 'scapeshot_service',
				'type'              => 'select',
                'choices'           => scapeshot_generate_post_array( 'ect-service' ),
			)
		);
	} // End for().
}
add_action( 'customize_register', 'scapeshot_service_options', 10 );

/** Active Callback Functions **/
if ( ! function_exists( 'scapeshot_is_services_active' ) ) :
	/**
	* Return true if services content is active
	*
	* @since ScapeShot 1.0
	*/
	function scapeshot_is_services_active( $control ) {
		$enable = $control->manager->get_setting( 'scapeshot_service_option' )->value();

		//return true only if previewed page on customizer matches the type of content option selected
		return scapeshot_check_section( $enable );
	}
endif;

if ( ! function_exists( 'scapeshot_is_ect_services_inactive' ) ) :
    /**
    * Return true if service is active
    *
    * @since Scapeshot 1.0
    */
    function scapeshot_is_ect_services_inactive( $control ) {
        return ! ( class_exists( 'Essential_Content_Service' ) || class_exists( 'Essential_Content_Pro_Service' ) );
    }
endif;

if ( ! function_exists( 'scapeshot_is_ect_services_active' ) ) :
    /**
    * Return true if service is active
    *
    * @since Scapeshot 1.0
    */
    function scapeshot_is_ect_services_active( $control ) {
        return ( class_exists( 'Essential_Content_Service' ) || class_exists( 'Essential_Content_Pro_Service' ) );
    }
endif;
