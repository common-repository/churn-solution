<?php

use Churnsolution\Stripe;

require_once CHURNSOLUTION_DIR . '/vendor/autoload.php';

if ( ! defined( 'ABSPATH' ) ) exit;

add_action('plugins_loaded', array('Churnsolution_Stripe_Gateway', 'init'));

class Churnsolution_Stripe_Gateway
{

    private static $stripe;

    public static function init()
    {
        $secret_key = null;

        if (class_exists("PMPro_Subscription")) {

            $secret_key = self::pmpro_get_secret_key();
        }

        if (!empty($secret_key)) {
            self::$stripe = new Stripe\StripeClient($secret_key);
        }
    }

    public static function pause($external_id, $number_of_months)
    {
        self::validate_stripe_initialized();

        $subscription = self::validate_subscription_exists($external_id);

        $current_period_end = $subscription->current_period_end;
        $new_period_end = $current_period_end + $number_of_months * 30 * 24 * 60 * 60;

        self::$stripe->subscriptions->update(
            $external_id,
            ['pause_collection' => array(
                'resumes_at' => $new_period_end,
                'behavior' => 'mark_uncollectible'
            )]
        );
    }

    public static function apply_coupon($external_id, $coupon_code)
    {
        self::validate_stripe_initialized();

        self::validate_subscription_exists($external_id);

        self::$stripe->subscriptions->update(
            $external_id,
            ['coupon' => $coupon_code]
        );
    }

    public static function extend_free_trial($external_id, $number_of_days)
    {
        self::validate_stripe_initialized();

        $subscription = self::validate_subscription_exists($external_id);

        if ($subscription->status != Stripe\Subscription::STATUS_TRIALING) {
            throw new Exception("subscription: " . esc_attr($external_id) . " is not trialing", 400);
        }

        $current_trial_end = $subscription->trial_end; // in seconds
        $new_trial_end = $current_trial_end + $number_of_days * 24 * 60 * 60;

        self::$stripe->subscriptions->update(
            $external_id,
            ['trial_end' => $new_trial_end]
        );
    }

    private static function validate_subscription_exists($external_id)
    {
        self::validate_stripe_initialized();

        try {
            return self::$stripe->subscriptions->retrieve($external_id);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            $code = $e->getStripeCode();

            if ($code == \Stripe\ErrorObject::CODE_RESOURCE_MISSING) {
                throw new Exception(
                    "No subscriptions with id: " . esc_attr($external_id) . " were found",
                    404
                );
            }

            throw $e;
        }
    }

    private static function pmpro_is_using_legacy_keys()
    {
        $r = !empty(get_option('pmpro_stripe_secretkey')) && !empty(get_option('pmpro_stripe_publishablekey'));
        return $r;
    }

    private static function pmpro_get_secret_key()
    {
        if (self::pmpro_is_using_legacy_keys()) {
            $secretkey = get_option('pmpro_stripe_secretkey');
        } else {
            $secretkey = get_option('pmpro_gateway_environment') === 'live'
                ? get_option('pmpro_live_stripe_connect_secretkey')
                : get_option('pmpro_sandbox_stripe_connect_secretkey');
        }
        return $secretkey;
    }

    private static function validate_stripe_initialized()
    {
        if(empty(self::$stripe)){
            throw new Exception("Stripe is not configured properly", 400);
        }
    }


}