<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package baSeek
 */
?>
		</div><!-- #content -->
	</div><!-- #content-container -->

	<?php
	/* count active footer widgets */
	$footer_widget_count = 0;
	if (is_active_sidebar( 'footer-widget'   )) $footer_widget_count++;
	if (is_active_sidebar( 'footer-widget-2' )) $footer_widget_count++;
	if (is_active_sidebar( 'footer-widget-3' )) $footer_widget_count++;
	if (is_active_sidebar( 'footer-widget-4' )) $footer_widget_count++;

	switch ($footer_widget_count) {
		case 1:
			$footer_widget_span = "col-md-24";
			break;

		case 2:
			$footer_widget_span = "col-md-12";
			break;

		case 3:
			$footer_widget_span = "col-md-8";
			break;

		case 4:
			$footer_widget_span = "col-md-6";
			break;
	}
	if ($footer_widget_count !== 0): ?>

		<div id="footer-wrapper" class="wrapper footer-wrapper">
			<footer id="the_footer" class="container the_footer">
			<div id="footer-widgets-wrapper" class="row footer-widgets-wrapper">
				<?php
					if (is_active_sidebar( 'footer-widget'   )){ echo "<div class='$footer_widget_span' id='footer_1'>"; dynamic_sidebar( 'footer-widget'   ); echo "</div>"; }
					if (is_active_sidebar( 'footer-widget-2' )){ echo "<div class='$footer_widget_span' id='footer_2'>"; dynamic_sidebar( 'footer-widget-2' ); echo "</div>"; }
					if (is_active_sidebar( 'footer-widget-3' )){ echo "<div class='$footer_widget_span' id='footer_3'>"; dynamic_sidebar( 'footer-widget-3' ); echo "</div>"; }
					if (is_active_sidebar( 'footer-widget-4' )){ echo "<div class='$footer_widget_span' id='footer_4'>"; dynamic_sidebar( 'footer-widget-4' ); echo "</div>"; }
				?>
			</div>
			</footer>
		</div>
	<?php endif; ?>

	<footer id="credit-wrapper" class="wrapper credit-wrapper">
		<div id="colophon" class="site-footer container" role="contentinfo">
			<div class="row">
				<div class="col-lg-18 col-md-18">
					<?php if (is_active_sidebar( 'bottom' )):
						dynamic_sidebar( 'bottom' );
					else: ?>
						&copy; <?php bloginfo('title'); ?> <?php echo date('Y') ?>
					<?php endif ?>
				</div>
				<div class="site-info col-lg-6 col-md-6">
					<?php printf( __('<a href="%1$s" title="%2$s" target="_blank" class="iseek-link">%3$s <span id="iseek-replace" class="iseek-replace">iSeek.ie</span></a>', 'baseek'), 'http://www.iseek.ie', 'Seek Internet Solutions, Fermoy, Cork, Ireland', 'Irish Websites by ' ); ?>
				</div><!-- .site-info -->
			</div>
			<div class="site-info">
			</div><!-- .site-info -->
		</div><!-- #colophon -->
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
