<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ScapeShot
 */

?>
		</div><!-- .wrapper -->
	</div><!-- #content -->
	
	<?php get_template_part( 'template-parts/footer/footer-instagram' ); ?>

	<footer id="colophon" class="site-footer">
		
		<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

		<div id="site-generator" class="one">
			<?php get_template_part('template-parts/navigation/navigation-footer'); ?>

			<?php get_template_part('template-parts/footer/site-info'); ?>
		</div><!-- #site-generator -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
