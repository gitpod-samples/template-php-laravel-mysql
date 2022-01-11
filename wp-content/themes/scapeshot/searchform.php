<?php
/**
 * Template for displaying search forms in ScapeShot
 *
* @package ScapeShot
 */

$unique_id   = esc_attr( uniqid( 'search-form-' ) );
$search_text = get_theme_mod( 'scapeshot_search_text', esc_html__( 'Start Typing . . .', 'scapeshot' ) );
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'scapeshot' ); ?></span>
		<input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr( $search_text ); ?>" value="<?php the_search_query(); ?>" name="s" />
		<span class="focus-border">
            	<i></i>
        </span>
	</label>

	<button type="submit" class="search-submit"><?php echo scapeshot_get_svg( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'scapeshot' ); ?></span></button>
</form>
