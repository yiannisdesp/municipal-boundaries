<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/yiannisdesp
 * @since      1.0.0
 *
 * @package    Municipalities_Boundaries
 * @subpackage Municipalities_Boundaries/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Municipalities_Boundaries
 * @subpackage Municipalities_Boundaries/includes
 * @author     Yiannis D <despotis@ucm.org.cy>
 */
class Municipalities_Boundaries_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'municipal-boundaries',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
