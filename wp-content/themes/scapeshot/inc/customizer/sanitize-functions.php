<?php
/**
 * ScapeShot Theme Options Sanitization Functions
 *
 * @package ScapeShot
 */

/**
 * Select sanitization callback example.
 *
 * - Sanitization: select
 * - Control: select, radio
 *
 * Sanitization callback for 'select' and 'radio' type controls. This callback sanitizes `$input`
 * as a slug, and then validates `$input` against the choices defined for the control.
 *
 * @see sanitize_key()               https://developer.wordpress.org/reference/functions/sanitize_key/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param string               $input   Slug to sanitize.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
 */
function scapeshot_sanitize_select( $input, $setting ) {
    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;

    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Checkbox sanitization callback example.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function scapeshot_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Sanitizes page/post in slider
 * @param  $input raw page/post id
 * @return sanitized page/post id
 */
function scapeshot_sanitize_post( $input ) {
    // Ensure $input is an absolute integer.
    $page_id = absint( $input );
    // If $page_id is an ID of a published page, return it; otherwise, return false
    return ( 'publish' == get_post_status( $page_id ) ? $page_id : false );
}

/**
 * Sanitizes category list in slider
 * @param  $input entered value
 * @return sanitized output
 *
 * @since ScapeShot Pro 1.0
 */
function scapeshot_sanitize_category_list( $input ) {
    if ( is_array( $input ) && '' != $input ) {
        if ( in_array( 0, $input ) ) {
            return '0';
        }
        $args = array(
                        'type'          => 'post',
                        'child_of'      => 0,
                        'parent'        => '',
                        'orderby'       => 'name',
                        'order'         => 'ASC',
                        'hide_empty'    => 0,
                        'hierarchical'  => 0,
                        'taxonomy'      => 'category',
                    );

        $categories = ( get_categories( $args ) );

        $category_list  =   array();

        foreach ( $categories as $category )
            $category_list  =   array_merge( $category_list, array( $category->term_id ) );

        if ( count( array_intersect( $input, $category_list ) ) == count( $input ) ) {
            return $input;
        }
        else {
            return '';
        }
    }
    else {
        return '';
    }
}


/**
 * Number Range sanitization callback example.
 *
 * - Sanitization: number_range
 * - Control: number, tel
 *
 * Sanitization callback for 'number' or 'tel' type text inputs. This callback sanitizes
 * `$number` as an absolute integer within a defined min-max range.
 *
 * @see absint() https://developer.wordpress.org/reference/functions/absint/
 *
 * @param int                  $number  Number to check within the numeric range defined by the setting.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return int|string The number, if it is zero or greater and falls within the defined range; otherwise,
 *                    the setting default.
 */
function scapeshot_sanitize_number_range( $number, $setting ) {

    // Ensure input is an absolute integer.
    $number = absint( $number );

    // Get the input attributes associated with the setting.
    $atts = $setting->manager->get_control( $setting->id )->input_attrs;


    // Get minimum number in the range.
    $min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

    // Get maximum number in the range.
    $max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

    // Get step.
    $step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

    // If the number is within the valid range, return it; otherwise, return the default
    return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}