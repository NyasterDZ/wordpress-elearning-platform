<?php

/**
 * Fired during plugin uninstall
 *
 * @link       www.kalathiya.me
 * @since      1.0.0
 *
 * @package    Wp_Online_Users_Stats
 * @subpackage Wp_Online_Users_Stats/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wp_Online_Users_Stats
 * @subpackage Wp_Online_Users_Stats/includes
 * @author     Hardik Kalathiya <hardikkalathiya93@gmail.com>
 */
class Wp_Online_Users_Stats_Uninstall {

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function uninstall() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'users';
        $results = $wpdb->get_row("SELECT COUNT( * ) as found FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME =  '$table_name' AND COLUMN_NAME = 'user_login_status'");
        if ($results->found == "1") {
            $wpdb->query('ALTER TABLE ' . $table_name . '  DROP user_login_status');
        }
    }

}
