<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/yiannisdesp
 * @since             1.0.0
 * @package           Municipalities_Boundaries
 *
 * @wordpress-plugin
 * Plugin Name:       Municipal Boundaries
 * Plugin URI:        https://github.com/yiannisdesp/ucmmap
 * Description:       Renders current Municipal Boundaries on Google Map based on KML data.
 * Version:           1.0.0
 * Author:            Yiannis D
 * Author URI:        https://github.com/yiannisdesp
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       municipal-boundaries
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MUNICIPALITIES_BOUNDARIES_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-municipal-boundaries-activator.php
 */
function activate_municipalities_boundaries() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-municipal-boundaries-activator.php';
	Municipalities_Boundaries_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-municipal-boundaries-deactivator.php
 */
function deactivate_municipalities_boundaries() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-municipal-boundaries-deactivator.php';
	Municipalities_Boundaries_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_municipalities_boundaries' );
register_deactivation_hook( __FILE__, 'deactivate_municipalities_boundaries' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-municipal-boundaries.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_municipalities_boundaries() {

	$plugin = new Municipalities_Boundaries();
	$plugin->run();

}
run_municipalities_boundaries();