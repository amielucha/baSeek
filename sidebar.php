<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package baSeek
 */

if ( ! is_active_sidebar( 'sidebar-main' ) ) {
	return;
}
?>
<div id="secondary" class="widget-area  <?php sidebar_w() ?>" role="complementary">
	<?php dynamic_sidebar( 'sidebar-main' ); ?>
</div><!-- #secondary -->
