<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package baSeek
 */

get_header(); ?>

	<div id="site-container" class="site-container container">
		<div id="site-row" class="site-row row">
			<div id="primary" class="content-area <?php content_w() ?>">
				<main id="main" class="site-main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php woocommerce_content(); ?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<?php get_sidebar(); ?>

		</div><!-- #site-row -->
	</div><!-- #site-container -->

<?php get_footer();
