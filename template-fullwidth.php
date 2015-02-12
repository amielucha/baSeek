<?php
/**
 *
 * @package baSeek
 *
 * Template Name: Full Width
 */

get_header(); ?>

	<div id="site-container" class="site-container container">
		<div id="site-row" class="site-row row">
			<div id="primary" class="content-area <?php grid_w() ?>">
				<main id="main" class="site-main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', 'page' ); ?>

						<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->

		</div><!-- #site-row -->
	</div><!-- #site-container -->

<?php get_footer();
