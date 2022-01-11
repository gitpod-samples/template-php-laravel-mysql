<?php
/**
 * Primary Menu Template
 *
 * @package ScapeShot
 */
?>

<div id="fullscreen-site-header-menu" class="fullscreen-site-header-menu">
	<div class="fullscreen-menu-wrapper">
		<div class="fullscreen-menu-toggle-wrapper">
			<button id="fullscreen-menu-toggle"  class="fullscreen-menu-toggle" aria-controls="fullscreen-menu" aria-expanded="false"><?php echo scapeshot_get_svg( array( 'icon' => 'menu' ) ); echo scapeshot_get_svg( array( 'icon' => 'cancel' ) ); ?><span class="menu-label"><?php echo esc_html_e( 'Menu', 'scapeshot' ); ?></span></button>
		</div><!-- .menu-toggle-wrapper -->

		<div class="fullscreen-menu-inside-wrapper">
			<?php get_template_part( 'template-parts/header/site', 'branding-secondary' ); ?>

			<div class="fullscreen-menu-inside-container">
				<?php if ( get_theme_mod( 'scapeshot_display_primary_menu', 1 ) ) : ?>
				<div id="fullscreen-menu-left-wrap" class="menu-wrapper">
					<?php if ( has_nav_menu( 'primary-menu' ) ) : ?>
						<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'scapeshot' ); ?>">
							<?php
								wp_nav_menu( array(
										'container'      => '',
										'theme_location' => 'primary-menu',
										'menu_id'        => 'primary-menu',
										'menu_class'     => 'menu nav-menu',
									)
								);
							?>
						</nav><!-- .main-navigation -->
					<?php else : ?>
						<nav id="site-navigation" class="main-navigation default-page-menu" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'scapeshot' ); ?>">
							<?php wp_page_menu(
								array(
									'menu_class' => 'primary-menu-container',
									'before'     => '<ul id="menu-primary-items" class="menu nav-menu">',
									'after'      => '</ul>',
								)
							); ?>
						</nav><!-- .main-navigation -->
					<?php endif; ?>
				</div><!-- #fullscreen-menu-left-wrap -->
				<?php endif; ?>
				<div id="fullscreen-menu-right-wrap">
					<div id="full-screen-nav-search-wrapper" class="full-screen-nav-search-wrapper">
						<?php get_search_form(); ?>
					</div><!-- .full-screen-nav-search-wrapper -->
				</div><!-- #fullscreen-menu-right-wrap -->
			</div><!-- .fullscreen-menu-inside-container -->
		</div><!-- .fullscreen-menu-inside-wrapper -->
	</div><!-- .fullscreen-menu-wrapper -->
</div><!-- .fullscreen-site-header-menu -->
