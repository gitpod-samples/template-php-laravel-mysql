<?php
/**
 * Primary Menu Template
 *
 * @package ScapeShot
 */

if ( has_nav_menu( 'social-menu' ) ) :  ?>
	<div id="floating-social" class="floating-social">
		<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Menu', 'scapeshot' ); ?>">
			<?php
				wp_nav_menu( array(
					'theme_location'  => 'social-menu',
					'menu_class'      => 'social-links-menu',
					'container'       => 'div',
					'container_class' => 'menu-social-container',
					'depth'           => 1,
					'link_before'     => '<span class="screen-reader-text">',
					'link_after'      => '</span>' . scapeshot_get_svg( array( 'icon' => 'chain' ) ),
				) );
			?>
		</nav><!-- .social-navigation -->
	</div><!--  .floating-social  -->
<?php endif; ?>
