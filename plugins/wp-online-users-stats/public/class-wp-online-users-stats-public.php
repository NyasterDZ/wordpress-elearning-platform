<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www.kalathiya.me
 * @since      1.0.0
 *
 * @package    Wp_Online_Users_Stats
 * @subpackage Wp_Online_Users_Stats/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Online_Users_Stats
 * @subpackage Wp_Online_Users_Stats/public
 * @author     Hardik Kalathiya <hardikkalathiya93@gmail.com>
 */
class Wp_Online_Users_Stats_Public {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Wp_Online_Users_Stats_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Wp_Online_Users_Stats_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wp-online-users-stats-public.css', array(), $this->version, 'all');
        wp_enqueue_style('online_user_style', plugin_dir_url(__FILE__) . 'css/online_users.css', time());
        wp_enqueue_style('ajax_datatable_stle', plugin_dir_url(__FILE__) . 'css/jquery.dataTables.css');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Wp_Online_Users_Stats_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Wp_Online_Users_Stats_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wp-online-users-stats-public.js', array('jquery'), $this->version, false);
        wp_enqueue_script('online_user_jsscript', plugin_dir_url(__FILE__) . 'js/online_users.js', array('jquery'), time());
        wp_enqueue_script('ajax_datatable_scrip', plugin_dir_url(__FILE__) . 'js/jquery.dataTables.js', array('jquery'), time());
        wp_enqueue_script('heartbeat');

        // Admin url localization
        wp_localize_script('online_user_jsscript', 'hk_localization_sc', array('adminUrlHk' => admin_url('admin-ajax.php')));
    }

}
