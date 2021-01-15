<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.kalathiya.me
 * @since             1.0.0
 * @package           Wp_Online_Users_Stats
 *
 * @wordpress-plugin
 * Plugin Name:       WP Online Users Stats
 * Plugin URI:        www.kalathiya.me
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Hardik Kalathiya
 * Author URI:        www.kalathiya.me
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-online-users-stats
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-online-users-stats-activator.php
 */
function activate_wp_online_users_stats() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-wp-online-users-stats-activator.php';
    Wp_Online_Users_Stats_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-online-users-stats-deactivator.php
 */
function deactivate_wp_online_users_stats() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-wp-online-users-stats-deactivator.php';
    Wp_Online_Users_Stats_Deactivator::deactivate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-online-users-stats-deactivator.php
 */
function uninstall_wp_online_users_stats() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-wp-online-users-stats-uninstall.php';
    Wp_Online_Users_Stats_Uninstall::uninstall();
}

register_uninstall_hook(__FILE__, 'uninstall_wp_online_users_stats');
register_activation_hook(__FILE__, 'activate_wp_online_users_stats');
register_deactivation_hook(__FILE__, 'deactivate_wp_online_users_stats');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-wp-online-users-stats.php';

// Ajax datatable class file 
require plugin_dir_path(__FILE__) . 'includes/ssp.class.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_online_users_stats() {
    $plugin = new Wp_Online_Users_Stats();
    $plugin->run();
}

run_wp_online_users_stats();
