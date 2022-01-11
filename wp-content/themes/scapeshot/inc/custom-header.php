<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package ScapeShot
 */

if ( ! function_exists( 'scapeshot_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see scapeshot_custom_header_setup().
	 */
	function scapeshot_header_style() {
		$header_image = scapeshot_featured_overall_image();

	    if ( 'disable' !== $header_image ) :
	    	/**
	    	 * Image Position CSS
	    	 */
			?>
	        <style type="text/css" rel="header-image">
	            .custom-header .wrapper:before {
	                background-image: url( <?php echo esc_url( $header_image ); ?>);
					background-repeat: no-repeat;
					background-size: cover;
	            }
	        </style>
	    <?php
	    endif;

	    $header_textcolor = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_textcolor ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
		?>
			.site-title a,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
			// If the user has set a custom color for the text use that.
			else :
		?>
			.site-title a,
			.site-description,
			.absolute-header.menu-open.navigation-full-screen .site-title a,
			.absolute-header.menu-open.navigation-full-screen .site-description,
			.absolute-header.menu-open.navigation-full-screen .search-toggle {
				color: <?php echo esc_attr( $header_textcolor ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;

if ( ! function_exists( 'scapeshot_featured_image' ) ) :
	/**
	 * Template for Featured Header Image from theme options
	 *
	 * To override this in a child theme
	 * simply create your own scapeshot_featured_image(), and that function will be used instead.
	 *
	 * @since ScapeShot Pro 1.0
	 */
	function scapeshot_featured_image() {
		if ( is_header_video_active() && has_header_video() ) {
			return true;
		}
		$thumbnail = 'post-thumbnail';

		if ( is_post_type_archive( 'jetpack-testimonial' ) ) {
			$jetpack_options = get_theme_mod( 'jetpack_testimonials' );
			$option = 'jetpack_testimonial_featured_image';
			$featured_image = get_option( 'jetpack_testimonial_featured_image' );
			if ( isset( $jetpack_options['featured-image'] ) && '' !== $jetpack_options['featured-image'] ) {
				$image = wp_get_attachment_image_src( (int) $jetpack_options['featured-image'], $thumbnail );
				return $image['0'];
			} elseif ( ! isset( $jetpack_options['featured-image'] ) && isset( $featured_image ) && '' !== $featured_image ) {
				$image = wp_get_attachment_image_src( (int) $featured_image, $thumbnail );
				return $image['0'];
			} else {
				return false;
			}
		} elseif ( is_post_type_archive( 'jetpack-portfolio' ) || is_post_type_archive( 'featured-content' ) || is_post_type_archive( 'ect-service' ) || is_post_type_archive( 'ect-team' ) || is_post_type_archive( 'ect-event' ) ) {
			$option = '';

			if ( is_post_type_archive( 'jetpack-portfolio' ) ) {
				$option = 'jetpack_portfolio_featured_image';
			} elseif ( is_post_type_archive( 'featured-content' ) ) {
				$option = 'featured_content_featured_image';
			} elseif ( is_post_type_archive( 'ect-service' ) ) {
				$option = 'ect_service_featured_image';
			} elseif ( is_post_type_archive( 'ect-team' ) ) {
				$option = 'ect_team_featured_image';
			} elseif ( is_post_type_archive( 'ect-event' ) ) {
				$option = 'ect_event_featured_image';
			}

			$featured_image = get_option( $option );

			if ( '' !== $featured_image ) {
				$image = wp_get_attachment_image_src( (int) $featured_image, $thumbnail );
				return isset( $image[0] ) ? $image[0] : false;
			} else {
				return get_header_image();
			}
		} else {
			return get_header_image();
		}
	} // scapeshot_featured_image
endif;

if ( ! function_exists( 'scapeshot_featured_page_post_image' ) ) :
	/**
	 * Template for Featured Header Image from Post and Page
	 *
	 * To override this in a child theme
	 * simply create your own scapeshot_featured_imaage_pagepost(), and that function will be used instead.
	 *
	 * @since ScapeShot Pro 1.0
	 */
	function scapeshot_featured_page_post_image() {
		$thumbnail = 'scapeshot-single-post-page';

		if ( class_exists( 'WooCommerce' ) && is_shop() ) {
			if ( ! has_post_thumbnail( absint( get_option( 'woocommerce_shop_page_id' ) ) ) ) {
				return scapeshot_featured_image();
			}
		} elseif ( is_home() && $blog_id = get_option('page_for_posts') ) {
			if ( has_post_thumbnail( $blog_id  ) ) {
		    	return get_the_post_thumbnail_url( $blog_id, $thumbnail );
			} else {
				return  scapeshot_featured_image();
			}
		} elseif ( ! has_post_thumbnail() ) {
			return  scapeshot_featured_image();
		} elseif ( is_home() && is_front_page() ) {
			return  scapeshot_featured_image();
		}

		$shop_header = get_theme_mod( 'scapeshot_shop_page_header_image' );
		if ( class_exists( 'WooCommerce' ) && is_shop() ) {
			return get_the_post_thumbnail_url( absint( get_option( 'woocommerce_shop_page_id' ) ), $thumbnail );
		}elseif ( class_exists( 'WooCommerce' ) && is_product () ) {
			if (  $shop_header ){
			return get_the_post_thumbnail_url( get_the_id(), $thumbnail );
			}
		}else {
			return get_the_post_thumbnail_url( get_the_id(), $thumbnail );
		}
	} // scapeshot_featured_page_post_image
endif;

if ( ! function_exists( 'scapeshot_featured_overall_image' ) ) :
	/**
	 * Template for Featured Header Image from theme options
	 *
	 * To override this in a child theme
	 * simply create your own scapeshot_featured_pagepost_image(), and that function will be used instead.
	 *
	 * @since ScapeShot Pro 1.0
	 */
	function scapeshot_featured_overall_image() {
		global $post;
		$enable = get_theme_mod( 'scapeshot_header_media_option', 'entire-site' );

		// Check Enable/Disable header image in Page/Post Meta box
		if ( is_singular() ) {
			//Individual Page/Post Image Setting
			$individual_featured_image = get_post_meta( $post->ID, 'scapeshot-single-post-page', true );

			if ( 'disable' === $individual_featured_image || ( 'default' === $individual_featured_image && 'disable' === $enable ) ) {
				return 'disable' ;
			} elseif ( 'enable' == $individual_featured_image && 'disable' === $enable ) {
				return scapeshot_featured_page_post_image();
			}
		}

		// Check Homepage
		if ( 'homepage' === $enable ) {
			if ( is_front_page() ) {
				return scapeshot_featured_image();
			}
		} elseif ( 'entire-site' === $enable ) {
			// Check Entire Site
			return scapeshot_featured_image();
		}

		return 'disable';
	} // scapeshot_featured_overall_image
endif;

if ( ! function_exists( 'scapeshot_header_media_text' ) ):
	/**
	 * Display Header Media Text
	 *
	 * @since ScapeShot Pro 1.0
	 */
	function scapeshot_header_media_text() {

		if ( ! scapeshot_has_header_media_text() ) {
			// Bail early if header media text is disabled on front page
			return get_header_image();
		}

		$content_alignment 	= 'content-align-right';
		$text_alignment 	= 'text-align-left';

		$header_media_logo = get_theme_mod( 'scapeshot_header_media_logo' );

		$classes = array();
		if( is_front_page() ) {
			$classes[] = $content_alignment;
			$classes[] = $text_alignment;
		}

		?>
		<div class="custom-header-content sections header-media-section <?php echo esc_attr( implode( ' ', $classes ) ); ?>">
			<div class="custom-header-content-wrapper">
				<?php
				$header_media_subtitle = get_theme_mod( 'scapeshot_header_media_sub_title' );
				$enable_homepage_logo = get_theme_mod( 'scapeshot_header_media_logo_option', 'homepage' );

				if( is_front_page() ) : ?>
					<div class="section-subtitle"> <?php echo esc_html( $header_media_subtitle ); ?> </div>
				<?php endif;

				if ( scapeshot_check_section( $enable_homepage_logo ) && $header_media_logo ) {  ?>
					<div class="site-header-logo">
						<img src="<?php echo esc_url( $header_media_logo ); ?>" title="<?php echo esc_url( home_url( '/' ) ); ?>" />
					</div><!-- .site-header-logo -->
				<?php } ?>

				<?php
				$tag = 'h2';

				if ( is_singular() || is_404() ) {
					$tag = 'h1';
				}

				scapeshot_header_title( '<div class="entry-header"><' . $tag . ' class="entry-title">', '</' . $tag . '></div>' );
				?>

				<?php scapeshot_header_description( '<div class="site-header-text">', '</div>' ); ?>

				<?php if ( is_front_page() ) :
					$header_media_url_text = get_theme_mod( 'scapeshot_header_media_url_text' );
					
					if ( $header_media_url_text ) : 
						$header_media_url = get_theme_mod( 'scapeshot_header_media_url', '#' );
						?>
						<p>
						<span class="more-link">
							<a href="<?php echo esc_url( $header_media_url ); ?>" target="<?php echo esc_attr( get_theme_mod( 'scapeshot_header_url_target' ) ? '_blank' : '_self' ); ?>" class="readmore"><?php echo esc_html( $header_media_url_text ); ?></a>
						</span></p>
					<?php endif;
				endif; ?>
			</div><!-- .custom-header-content-wrapper -->
		</div><!-- .custom-header-content -->
		<?php
	} // scapeshot_header_media_text.
endif;

if ( ! function_exists( 'scapeshot_has_header_media_text' ) ):
	/**
	 * Return Header Media Text fro front page
	 *
	 * @since ScapeShot Pro 1.0
	 */
	function scapeshot_has_header_media_text() {
		$header_image = scapeshot_featured_overall_image();

		if ( is_front_page() ) {
			$header_media_logo     = get_theme_mod( 'scapeshot_header_media_logo' );
			$header_media_title    = get_theme_mod( 'scapeshot_header_media_title' );
			$header_media_text     = get_theme_mod( 'scapeshot_header_media_text' );
			$header_media_url      = get_theme_mod( 'scapeshot_header_media_url', '#' );
			$header_media_url_text = get_theme_mod( 'scapeshot_header_media_url_text' );

			if ( ! $header_media_logo && ! $header_media_title && ! $header_media_text && ! $header_media_url && ! $header_media_url_text ) {
				// Bail early if header media text is disabled
				return false;
			}
		} elseif ( 'disable' === $header_image ) {
			return false;
		}

		return true;
	} // scapeshot_has_header_media_text.
endif;

if ( ! function_exists( 'scapeshot_header_title' ) ) :
	/**
	 * Display header media text
	 */
	function scapeshot_header_title( $before = '', $after = '' ) {
		if ( is_front_page() ) {
			$header_media_title = get_theme_mod( 'scapeshot_header_media_title' );
			$header_media_url = get_theme_mod( 'scapeshot_header_media_url', '#' );
			if ( $header_media_title ) {
				echo $before . '<a href="' . esc_url( $header_media_url ) . '">'  . wp_kses_post( $header_media_title ) . '</a>' . $after;
			}
		} else if ( is_home() ) {
			$header_media_title = get_theme_mod( 'scapeshot_static_page_heading','Archives' );
			if ( $header_media_title ) {
				echo $before . wp_kses_post( $header_media_title ) . $after;
			}
		} elseif ( is_singular() ) {
			the_title( $before, $after );
		} elseif ( is_404() ) {
			echo $before . esc_html__( 'Nothing Found', 'scapeshot' ) . $after;
		} elseif ( is_search() ) {
			/* translators: %s: search query. */
			echo $before . sprintf( esc_html__( 'Search Results for: %s', 'scapeshot' ), '<span>' . get_search_query() . '</span>' ) . $after;
		} elseif( class_exists( 'WooCommerce' ) && is_woocommerce() ) {
			echo $before . esc_html( woocommerce_page_title( false ) ) . $after;
		}
		else {
			the_archive_title( $before, $after );
		}
	}
endif;

if ( ! function_exists( 'scapeshot_header_description' ) ) :
	/**
	 * Display header media description
	 */
	function scapeshot_header_description( $before = '', $after = '' ) {
		if ( is_front_page() ) {
			echo $before . '<p>' . wp_kses_post( get_theme_mod( 'scapeshot_header_media_text' ) ) . '</p>' . $after;
		} elseif ( is_singular() && ! is_page() ) {
			echo $before . '<div class="entry-header"><div class="entry-meta">';
				scapeshot_posted_on();
				scapeshot_by_line();
			echo '</div><!-- .entry-meta --></div>' . $after;
		} elseif ( is_404() ) {
			echo $before . '<p>' . esc_html__( 'Oops! That page can&rsquo;t be found', 'scapeshot' ) . '</p>' . $after;
		} else {
			the_archive_description( $before, $after );
		}
	}
endif;

/**
 * Customize video play/pause button in the custom header.
 */
function scapeshot_video_controls( $settings ) {
	$settings['l10n']['play'] = '<span class="screen-reader-text">' . esc_html__( 'Play background video', 'scapeshot' ) . '</span>' . scapeshot_get_svg( array( 'icon' => 'play' ) );
	$settings['l10n']['pause'] = '<span class="screen-reader-text">' . esc_html__( 'Pause background video', 'scapeshot' ) . '</span>' . scapeshot_get_svg( array( 'icon' => 'pause' ) );
	return $settings;
}
add_filter( 'header_video_settings', 'scapeshot_video_controls' );
