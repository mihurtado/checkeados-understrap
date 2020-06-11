<?php
/**
 * UnderStrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

function add_similar_cars($vehicle) {
	$shortcode = '[wpcm_cars show_filters="false" show_sort="false" sort="date-desc" per_page="3" exclude_id="' . $vehicle->get_id() . '" make="' . $vehicle->get_make_name() . '"]';
	echo '<div class="wpcm-content-block" id="similar-cars">';
	echo '<h2>También podrían interesarte</h2>';
	echo do_shortcode($shortcode);
	echo '</div>';
}
add_filter( 'wpcm_after_single_vehicle', 'add_similar_cars' );


remove_action('wpcm_vehicle_summary', 'wpcm_template_single_contact', 30);

function add_contact_form($vehicle) {
	echo '<hr>';
	echo '<h4>¿Quieres más información?</h4>';
	if ($vehicle->is_with_report()) {
		$shortcode = '[contact-form-7 id="777" title="Solicitar Informe" car-id="'. $vehicle->get_id() . '"]';
	} else {
		$shortcode = '[contact-form-7 id="798" title="Solicitar Información" car-id="'. $vehicle->get_id() . '"]';
	}
	echo do_shortcode($shortcode);
}
add_filter('wpcm_vehicle_summary', 'add_contact_form', 40);


function wpcm_template_with_report_sign( $vehicle ) {
	if ( !$vehicle->is_sold() && $vehicle->is_with_report() ) {
		wp_car_manager()->service( 'template_manager' )->get_template_part( 'general/with-report-sign' );
	}
}

add_filter( 'wpcm_vehicle_listings_item_image_start', 'wpcm_template_with_report_sign', 10 );
add_filter( 'wpcm_vehicle_dashboard_item_image_start', 'wpcm_template_with_report_sign', 10 );
add_filter( 'wpcm_vehicle_thumbnails', 'wpcm_template_with_report_sign', 15 );


add_filter( 'shortcode_atts_wpcf7', 'custom_shortcode_atts_wpcf7_filter', 10, 3 );
function custom_shortcode_atts_wpcf7_filter( $out, $pairs, $atts ) {
	$my_attr = 'car-id';

	if ( isset( $atts[$my_attr] ) ) {
		$out[$my_attr] = $atts[$my_attr];
	}

	return $out;
}
