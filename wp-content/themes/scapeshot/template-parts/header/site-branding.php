<?php
/**
 * Template part for site-branding
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ScapeShot
 */

?>

<div class="site-branding">
	<?php has_custom_logo() ? the_custom_logo() : ''; ?>

	<div class="site-identity">
		<?php if ( is_front_page() && is_home() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php
		endif;

		$scapeshot_description = get_bloginfo( 'description', 'display' );
		if ( $scapeshot_description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo $scapeshot_description; /* WPCS: xss ok. */ ?></p>
		<?php
		endif; ?>
	</div><!-- .site-branding-text-->
</div><!-- .site-branding -->
