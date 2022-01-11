<?php
/*
 * Template Name: Right Sidebar ( Content, Primary Sidebar )
 *
 * Template Post Type: post, page
 *
 * The template for displaying Page/Post with Sidebar on right
 *
 * @package ScapeShot
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php
            while ( have_posts() ) : the_post();

                $template = 'single';

                if ( is_page() ) {
                    $template = 'page';
                }

                get_template_part( 'template-parts/content/content', $template );

                get_template_part( 'template-parts/content/content', 'comment' );
            endwhile; // End of the loop.
            ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
