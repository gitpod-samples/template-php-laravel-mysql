 /* global scapeshotOptions */
 /*
 * Custom scripts
 * Description: Custom scripts for ScapeShot Pro
 */

( function( $ ) {

	$( window ).on( 'load.scapeshot resize.scapeshot', function () {
		// Owl Carousel.
		if ( typeof $.fn.owlCarousel === "function" ) {
			// Featured Slider
			var sliderOptions = {
				rtl:scapeshotOptions.rtl ? true : false,
				autoHeight:true,
				margin: 0,
				items: 1,
				nav: false,
				smartSpeed: 4000,
				dots: true,
				autoplay: true,
				autoplayTimeout: 4000,
				loop: true,
				navText: [scapeshotOptions.iconNavPrev,scapeshotOptions.iconNavNext]
			};

			$(".main-slider").owlCarousel(sliderOptions);

			// Testimonial Section
			var testimonialLayout = 1;
			var testimonialOptions = {
				rtl:scapeshotOptions.rtl ? true : false,
				autoHeight: true,
				margin: 0,
				items: 1,
				nav: false,
				dots: true,
				autoplay: false,
				autoplayTimeout: 4000,
				loop: true,
				responsive:{
					0:{
						items:1
					},
				},
				navText: [scapeshotOptions.iconNavPrev,scapeshotOptions.iconNavNext]
			};

			$( '.testimonial-slider' ).owlCarousel(testimonialOptions);
		}

		// Match Height of Featured Content.
		if ( typeof $.fn.matchHeight === "function" ) {
			$('#services-section .hentry-inner, .pricing-section .hentry-inner ').matchHeight();
		}

		/*
		 * Masonry
		 */
		if ( typeof $.fn.masonry === "function" && typeof $.fn.imagesLoaded === "function" ) {
			//Masonry blocks
			$blocks = $('.grid');
			$blocks.imagesLoaded(function(){
				$blocks.masonry({
					itemSelector: '.grid-item',
					columnWidth: '.grid-item',
					// slow transitions
					transitionDuration: '1s'
				});

				// Fade blocks in after images are ready (prevents jumping and re-rendering)
				$('.grid-item').fadeIn();

				$blocks.find( '.grid-item' ).animate( {
					'opacity' : 1
				} );
			});

			$( function() {
				setTimeout( function() { $blocks.masonry(); }, 2000);
			});

			$(window).on( 'resize', function () {
				$blocks.masonry();
			});
		}

		if ( $(window).width() > 1024 ) {
			var productImgHeight = $('ul.products li.product img').innerHeight() - 54;
			$('.woocommerce .product-container a.button').css('top', productImgHeight);
		}

		// Mobile Nav, social and search toggle on focus out event
		if ( window.innerWidth < 1024 ) {
			jQuery('#primary-menu-wrapper').on('focusout', function () {
				var $elem = jQuery(this);

				// let the browser set focus on the newly clicked elem before check
				setTimeout(function () {
					if ( ! $elem.find(':focus').length ) {
						jQuery( '#primary-menu-wrapper .menu-toggle' ).trigger('click');
					}
				}, 0);
			});
		}
		
		jQuery('#fullscreen-site-header-menu').on('focusout', function () {
			var $elem = jQuery(this);

			if ( $( "body" ).hasClass( "menu-open" ) ) {
				// let the browser set focus on the newly clicked elem before check
				setTimeout(function () {
					if ( ! $elem.find(':focus').length ) {
						jQuery( '#fullscreen-menu-toggle' ).trigger('focus');
					}
				}, 0);
			} //else {
			// 	$elem.next().find(':focusable').trigger('focus');
			// }
		});

		/**
		 * Add custom focusable event
		 */
		function visible(element) {
			return $.expr.filters.visible(element) && !$(element).parents().addBack().filter(function() {
				return $.css(this, 'visibility') === 'hidden';
			}).length;
		}
		
		function focusable(element, isTabIndexNotNaN) {
			var map, mapName, img, nodeName = element.nodeName.toLowerCase();
			if ('area' === nodeName) {
				map = element.parentNode;
				mapName = map.name;
				if (!element.href || !mapName || map.nodeName.toLowerCase() !== 'map') {
					return false;
				}
				img = $('img[usemap=#' + mapName + ']')[0];
				return !!img && visible(img);
			}
			return (/input|select|textarea|button|object/.test(nodeName) ?
				!element.disabled :
				'a' === nodeName ?
					element.href || isTabIndexNotNaN :
					isTabIndexNotNaN) &&
				// the element and all of its ancestors must be visible
				visible(element);
		}

		$.extend($.expr[':'], {
			focusable: function(element) {
				return focusable(element, !isNaN($.attr(element, 'tabindex')));
			}
		});

		jQuery('#social-menu-wrapper .menu-inside-wrapper').on('focusout', function () {
			var $elem = jQuery(this);

			// let the browser set focus on the newly clicked elem before check
			setTimeout(function () {
				if ( ! $elem.find(':focus').length ) {
					jQuery( '#share-toggle' ).trigger('click');
				}
			}, 0);
		});

		// Add none class in desktop view for full-screen-menu right wrapper
		if ( window.innerWidth > 768 ) {
			if ( $( '#fullscreen-menu-right-wrap' ).length ) {
				var fullscreenRightChildren =  $( '#fullscreen-menu-right-wrap' ).children();

				if ( 1 === fullscreenRightChildren.length && 'full-screen-nav-search-wrapper' === fullscreenRightChildren[0].id ) {
					$( '#fullscreen-menu-right-wrap' ).hide();
				}
			}
		} else {
			if ( $( '#fullscreen-menu-right-wrap' ).length ) {
				$( '#fullscreen-menu-right-wrap' ).show();
			}
		}
	});

	$( function() {
		// Functionality for scroll to top button
		$(window).on( 'scroll', function () {
			if ( $( this ).scrollTop() > 100 ) {
				$( '#scrollup' ).fadeIn('slow');
				$( '#scrollup' ).show();
			} else {
				$('#scrollup').fadeOut('slow');
				$("#scrollup").hide();
			}
		});

		$( '#scrollup' ).on( 'click', function () {
			$( 'body, html' ).animate({
				scrollTop: 0
			}, 500 );
			return false;
		});
	});

	// Add header video class after the video is loaded.
	$( document ).on( 'wp-custom-header-video-loaded', function() {
		$( 'body' ).addClass( 'has-header-video' );
	});

	/*
	 * Test if inline SVGs are supported.
	 * @link https://github.com/Modernizr/Modernizr/
	 */
	function supportsInlineSVG() {
		var div = document.createElement( 'div' );
		div.innerHTML = '<svg/>';
		return 'http://www.w3.org/2000/svg' === ( 'undefined' !== typeof SVGRect && div.firstChild && div.firstChild.namespaceURI );
	}

	$( function() {
		$( document ).ready( function() {
			if ( true === supportsInlineSVG() ) {
				document.documentElement.className = document.documentElement.className.replace( /(\s*)no-svg(\s*)/, '$1svg$2' );
			}
		});
	});

	/* Menu */
	var body, masthead, menuToggle, siteNavigation, socialNavigation, siteHeaderMenu, resizeTimer;

	function initMainNavigation( container ) {

		// Add dropdown toggle that displays child menu items.
		var dropdownToggle = $( '<button />', { 'class': 'dropdown-toggle', 'aria-expanded': false })
			.append( scapeshotOptions.dropdownIcon )
			.append( $( '<span />', { 'class': 'screen-reader-text', text: scapeshotOptions.screenReaderText.expand }) );

		container.find( '.menu-item-has-children > a, .page_item_has_children > a' ).after( dropdownToggle );

		// Toggle buttons and submenu items with active children menu items.
		container.find( '.current-menu-ancestor > button' ).addClass( 'toggled-on' );
		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

		// Add menu items with submenus to aria-haspopup="true".
		container.find( '.menu-item-has-children, .page_item_has_children' ).attr( 'aria-haspopup', 'true' );

		container.find( '.dropdown-toggle' ).on( 'click', function( e ) {
			var _this            = $( this ),
				screenReaderSpan = _this.find( '.screen-reader-text' );

			e.preventDefault();
			_this.toggleClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).stop(true, true).slideToggle(700);
			_this.next( '.children, .sub-menu' ).toggleClass( 'sub-on' );

			// jscs:disable
			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			// jscs:enable
			screenReaderSpan.text( screenReaderSpan.text() === scapeshotOptions.screenReaderText.expand ? scapeshotOptions.screenReaderText.collapse : scapeshotOptions.screenReaderText.expand );
		} );
	}

	initMainNavigation( $( '.main-navigation' ) );

	masthead         = $( '#masthead' );
	menuToggle       = masthead.find( '.menu-toggle' );
	siteHeaderMenu   = masthead.find( '#site-header-menu' );
	siteNavigation   = masthead.find( '#site-navigation' );
	socialNavigation = masthead.find( '#social-navigation' );


	// Enable menuToggle.
	( function() {
		// Assume the initial scroll position is 0.
		var scroll = 0;

		// Return early if menuToggle is missing.
		if ( ! menuToggle.length ) {
			return;
		}

		menuToggle.on( 'click.scapeShot', function() {
			// jscs:disable
			$( this ).add( siteNavigation ).attr( 'aria-expanded', $( this ).add( siteNavigation ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			// jscs:enable
		} );


		// Add an initial values for the attribute.
		menuToggle.add( siteNavigation ).attr( 'aria-expanded', 'false' );
		menuToggle.add( socialNavigation ).attr( 'aria-expanded', 'false' );

		// Wait for a click on one of our menu toggles.
		menuToggle.on( 'click.scapeShot', function() {

			// Assign this (the button that was clicked) to a variable.
			var button = this;

			// Gets the actual menu (parent of the button that was clicked).
			var menu = $( this ).parents( '.menu-wrapper' );

			// Remove selected classes from other menus.
			$( '.menu-toggle' ).not( button ).removeClass( 'selected' );
			$( '.menu-wrapper' ).not( menu ).removeClass( 'is-open' );

			// Toggle the selected classes for this menu.
			$( button ).toggleClass( 'selected' );
			$( menu ).toggleClass( 'is-open' );

			// Is the menu in an open state?
			var is_open = $( menu ).hasClass( 'is-open' );

			// If the menu is open and there wasn't a menu already open when clicking.
			if ( is_open && ! jQuery( 'body' ).hasClass( 'menu-open' ) ) {

				// Get the scroll position if we don't have one.
				if ( 0 === scroll ) {
					scroll = $( 'body' ).scrollTop();
				}

				// Add a custom body class.
				$( 'body' ).addClass( 'menu-open' );

			// If we're closing the menu.
			} else if ( ! is_open ) {

				$( 'body' ).removeClass( 'menu-open' );
				$( 'body' ).scrollTop( scroll );
				scroll = 0;
			}
		} );

		// Close menus when somewhere else in the document is clicked.
		$( document ).on( 'click touchstart', function() {
			$( 'body' ).removeClass( 'menu-open' );
			$( '.menu-toggle' ).removeClass( 'selected' );
			$( '.menu-wrapper' ).removeClass( 'is-open' );
		} );

		// Stop propagation if clicking inside of our main menu.
		$( '.site-header-menu, .menu-toggle, .dropdown-toggle, .search-field, #site-navigation, #social-search-wrapper, #social-navigation .search-submit' ).on( 'click touchstart', function( e ) {
			e.stopPropagation();
		} );
	} )();

	// Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
	( function() {
		if ( ! siteNavigation.length || ! siteNavigation.children().length ) {
			return;
		}

		// Toggle `focus` class to allow submenu access on tablets.
		function toggleFocusClassTouchScreen() {
			if ( window.innerWidth >= 910 ) {
				$( document.body ).on( 'touchstart.scapeShot', function( e ) {
					if ( ! $( e.target ).closest( '.main-navigation li' ).length ) {
						$( '.main-navigation li' ).removeClass( 'focus' );
					}
				} );
				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' ).on( 'touchstart.scapeShot', function( e ) {
					var el = $( this ).parent( 'li' );

					if ( ! el.hasClass( 'focus' ) ) {
						e.preventDefault();
						el.toggleClass( 'focus' );
						el.siblings( '.focus' ).removeClass( 'focus' );
					}
				} );
			} else {
				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' ).unbind( 'touchstart.scapeShot' );
			}
		}

		if ( 'ontouchstart' in window ) {
			$( window ).on( 'resize.scapeShot', toggleFocusClassTouchScreen );
			toggleFocusClassTouchScreen();
		}

		siteNavigation.find( 'a' ).on( 'focus.scapeShot blur.scapeShot', function() {
			$( this ).parents( '.menu-item' ).toggleClass( 'focus' );
		} );
	} )();

	$(document).ready(function() {
		// Add docus-border spam on contact form and comment form.
		$( ".wpcf7 form p > label > span, .comment-form > p:not(.form-submit)" ).append( "<span class='focus-border'></span>" );

		/*Search and Social Container*/
		$('.toggle-top').on('click', function(e){
			$(this).toggleClass('toggled-on');
		});

		$( '.search-toggle' ).on( 'click', function(e) {
			//e.stopPropagation();
			$("body").toggleClass("search-active");
			$(this).toggleClass("open selected");
			$("#primary-search-wrapper").toggleClass("is-open");
			$(this).attr( "aria-expanded", $(this).attr("aria-expanded") === "false" ? "true" : "false" );

			/* Since "fade in" the modal doesn’t takes some time, it doesn't let you set focus on input. So use setTimeout to make soe delay */
			if( $("#primary-search-wrapper").hasClass("is-open") ) {
				setTimeout(function () {
					$("#header-search-wrapper input.search-field")[0].focus();
				}, 500);
			}
		});

		// Move focus back to toggle button on pressing tab on search button.
		$( '#primary-search-wrapper .search-submit' ).on('focusout', function() {
			$('#search-toggle').focus();
		});

		$( ".search-field" ).on( 'focus', function() {
			$(this).parents('.search-form').find( '.search-submit' ).addClass( 'search-focused' );
		}).on( 'blur', function() {
			$(this).parents('.search-form').find( '.search-submit' ).removeClass( 'search-focused' );
		});

		$('#share-toggle').on('click', function(e){
			e.stopPropagation();
			$('#header-search-container').removeClass('toggled-on');
			$('#header-menu-social').toggleClass('toggled-on');
		});

		$('.fullscreen-menu-toggle').on('click', function(e){
			e.stopPropagation();
			$("body").toggleClass('menu-open');
			$(this).toggleClass("open selected");
			$(this).attr( "aria-expanded", $(this).attr("aria-expanded") === "false" ? "true" : "false" );
			$('.menu-label').text(function(i, v){
			   return v === 'Menu' ? 'Close' : 'Menu'
			});
		});

	});

	//Light Box for videos section
	if ( typeof $.fn.flashy === "function" ) {
		$('.mixed').flashy({
			gallery: false,
		});
	}

	$('body').on('click touch','.scroll-down', function(e){
		var Sclass = $(this).parents('.section, .custom-header').next().attr('class');
		var Sclass_array = Sclass.split(" ");
		var scrollto = $('.' + Sclass_array[0] ).offset().top;

		$('html, body').animate({
			scrollTop: scrollto
		}, 1000);

	});

	$(window).on( 'scroll',function(){
		if ( $(this).scrollTop() > 0 ) {
			$('#sticky-playlist-section').addClass('solid-bg-active');
		} else {
			$('#sticky-playlist-section').removeClass('solid-bg-active');
		}
	});

	if ( $( "#site-generator" ).children().size() > 1 ) {
		$( "#site-generator" ).removeClass( 'one' );
		$( "#site-generator" ).addClass( 'two' );
	}

	/* Add class on fullscreen menu when scrolled for mobile */
	var stickyNav = function(){
		var scrollTop = $(window).scrollTop();

		if (scrollTop > 1) {
			$('body').addClass('scrolled');
		} else {
			$('body').removeClass('scrolled');
		}
	}

	/*Onload*/
	stickyNav();

	/*On Scroll*/
	$(window).on( 'scroll',function() {
		stickyNav();
	});

} )( jQuery );
