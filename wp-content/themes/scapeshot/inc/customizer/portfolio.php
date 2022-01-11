<?php
/**
 * Add Portfolio Settings in Customizer
 *
 * @package ScapeShot
 */

/**
 * Add portfolio options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function scapeshot_portfolio_options( $wp_customize ) {
	// Add note to Jetpack Portfolio Section
	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_jetpack_portfolio_cpt_note',
			'sanitize_callback' => 'sanitize_text_field',
			'custom_control'    => 'ScapeShot_Note_Control',
			'label'             => sprintf( esc_html__( 'For Portfolio Options for ScapeShot Theme, go %1$shere%2$s', 'scapeshot' ),
				 '<a href="javascript:wp.customize.section( \'scapeshot_portfolio\' ).focus();">',
				 '</a>'
			),
			'section'           => 'jetpack_portfolio',
			'type'              => 'description',
			'priority'          => 1,
		)
	);

	$wp_customize->add_section( 'scapeshot_portfolio', array(
			'panel'    => 'scapeshot_theme_options',
			'title'    => esc_html__( 'Portfolio', 'scapeshot' ),
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
            'name'              => 'scapeshot_portfolio_jetpack_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Scapeshot_Note_Control',
          	'active_callback'   => 'scapeshot_is_ect_portfolio_inactive',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
            'label'             => sprintf( esc_html__( 'For Portfolio, install %1$sEssential Content Types%2$s Plugin with Portfolio Type Enabled', 'scapeshot' ),
                '<a target="_blank" href="' . esc_url( $install_url ) . '">',
                '</a>'

            ),
           'section'            => 'scapeshot_portfolio',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_portfolio_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'scapeshot_sanitize_select',
			'active_callback'   => 'scapeshot_is_ect_portfolio_active',
			'choices'           => scapeshot_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'scapeshot' ),
			'section'           => 'scapeshot_portfolio',
			'type'              => 'select',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_portfolio_cpt_note',
			'sanitize_callback' => 'sanitize_text_field',
			'custom_control'    => 'Scapeshot_Note_Control',
			'active_callback'   => 'scapeshot_is_portfolio_active',
			'label'             => sprintf( esc_html__( 'For CPT heading and sub-heading, go %1$shere%2$s', 'scapeshot' ),
				 '<a href="javascript:wp.customize.control( \'jetpack_portfolio_title\' ).focus();">',
				 '</a>'
			),
			'section'           => 'scapeshot_portfolio',
			'type'              => 'description',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_portfolio_number',
			'default'           => 6,
			'sanitize_callback' => 'scapeshot_sanitize_number_range',
			'active_callback'   => 'scapeshot_is_portfolio_active',
			'label'             => esc_html__( 'Number of items to show', 'scapeshot' ),
			'section'           => 'scapeshot_portfolio',
			'type'              => 'number',
			'input_attrs'       => array(
				'style'             => 'width: 100px;',
				'min'               => 0,
			),
		)
	);

	$number = get_theme_mod( 'scapeshot_portfolio_number', 6 );

	for ( $i = 1; $i <= $number ; $i++ ) {
		//for CPT
		scapeshot_register_option( $wp_customize, array(
				'name'              => 'scapeshot_portfolio_cpt_' . $i,
				'sanitize_callback' => 'scapeshot_sanitize_post',
				'active_callback'   => 'scapeshot_is_portfolio_active',
				'label'             => esc_html__( 'Portfolio', 'scapeshot' ) . ' ' . $i ,
				'section'           => 'scapeshot_portfolio',
				'type'              => 'select',
				'choices'           => scapeshot_generate_post_array( 'jetpack-portfolio' ),
			)
		);
	} // End for().
}
add_action( 'customize_register', 'scapeshot_portfolio_options' );

/**
 * Active Callback Functions
 */
if ( ! function_exists( 'scapeshot_is_portfolio_active' ) ) :
	/**
	* Return true if portfolio is active
	*
	* @since ScapeShot 1.0
	*/
	function scapeshot_is_portfolio_active( $control ) {
		$enable = $control->manager->get_setting( 'scapeshot_portfolio_option' )->value();

		//return true only if previwed page on customizer matches the type of content option selected
		return scapeshot_check_section( $enable );
	}
endif;

if ( ! function_exists( 'scapeshot_is_ect_portfolio_inactive' ) ) :
    /**
    *
    * @since Scapeshot 1.0
    */
    function scapeshot_is_ect_portfolio_inactive( $control ) {
        return ! ( class_exists( 'Essential_Content_Jetpack_Portfolio' ) || class_exists( 'Essential_Content_Pro_Jetpack_Portfolio' ) );
    }
endif;

if ( ! function_exists( 'scapeshot_is_ect_portfolio_active' ) ) :
    /**
    *
    * @since Scapeshot 1.0
    */
    function scapeshot_is_ect_portfolio_active( $control ) {
        return ( class_exists( 'Essential_Content_Jetpack_Portfolio' ) || class_exists( 'Essential_Content_Pro_Jetpack_Portfolio' ) );
    }
endif;
