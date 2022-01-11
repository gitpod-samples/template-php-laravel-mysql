<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ScapeShot
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="archive-posts-wrapper">
			<?php
				$header_image = scapeshot_featured_overall_image();

				if ( 'disable' === $header_image ) : ?>

				<header class="page-header">

					<div class="section-subtitle">
						<?php the_archive_description(); ?>
					</div>

					<?php the_archive_title( '<h2 class="page-title section-title">', '</h2>' ); ?>
					
				</header><!-- .entry-header -->

			<?php endif; ?>
				<?php
				if ( have_posts() ) : ?>

				<div class="section-content-wrapper">
					<div id="infinite-post-wrap" class="archive-post-wrap grid">
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content/content', get_post_format() );

						endwhile;

						scapeshot_content_nav();
						?>
					</div><!-- .archive-post-wrap -->
				</div><!-- .section-content-wrap -->

				<?php
					else :

						get_template_part( 'template-parts/content/content', 'none' );

					endif; ?>
			</div><!-- .archive-posts-wrapper -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
