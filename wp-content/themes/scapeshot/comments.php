<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ScapeShot
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comment_count = get_comments_number();
			if ( 1 === $comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html_e( 'One thought on &ldquo;%1$s&rdquo;', 'scapeshot' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'scapeshot' ) ),
					number_format_i18n( $comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'callback'	 => 'scapeshot_comment'
				) );
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'scapeshot' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().

	$req       = get_option( 'require_name_email' );
	$html_req  = ( $req ? " required='required'" : '' );
	$commenter = wp_get_current_commenter();

	$fields   =  array(
		'author'   => '<p class="comment-form-author">' .
			'<input id ="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $html_req . ' placeholder="' . esc_html__( 'Name', 'scapeshot' ) . ( $req ? ' *' : '' ) . '" /></p>',
		'email'    => '<p class="comment-form-email">' .
			'<input id ="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $html_req . ' placeholder="' . esc_html__( 'Email', 'scapeshot' ) . ( $req ? ' *' : '' ) . '" /></p>',
	);

	$website_fields = get_theme_mod( 'catch_shop_website_field', 1  );

	if ( $website_fields ) {
		$fields['url']   = sprintf(
			'<p class="comment-form-url">%s</p>',
			sprintf(
				'<input id="url" name="url" type="url" value="%s" size="30" maxlength="200" placeholder="' . esc_html__( 'Website', 'scapeshot' ) . '"/>',
				esc_attr( $commenter['comment_author_url'] )
			)
		);
	}

	$args = array(
		'comment_field' => '<p class="comment-form-comment"> <textarea placeholder="' . esc_html_x( 'Comment', 'noun', 'scapeshot' ) . ( $req ? ' *' : '' ) . '" id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></p>',
		'fields'        => $fields
	);

	comment_form( $args );
	?>

</div><!-- #comments -->
