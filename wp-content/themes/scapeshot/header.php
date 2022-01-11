<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ScapeShot
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'scapeshot' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-header-main">
			<div class="header-blank"></div>
				<div class="wrapper">
					<?php
					get_template_part( 'template-parts/header/site', 'branding-secondary' );

					get_template_part( 'template-parts/navigation/nav-full-screen-menu' );

					get_template_part( 'template-parts/header/site', 'branding' );

					get_template_part( 'template-parts/navigation/primary-search' );
					?>
			</div><!-- .wrapper -->
		</div><!-- .site-header-main -->
	</header><!-- #masthead -->

	<?php get_template_part( 'template-parts/navigation/navigation', 'social-floating' ); ?>

	<?php scapeshot_sections(); ?>
	
	<div id="content" class="site-content">
		<div class="wrapper">
	
