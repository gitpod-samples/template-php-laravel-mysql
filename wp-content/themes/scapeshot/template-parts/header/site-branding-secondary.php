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
		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		
		<?php
		$scapeshot_description = get_bloginfo( 'description', 'display' );
		if ( $scapeshot_description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo $scapeshot_description; /* WPCS: xss ok. */ ?></p>
		<?php
		endif; ?>
	</div><!-- .site-branding-text-->
</div><!-- .site-branding -->
