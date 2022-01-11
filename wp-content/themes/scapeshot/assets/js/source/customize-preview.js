/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	api = wp.customize;

	// Site title and description.
	api( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	api( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color without header media background.
	api( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( 'body:not(.absolute-header) .site-title a, body:not(.absolute-header) .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative',
					'color' : to
				} );
			}
		} );
	} );

	 // Header text color with header media background.
    wp.customize( 'header_textcolor_with_header_media', function( value ) {
        value.bind( function( to ) {
            $( '.absolute-header .site-title a, .absolute-header .site-title a:hover, .absolute-header .site-title a:focus, .absolute-header .site-description, .absolute-header .main-navigation a, .absolute-header .menu-toggle, .absolute-header .dropdown-toggle, .absolute-header .site-header-cart .cart-contents, .absolute-header .site-header-menu .social-navigation a' ).css( {
                'color': to
            } );
        } );
    } );
} )( jQuery );
