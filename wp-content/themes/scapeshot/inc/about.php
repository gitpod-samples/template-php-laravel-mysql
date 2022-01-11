<?php
/**
 * Scapeshot Theme page
 *
 * @package ScapeShot
 */

function scapeshot_about_admin_style( $hook ) {
	if ( 'appearance_page_scapeshot-about' === $hook ) {
		wp_enqueue_style( 'scapeshot-about-admin', get_theme_file_uri( 'assets/css/about-admin.css' ), null, '1.0' );
	}
}
add_action( 'admin_enqueue_scripts', 'scapeshot_about_admin_style' );

/**
 * Add theme page
 */
function scapeshot_menu() {
	add_theme_page( esc_html__( 'About Theme', 'scapeshot' ), esc_html__( 'About Theme', 'scapeshot' ), 'edit_theme_options', 'scapeshot-about', 'scapeshot_about_display' );
}
add_action( 'admin_menu', 'scapeshot_menu' );

/**
 * Display About page
 */
function scapeshot_about_display() {
	$theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$description = explode( '. ', $theme->get( 'Description' ) );

					array_pop( $description );

					$description = implode( '. ', $description );

					echo esc_html( $description . '.' );
				?></p>
				<p class="actions">
					<a href="<?php echo esc_url( 'https://catchthemes.com/themes/scapeshot' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'scapeshot' ); ?></a>

					<a href="<?php echo esc_url( 'https://catchthemes.com/demo/scapeshot' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'scapeshot' ); ?></a>

					<a href="<?php echo esc_url( 'https://catchthemes.com/themes/scapeshot/#theme-instructions' ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'scapeshot' ); ?></a>

					<a href="<?php echo esc_url( 'https://wordpress.org/support/theme/scapeshot/reviews/#new-post' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Rate this theme', 'scapeshot' ); ?></a>

					<a href="<?php echo esc_url( 'https://catchthemes.com/themes/scapeshot/#compare' ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Compare free Vs Pro',  'scapeshot' ); ?></a>

					<a href="<?php echo esc_url( 'https://catchthemes.com/themes/scapeshot-pro' ); ?>" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'scapeshot' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'scapeshot' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'scapeshot-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'scapeshot-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'scapeshot' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'scapeshot-about', 'tab' => 'import_demo' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'import_demo' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Import Demo', 'scapeshot' ); ?></a>
		</nav>

		<?php
			scapeshot_main_screen();

			scapeshot_import_demo();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'scapeshot' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'scapeshot' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'scapeshot' ) : esc_html_e( 'Go to Dashboard', 'scapeshot' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function scapeshot_main_screen() {
	if ( isset( $_GET['page'] ) && 'scapeshot-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'scapeshot' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'scapeshot' ) ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'scapeshot' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'scapeshot' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'scapeshot' ) ?></p>
				<p><a href="<?php echo esc_url( 'https://catchthemes.com/support-forum' ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'scapeshot' ); ?></a></p>
			</div>
		</div>
	<?php
	}
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function scapeshot_import_demo() {
	if ( isset( $_GET['tab'] ) && 'import_demo' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap demo-import-wrap">
			<div class="feature-section one-col">
			<?php if ( class_exists( 'CatchThemesDemoImportPlugin' ) ) { ?>
				<div class="col card">
					<h2 class="title"><?php esc_html_e( 'Import Demo', 'scapeshot' ); ?></h2>
					<p><?php esc_html_e( 'You can easily import the demo content using the Catch Themes Demo Import Plugin.', 'scapeshot' ) ?></p>
					<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=catch-themes-demo-import' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Import Demo', 'scapeshot' ); ?></a></p>
				</div>
				<?php } 
				else {
					$action = 'install-plugin';
					$slug   = 'catch-themes-demo-import';
					$install_url = wp_nonce_url(
						    add_query_arg(
						        array(
						            'action' => $action,
						            'plugin' => $slug
						        ),
						        admin_url( 'update.php' )
						    ),
						    $action . '_' . $slug
						); ?>
					<div class="col card">
					<h2 class="title"><?php esc_html_e( 'Install Catch Themes Demo Import Plugin', 'scapeshot' ); ?></h2>
					<p><?php esc_html_e( 'You can easily import the demo content using the Catch Themes Demo Import Plugin.', 'scapeshot' ) ?></p>
					<p><a href="<?php echo esc_url( $install_url ); ?>" class="button button-primary"><?php esc_html_e( 'Install Plugin', 'scapeshot' ); ?></a></p>
				</div>
				<?php } ?>
			</div>
		</div>
	<?php
	}
}
