<?php
/**
 * baSeek WooCommerce integration
 *
 * @package baSeek
 */

// WooCommerce support
add_theme_support( 'woocommerce' );

/*
 * Add Bootstrap wrappers
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end');

add_action('woocommerce_before_main_content', 'baseek_wc_before_main_content');
add_action('woocommerce_after_main_content', 'baseek_wc_after_main_content');



function baseek_wc_before_main_content() {
	echo '<div id="site-container" class="site-container container"><div id="site-row" class="site-row row"><div class="col-sm-24">';
}
function baseek_wc_after_main_content() {
	echo '</div></div></div>';
}
