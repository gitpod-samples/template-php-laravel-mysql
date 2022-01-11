<?php
/**
 * Primary Menu Template
 *
 * @package ScapeShot
 */
?>
<div id="primary-search-wrapper" class="menu-wrapper">
	<div class="menu-toggle-wrapper">
		<button id="search-toggle" class="search-toggle"><?php echo scapeshot_get_svg( array( 'icon' => 'search' ) ); echo scapeshot_get_svg( array( 'icon' => 'cancel' ) ); ?><span class="screen-reader-text"><?php esc_html_e( 'Search', 'scapeshot' ); ?></span></button>
	</div><!-- .menu-toggle-wrapper -->

	<div id="header-search-wrapper" class="menu-inside-wrapper">
		<div class="search-container">
			<?php get_search_form(); ?>
		</div>
	</div><!-- .menu-inside-wrapper -->
</div><!-- #social-search-wrapper.menu-wrapper -->