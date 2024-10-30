<?php
/**
 * Plugin Name: Churn Solution
 * Description: Integrates you site with Churn Solution, enabling cancellation flows that reduce churn and increase retention.
 * Version: 1.0.0
 * Requires at least: 5.6
 * Requires PHP: 5.6
 * Author: Churn Solution
 * Author URI: https://churnsolution.com
 * License: GPLv2
 */

 if (!defined('ABSPATH')) {
    die("You cannot be here");
 }


define( 'CHURNSOLUTION_BASE_FILE', __FILE__ );
define( 'CHURNSOLUTION_DIR', dirname( __FILE__ ) );

// Includes
require_once( CHURNSOLUTION_DIR . '/includes/churnsolution-upgrade.php' );
require_once( CHURNSOLUTION_DIR . '/classes/class-churnsolution-connection.php' );
require_once CHURNSOLUTION_DIR . '/controllers/subscription-controller.php';
require_once CHURNSOLUTION_DIR . '/controllers/connection-controller.php';
require_once CHURNSOLUTION_DIR . '/classes/class-churnsolution-stripe-gateway.php';


// Initialize database tables
global $wpdb;
$wpdb->churnsolution_connection = $wpdb->prefix . 'churnsolution_connection';

// Handle database setup/updates
if ( is_admin() || defined('WP_CLI') ) {
    churnsolution_handle_upgrade();
}

// Admin page
function churnsolution_add_pages(){
    add_menu_page('Churnsolution', 'Churnsolution', 'manage_options', 'churnsolution-dashboard', 'churnsolution_dashboard_page', '', 31);
}

function churnsolution_dashboard_page(){
    require_once CHURNSOLUTION_DIR . '/adminpages/dashboard.php';
}

add_action( 'admin_menu', 'churnsolution_add_pages' );

function churnsolution_add_asyncdefer_attribute($tag, $handle) {
    // if the unique handle/name of the registered script has 'async' in it
    if (strpos($handle, 'async') !== false) {
        // return the tag with the async attribute
        return str_replace( '<script ', '<script async ', $tag );
    }
    // if the unique handle/name of the registered script has 'defer' in it
    else if (strpos($handle, 'defer') !== false) {
        // return the tag with the defer attribute
        return str_replace( '<script ', '<script defer ', $tag );
    }
    // otherwise skip
    else {
        return $tag;
    }
}

add_filter('script_loader_tag', 'churnsolution_add_asyncdefer_attribute', 10, 2);

// Enqueue scripts
function churnsolution_enqueue_scripts() {
    wp_enqueue_script('churn-solution-custom-script', plugin_dir_url(__FILE__) . 'js/churn-solution-custom.js', array('jquery'), '1.0.0', true);

    // Enqueue script for Churn Solution SDK
    wp_enqueue_script('churn-solution-sdk', 'https://app.churnsolution.com/sdk/index.min.js', array(), '1.0.0', true);

    // Pass AJAX URL and plugin options to JavaScript
    $plugin_options = array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('wp_rest'),
        'pmpro_cancel_nonce' => wp_create_nonce('pmpro_cancel-nonce'),
        'base_url' => esc_url(home_url())
    );

    wp_localize_script('churn-solution-custom-script', 'churn_ajax_obj', $plugin_options);

    wp_enqueue_style( 'churn-solution-style',  plugins_url( 'css/style.css', CHURNSOLUTION_BASE_FILE ));

}

// Register scripts, styles
// add_action('init', function(){
    add_action('wp_enqueue_scripts', 'churnsolution_enqueue_scripts');
// });

function churnsolution_enqueue_admin_scripts() {
    wp_register_script('churn-solution-savvycal-async', 'https://embed.savvycal.com/v1/embed.js', array(), '1.0.0', true);
    wp_enqueue_script('churn-solution-savvycal-async');
    wp_register_script('churn-solution-dashboard-script', plugin_dir_url(__FILE__) . 'js/dashboard.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('churn-solution-dashboard-script');
    wp_enqueue_style( 'churn-solution-admin-style',  plugins_url( 'css/dashboard-style.css', CHURNSOLUTION_BASE_FILE ));
}


add_action('admin_init', function(){
    add_action( 'admin_enqueue_scripts', 'churnsolution_enqueue_admin_scripts' );
});

// AJAX handler for calculating SHA256 HMAC hash
add_action('wp_ajax_get_hmac_hash', 'churnsolution_get_hmac_hash');
function churnsolution_get_hmac_hash() {
    // Check nonce for security
    check_ajax_referer('wp_rest', 'nonce');

    // Get the secret key and subscription ID from the AJAX request
    $secretKey = sanitize_text_field($_POST['secret_key']);
    $subscriptionId = sanitize_text_field($_POST['subscription_id']);

    // Calculate SHA256 HMAC hash
    $hash = hash_hmac('sha256', $subscriptionId, $secretKey, true);
    $hmac_hash = bin2hex($hash);

    // Return the HMAC hash
    echo esc_attr($hmac_hash);

    // Always exit to avoid further execution
    wp_die();
}


// Exception handler
function churnsolution_custom_handle_exception($exception) {

    $errorCode = $exception->getCode();
    $errorMessage = $exception->getMessage();

    if ($errorCode >= 400 && $errorCode < 600) {
        http_response_code($errorCode);
    } else {
        http_response_code(500); // Default to 500 Internal Server Error
    }

    // Return a JSON response
    wp_send_json([
        "error" => $errorMessage,
        "code" => $errorCode
    ], http_response_code());
}

set_exception_handler('churnsolution_custom_handle_exception');