<?php
/**
 * The template used for displaying hero content
 *
 * @package ScapeShot
 */

if ( $scapeshot_id = get_theme_mod( 'scapeshot_hero_content' ) ) {
	$scapeshot_args['page_id'] = absint( $scapeshot_id );
}

// If $scapeshot_args is empty return false
if ( empty( $scapeshot_args ) ) {
	return;
}

// Create a new WP_Query using the argument previously created
$scapeshot_hero_query = new WP_Query( $scapeshot_args );
if ( $scapeshot_hero_query->have_posts() ) :
	while ( $scapeshot_hero_query->have_posts() ) :
		$scapeshot_hero_query->the_post();
		?>
		<div id="hero-section" class="hero-section section content-align-right text-align-left">
			<div class="wrapper">
				<div class="section-content-wrapper hero-content-wrapper">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="hentry-inner">
							<?php $scapeshot_post_thumbnail = scapeshot_post_thumbnail( 'scapeshot-portfolio', 'html-with-bg', false ); 

						if ( $scapeshot_post_thumbnail ) :
							echo $scapeshot_post_thumbnail;
							?>
							<div class="entry-container">
						<?php else : ?>
							<div class="entry-container full-width">
						<?php endif; ?>
							<?php
							$scapeshot_tagline     = get_theme_mod( 'scapeshot_hero_content_section_tagline' );
							$scapeshot_description = get_theme_mod( 'scapeshot_hero_content_section_description' ); 
							?>

							<div class="section-heading-wrapper">
								<?php if( $scapeshot_tagline ) : ?>
									<div class="section-subtitle"><?php echo esc_html( $scapeshot_tagline ); ?> </div>
								<?php endif; ?>
								
								<div class="section-title-wrapper">
									<h2 class="section-title">
										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
									</h2>
								</div><!-- .page-title-wrapper -->

								<?php if ( $scapeshot_description ) : ?>
									<div class="section-description">
										<?php echo wpautop( wp_kses_post( $scapeshot_description ) ); ?>
									</div><!-- .section-description-wrapper -->
								<?php endif; ?>
							</div><!-- .section-heading-wrapper -->

							<div class="entry-content">
							<?php
							the_excerpt();
							?>
							</div><!-- .entry-content -->

							<?php if ( get_edit_post_link() ) : ?>
								<footer class="entry-footer">
									<div class="entry-meta">
										<?php
											edit_post_link(
												sprintf(
													/* translators: %s: Name of current post */
													esc_html__( 'Edit %s', 'scapeshot' ),
													the_title( '<span class="screen-reader-text">"', '"</span>', false )
												),
												'<span class="edit-link">',
												'</span>'
											);
										?>
									</div>	<!-- .entry-meta -->
								</footer><!-- .entry-footer -->
							<?php endif; ?>
						</div><!-- .hentry-inner -->
					</article>
				</div><!-- .section-content-wrapper -->
			</div><!-- .wrapper -->
		</div><!-- .section -->
	<?php
	endwhile;

	wp_reset_postdata();
endif;
