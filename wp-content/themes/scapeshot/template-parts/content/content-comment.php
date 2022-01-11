<?php
/**
 * Template part for displaying comments
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ScapeShot
 */


// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || '0' != get_comments_number() ) {
	comments_template();
}
