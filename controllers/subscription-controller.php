<?php

if ( ! defined( 'ABSPATH' ) ) exit;

require_once(CHURNSOLUTION_DIR . "/classes/class-churnsolution-stripe-gateway.php");


class Churnsolution_Subscription_Controller {

    // Here initialize our namespace and resource name.
    /**
     * @var string
     */
    private $namespace;

    /**
     * @var string
     */
    private $resource_name;

    public function __construct() {
        $this->namespace     = '/churnsolution/v1';
        $this->resource_name = 'subscription';
    }

    // Register our routes.
    public function register_routes() {
        register_rest_route( $this->namespace, '/' . $this->resource_name, array(
            array(
                'methods'   => 'GET',
                'callback'  => array( $this, 'get_subscription' ),
            )
        ) );

        register_rest_route( $this->namespace, '/' . $this->resource_name . '/apply-coupon', array(
            array(
                'methods'   => 'POST',
                'callback'  => array( $this, 'apply_coupon' ),
            )
        ) );

        register_rest_route( $this->namespace, '/' . $this->resource_name . '/extend-free-trial', array(
            array(
                'methods'   => 'POST',
                'callback'  => array( $this, 'extend_free_trial' ),
            )
        ) );

        register_rest_route( $this->namespace, '/' . $this->resource_name . '/pause', array(
            array(
                'methods'   => 'POST',
                'callback'  => array( $this, 'pause_subscription' ),
            )
        ) );


    }

    function get_subscription(WP_REST_Request $args) {

        if (class_exists('PMPro_Subscription')) {
            $current_user = wp_get_current_user();
            $level_id = $args->get_param('level_id');
            return $this->get_pmpro_subscription_details($current_user->ID, $level_id);
        }

        return new stdClass;
    }

    function pause_subscription(WP_REST_Request $args) {

        if (class_exists('PMPro_Subscription')) {
            $current_user = wp_get_current_user();
            $level_id = $args->get_param('level_id');

            $subscription = $this->get_pmpro_subscription_details($current_user->ID, $level_id);

            $subscription_external_id = $subscription['external_id'];

            $number_of_months = $args['number_of_months'];

            Churnsolution_Stripe_Gateway::pause($subscription_external_id, $number_of_months);

        }

        return new stdClass;
    }

    function apply_coupon(WP_REST_Request $args){

        if (class_exists('PMPro_Subscription')) {
            $current_user = wp_get_current_user();
            $level_id = $args->get_param('level_id');

            $subscription = $this->get_pmpro_subscription_details($current_user->ID, $level_id);

            $subscription_external_id = $subscription['external_id'];

            $coupon_code = $args['coupon_code'];

            Churnsolution_Stripe_Gateway::apply_coupon($subscription_external_id, $coupon_code);
        }

    }

    function extend_free_trial(WP_REST_Request $args){

        if (class_exists('PMPro_Subscription')) {
            $current_user = wp_get_current_user();
            $level_id = $args->get_param('level_id');

            $subscription = $this->get_pmpro_subscription_details($current_user->ID, $level_id);

            $subscription_external_id = $subscription['external_id'];

            $number_of_days = $args['number_of_days'];

            Churnsolution_Stripe_Gateway::extend_free_trial($subscription_external_id, $number_of_days);
        }

    }

    private function get_pmpro_subscription_details($user_id, $level_id){

        $subscriptions = PMPro_Subscription::get_subscriptions_for_user( $user_id, (int)$level_id );

        $subscription_data = array(
            "external_id" => null
        );

        if(!empty($subscriptions)){
            $subscription = $subscriptions[0];
            $subscription_data['external_id'] = $subscription -> get_subscription_transaction_id();
        }

        return $subscription_data;
    }

}

// Function to register our new routes from the controller.
function churnsolution_register_subscription_routes() {
    $controller = new Churnsolution_Subscription_Controller();
    $controller->register_routes();
}

add_action( 'rest_api_init', 'churnsolution_register_subscription_routes' );
