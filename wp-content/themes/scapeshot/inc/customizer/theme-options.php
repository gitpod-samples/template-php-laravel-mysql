<?php
/**
 * Theme Options
 *
 * @package ScapeShot
 */

/**
 * Add theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function scapeshot_theme_options( $wp_customize ) {
	$wp_customize->add_panel( 'scapeshot_theme_options', array(
		'title'    => esc_html__( 'Theme Options', 'scapeshot' ),
		'priority' => 130,
	) );

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_latest_posts_title',
			'default'           => esc_html__( 'News', 'scapeshot' ),
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Latest Posts Title', 'scapeshot' ),
			'section'           => 'scapeshot_theme_options',
		)
	);

	// Layout Options
	$wp_customize->add_section( 'scapeshot_layout_options', array(
		'title' => esc_html__( 'Layout Options', 'scapeshot' ),
		'panel' => 'scapeshot_theme_options',
		)
	);

	/* Default Layout */
	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_default_layout',
			'default'           => 'right-sidebar',
			'sanitize_callback' => 'scapeshot_sanitize_select',
			'label'             => esc_html__( 'Default Layout', 'scapeshot' ),
			'section'           => 'scapeshot_layout_options',
			'type'              => 'radio',
			'choices'           => array(
				'right-sidebar'         => esc_html__( 'Right Sidebar ( Content, Primary Sidebar )', 'scapeshot' ),
				'no-sidebar-full-width' => esc_html__( 'No Sidebar: Full Width', 'scapeshot' ),
			),
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_archive_layout',
			'default'           => 'no-sidebar-full-width',
			'sanitize_callback' => 'scapeshot_sanitize_select',
			'label'             => esc_html__( 'Blog/Archive Layout', 'scapeshot' ),
			'section'           => 'scapeshot_layout_options',
			'type'              => 'radio',
			'choices'           => array(
				'right-sidebar'         => esc_html__( 'Right Sidebar ( Content, Primary Sidebar )', 'scapeshot' ),
				'no-sidebar-full-width' => esc_html__( 'No Sidebar: Full Width', 'scapeshot' ),
			),
		)
	);

	/* Single Page/Post Image */
	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_single_layout',
			'default'           => 'disabled',
			'sanitize_callback' => 'scapeshot_sanitize_select',
			'label'             => esc_html__( 'Single Page/Post Image', 'scapeshot' ),
			'section'           => 'scapeshot_layout_options',
			'type'              => 'radio',
			'choices'           => array(
				'disabled'              => esc_html__( 'Disabled', 'scapeshot' ),
				'post-thumbnail'        => esc_html__( 'Post Thumbnail', 'scapeshot' ),
			),
		)
	);

	// Excerpt Options.
	$wp_customize->add_section( 'scapeshot_excerpt_options', array(
		'panel'     => 'scapeshot_theme_options',
		'title'     => esc_html__( 'Excerpt Options', 'scapeshot' ),
	) );

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_excerpt_length',
			'default'           => '20',
			'sanitize_callback' => 'absint',
			'input_attrs' => array(
				'min'   => 10,
				'max'   => 200,
				'step'  => 5,
				'style' => 'width: 60px;',
			),
			'label'    => esc_html__( 'Excerpt Length (words)', 'scapeshot' ),
			'section'  => 'scapeshot_excerpt_options',
			'type'     => 'number',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_excerpt_more_text',
			'default'           => esc_html__( 'Continue reading', 'scapeshot' ),
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Read More Text', 'scapeshot' ),
			'section'           => 'scapeshot_excerpt_options',
			'type'              => 'text',
		)
	);

	// Excerpt Options.
	$wp_customize->add_section( 'scapeshot_search_options', array(
		'panel'     => 'scapeshot_theme_options',
		'title'     => esc_html__( 'Search Options', 'scapeshot' ),
	) );

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_search_text',
			'default'           => esc_html__( 'Start Typing . . .', 'scapeshot' ),
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Search Text', 'scapeshot' ),
			'section'           => 'scapeshot_search_options',
			'type'              => 'text',
		)
	);

	// Homepage / Frontpage Options.
	$wp_customize->add_section( 'scapeshot_homepage_options', array(
		'description' => esc_html__( 'Only posts that belong to the categories selected here will be displayed on the front page', 'scapeshot' ),
		'panel'       => 'scapeshot_theme_options',
		'title'       => esc_html__( 'Homepage / Frontpage Options', 'scapeshot' ),
	) );

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_recent_posts_section_title',
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Section Title', 'scapeshot' ),
			'default'           => esc_html__( 'Blog', 'scapeshot' ),
			'section'           => 'scapeshot_homepage_options',
			'type'              => 'text',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_static_page_heading',
			'sanitize_callback' => 'sanitize_text_field',
			'active_callback'	=> 'scapeshot_is_static_page_enabled',
			'default'           => esc_html__( 'Archives', 'scapeshot' ),
			'label'             => esc_html__( 'Posts Page Header Text', 'scapeshot' ),
			'section'           => 'scapeshot_homepage_options',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_front_page_category',
			'sanitize_callback' => 'scapeshot_sanitize_category_list',
			'custom_control'    => 'ScapeShot_Multi_Cat',
			'label'             => esc_html__( 'Categories', 'scapeshot' ),
			'section'           => 'scapeshot_homepage_options',
			'type'              => 'dropdown-categories',
		)
	);

	// Pagination Options.
	$pagination_type = get_theme_mod( 'scapeshot_pagination_type', 'default' );

	$nav_desc = '';

	/**
	* Check if navigation type is Jetpack Infinite Scroll and if it is enabled
	*/
	$nav_desc = sprintf(
		wp_kses(
			__( 'For infinite scrolling, use %1$sCatch Infinite Scroll Plugin%2$s with Infinite Scroll module Enabled.', 'scapeshot' ),
			array(
				'a' => array(
					'href' => array(),
					'target' => array(),
				),
				'br'=> array()
			)
		),
		'<a target="_blank" href="https://wordpress.org/plugins/catch-infinite-scroll/">',
		'</a>'
	);

	$wp_customize->add_section( 'scapeshot_pagination_options', array(
		'description'     => $nav_desc,
		'panel'           => 'scapeshot_theme_options',
		'title'           => esc_html__( 'Pagination Options', 'scapeshot' ),
		'active_callback' => 'scapeshot_scroll_plugins_inactive'
	) );

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_pagination_type',
			'default'           => 'default',
			'sanitize_callback' => 'scapeshot_sanitize_select',
			'choices'           => scapeshot_get_pagination_types(),
			'label'             => esc_html__( 'Pagination type', 'scapeshot' ),
			'section'           => 'scapeshot_pagination_options',
			'type'              => 'select',
		)
	);

	/* Scrollup Options */
	$wp_customize->add_section( 'scapeshot_scrollup', array(
		'panel'    => 'scapeshot_theme_options',
		'title'    => esc_html__( 'Scrollup Options', 'scapeshot' ),
	) );

	$action = 'install-plugin';
	$slug   = 'to-top';

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

	// Add note to Scroll up Section
    scapeshot_register_option( $wp_customize, array(
            'name'              => 'scapeshot_to_top_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Scapeshot_Note_Control',
            'active_callback'   => 'scapeshot_is_to_top_inactive',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
            'label'             => sprintf( esc_html__( 'For Scroll Up, install %1$sTo Top%2$s Plugin', 'scapeshot' ),
                '<a target="_blank" href="' . esc_url( $install_url ) . '">',
                '</a>'

            ),
           'section'            => 'scapeshot_scrollup',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

    scapeshot_register_option( $wp_customize, array(
            'name'              => 'scapeshot_to_top_option_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Scapeshot_Note_Control',
            'active_callback'   => 'scapeshot_is_to_top_active',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
			'label'             => sprintf( esc_html__( 'For Scroll Up Options, go %1$shere%2$s', 'scapeshot'  ),
                 '<a href="javascript:wp.customize.panel( \'to_top_panel\' ).focus();">',
                 '</a>'
            ),
            'section'           => 'scapeshot_scrollup',
            'type'              => 'description',
        )
    );
}
add_action( 'customize_register', 'scapeshot_theme_options' );

/** Active Callback Functions */

if ( ! function_exists( 'scapeshot_scroll_plugins_inactive' ) ) :
	/**
	* Return true if infinite scroll functionality exists
	*
	* @since ScapeShot Pro 1.0
	*/
	function scapeshot_scroll_plugins_inactive( $control ) {
		if ( ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) || class_exists( 'Catch_Infinite_Scroll' ) ) {
			// Support infinite scroll plugins.
			return false;
		}

		return true;
	}
endif;

if ( ! function_exists( 'scapeshot_is_static_page_enabled' ) ) :
	/**
	* Return true if A Static Page is enabled
	*
	* @since ScapeShot Pro 1.1.2
	*/
	function scapeshot_is_static_page_enabled( $control ) {
		$enable = $control->manager->get_setting( 'show_on_front' )->value();
		if ( 'page' === $enable ) {
			return true;
		}
		return false;
	}
endif;


if ( ! function_exists( 'scapeshot_is_to_top_inactive' ) ) :
    /**
    * Return true if featured_content is active
    *
    * @since Simclick 0.1
    */
    function scapeshot_is_to_top_inactive( $control ) {
        return ! ( class_exists( 'To_Top' ) );
    }
endif;

if ( ! function_exists( 'scapeshot_is_to_top_active' ) ) :
    /**
    * Return true if featured_content is active
    *
    * @since Simclick 0.1
    */
    function scapeshot_is_to_top_active( $control ) {
        return ( class_exists( 'To_Top' ) );
    }
endif;
