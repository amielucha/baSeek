<?php
/**
 * @package baSeek
 */

get_header(); ?>

	<div id="site-container" class="site-container container">
		<div id="site-row" class="site-row row">
			<div id="primary" class="content-area <?php content_w() ?>">
				<main id="main" class="site-main" role="main">

					<?php woocommerce_content(); ?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<?php get_sidebar(); ?>

		</div><!-- #site-row -->
	</div><!-- #site-container -->

<?php get_footer();
