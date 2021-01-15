<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.kalathiya.me
 * @since      1.0.0
 *
 * @package    Wp_Online_Users_Stats
 * @subpackage Wp_Online_Users_Stats/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Online_Users_Stats
 * @subpackage Wp_Online_Users_Stats/admin
 * @author     Hardik Kalathiya <hardikkalathiya93@gmail.com>
 */
class Wp_Online_Users_Stats_Admin {

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
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

        add_action('admin_menu', array($this, 'add_custom_menu_in_dashboard'));

        add_action('wp_authenticate', array($this, 'check_custom_authentication'));

        add_action('wp_logout', array($this, 'delete_session'));

        add_shortcode('wp_online_user', array($this, 'wp_online_user'));

        add_action('wp_ajax_hk_dataset_results', array($this, 'hk_dataset_results'));
        add_action('wp_ajax_nopriv_hk_dataset_results', array($this, 'hk_dataset_results'));

        add_action('wp_ajax_change_user_status', array($this, 'change_user_status'));
        add_action('wp_ajax_nopriv_change_user_status', array($this, 'change_user_status'));
    }

    public function add_custom_menu_in_dashboard() {
        add_menu_page('Idea', 'Online Users', 'manage_options', 'online_offline', array($this, 'wp_online_user'), plugin_dir_url(__FILE__) . '/images/online.png', 100);
    }

    public function wp_online_user() {
        global $wpdb;
        $prefix_hk = $wpdb->prefix;
        $table_name = $prefix_hk . "users";
        $primary_id = 'id';

        echo "<script> jQuery(document).ready(function () { "
        . "hk_dataset_script_fun('" . $table_name . "','" . $primary_id . "');"
        . "});"
        . "</script>";
        if (is_admin()) {
            ?>
            <div class="outre-shortcode"><label>Use following shortcode
                    <span class="short-code-show shortcode-display-wrap"><i>[wp_online_user]</i></span>
                    to display online user pannel on frontend side.</label>
            </div>
        <?php } ?>
        <div class="main-wrap">
            <div class="container">
                <section>
                    <div class="demo-html"></div>
                    <table id="hk_user_status_dt" class="display data_table_identifier_cls" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date Registration</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date Registration</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                </section>
            </div> 
        </div>
        <?php
    }

    public function hk_dataset_results() {
        $data_collection = $_POST["data_collection"];
        $table = $_POST["table_name"];
        $primaryKey = $_POST["primary_key"];

        $columns = array(
            array('db' => 'user_login', 'dt' => 'user_login'),
            array('db' => 'user_login_status', 'dt' => 'user_login_status'),
            array('db' => 'user_registered', 'dt' => 'user_registered'),
            array('db' => 'user_email', 'dt' => 'user_email')
        );

        $sql_details = array(
            'user' => DB_USER,
            'pass' => DB_PASSWORD,
            'db' => DB_NAME,
            'host' => DB_HOST
        );

        // ajax datatable class file/library required class ssp.class.php
        echo json_encode(
                SSP::simple($_POST, $sql_details, $table, $primaryKey, $columns)
        );

        exit;
    }

    public function check_custom_authentication($username) {
        global $wpdb;
        if (!username_exists($username)) {
            return;
        }
        $userinfo = get_user_by('login', $username);
        global $wpdb;
        $user_id = $userinfo->ID;
        $prefix_hk = $wpdb->prefix;
        $table_to_update = $prefix_hk . "users";
        $wpdb->query("UPDATE $table_to_update SET `user_login_status` = '1' WHERE $table_to_update.ID = $user_id");
    }

    public function delete_session() {
        global $wpdb;
        $user_id = get_current_user_id();
        $prefix_hk = $wpdb->prefix;
        $table_to_update = $prefix_hk . "users";
        $wpdb->query("UPDATE  $table_to_update SET `user_login_status` = '0' WHERE $table_to_update.ID = $user_id");
    }

    public function change_user_status() {
        $status = $_REQUEST['status'];
        if ($status == "1") {
            if (is_user_logged_in()) {
                global $wpdb;
                $user_id = get_current_user_id();
                $prefix_hk = $wpdb->prefix;
                $table_to_update = $prefix_hk . "users";
                $wpdb->query("UPDATE $table_to_update SET `user_login_status` = '1' WHERE $table_to_update.ID = $user_id");
            }
        }

        if ($status == "3") {
            if (is_user_logged_in()) {
                global $wpdb;
                $user_id = get_current_user_id();
                $prefix_hk = $wpdb->prefix;
                $table_to_update = $prefix_hk . "users";
                $wpdb->query("UPDATE  $table_to_update SET `user_login_status` = '3' WHERE $table_to_update.ID = $user_id");
            }
        }
        exit();
    }

    /**
     * Register the stylesheets for the admin area.
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
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wp-online-users-stats-admin.css', array(), $this->version, 'all');
        wp_enqueue_style('online_user_style', plugin_dir_url(__FILE__) . 'css/online_users.css', time());
        wp_enqueue_style('ajax_datatable_stle', plugin_dir_url(__FILE__) . 'css/jquery.dataTables.css');
    }

    /**
     * Register the JavaScript for the admin area.
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
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wp-online-users-stats-admin.js', array('jquery'), $this->version, false);
        wp_enqueue_script('online_user_jsscript', plugin_dir_url(__FILE__) . 'js/online_users.js', array('jquery'), time());
        wp_enqueue_script('ajax_datatable_scrip', plugin_dir_url(__FILE__) . 'js/jquery.dataTables.js', array('jquery'), time());
        wp_enqueue_script('heartbeat');

        // Admin url localization
        wp_localize_script('online_user_jsscript', 'hk_localization_sc', array('adminUrlHk' => admin_url('admin-ajax.php')));
    }

}
