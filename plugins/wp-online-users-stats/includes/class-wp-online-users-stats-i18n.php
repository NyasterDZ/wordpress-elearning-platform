<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       www.kalathiya.me
 * @since      1.0.0
 *
 * @package    Wp_Online_Users_Stats
 * @subpackage Wp_Online_Users_Stats/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Online_Users_Stats
 * @subpackage Wp_Online_Users_Stats/includes
 * @author     Hardik Kalathiya <hardikkalathiya93@gmail.com>
 */
class Wp_Online_Users_Stats_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-online-users-stats',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
