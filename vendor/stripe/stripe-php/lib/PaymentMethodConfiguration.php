<?php

// File generated from our OpenAPI spec

namespace Churnsolution\Stripe;

/**
 * PaymentMethodConfigurations control which payment methods are displayed to your customers when you don't explicitly specify payment method types. You can have multiple configurations with different sets of payment methods for different scenarios.
 *
 * There are two types of PaymentMethodConfigurations. Which is used depends on the <a href="https://stripe.com/docs/connect/charges">charge type</a>:
 *
 * <strong>Direct</strong> configurations apply to payments created on your account, including Connect destination charges, Connect separate charges and transfers, and payments not involving Connect.
 *
 * <strong>Child</strong> configurations apply to payments created on your connected accounts using direct charges, and charges with the on_behalf_of parameter.
 *
 * Child configurations have a <code>parent</code> that sets default values and controls which settings connected accounts may override. You can specify a parent ID at payment time, and Stripe will automatically resolve the connected account’s associated child configuration. Parent configurations are <a href="https://dashboard.stripe.com/settings/payment_methods/connected_accounts">managed in the dashboard</a> and are not available in this API.
 *
 * Related guides:
 * - <a href="https://stripe.com/docs/connect/payment-method-configurations">Payment Method Configurations API</a>
 * - <a href="https://stripe.com/docs/payments/multiple-payment-method-configs">Multiple configurations on dynamic payment methods</a>
 * - <a href="https://stripe.com/docs/connect/multiple-payment-method-configurations">Multiple configurations for your Connect accounts</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|\Churnsolution\Stripe\StripeObject $acss_debit
 * @property bool $active Whether the configuration can be used for new payments.
 * @property null|\Churnsolution\Stripe\StripeObject $affirm
 * @property null|\Churnsolution\Stripe\StripeObject $afterpay_clearpay
 * @property null|\Churnsolution\Stripe\StripeObject $alipay
 * @property null|\Churnsolution\Stripe\StripeObject $amazon_pay
 * @property null|\Churnsolution\Stripe\StripeObject $apple_pay
 * @property null|string $application For child configs, the Connect application associated with the configuration.
 * @property null|\Churnsolution\Stripe\StripeObject $au_becs_debit
 * @property null|\Churnsolution\Stripe\StripeObject $bacs_debit
 * @property null|\Churnsolution\Stripe\StripeObject $bancontact
 * @property null|\Churnsolution\Stripe\StripeObject $blik
 * @property null|\Churnsolution\Stripe\StripeObject $boleto
 * @property null|\Churnsolution\Stripe\StripeObject $card
 * @property null|\Churnsolution\Stripe\StripeObject $cartes_bancaires
 * @property null|\Churnsolution\Stripe\StripeObject $cashapp
 * @property null|\Churnsolution\Stripe\StripeObject $customer_balance
 * @property null|\Churnsolution\Stripe\StripeObject $eps
 * @property null|\Churnsolution\Stripe\StripeObject $fpx
 * @property null|\Churnsolution\Stripe\StripeObject $giropay
 * @property null|\Churnsolution\Stripe\StripeObject $google_pay
 * @property null|\Churnsolution\Stripe\StripeObject $grabpay
 * @property null|\Churnsolution\Stripe\StripeObject $ideal
 * @property bool $is_default The default configuration is used whenever a payment method configuration is not specified.
 * @property null|\Churnsolution\Stripe\StripeObject $jcb
 * @property null|\Churnsolution\Stripe\StripeObject $klarna
 * @property null|\Churnsolution\Stripe\StripeObject $konbini
 * @property null|\Churnsolution\Stripe\StripeObject $link
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Churnsolution\Stripe\StripeObject $mobilepay
 * @property null|\Churnsolution\Stripe\StripeObject $multibanco
 * @property string $name The configuration's name.
 * @property null|\Churnsolution\Stripe\StripeObject $oxxo
 * @property null|\Churnsolution\Stripe\StripeObject $p24
 * @property null|string $parent For child configs, the configuration's parent configuration.
 * @property null|\Churnsolution\Stripe\StripeObject $paynow
 * @property null|\Churnsolution\Stripe\StripeObject $paypal
 * @property null|\Churnsolution\Stripe\StripeObject $promptpay
 * @property null|\Churnsolution\Stripe\StripeObject $revolut_pay
 * @property null|\Churnsolution\Stripe\StripeObject $sepa_debit
 * @property null|\Churnsolution\Stripe\StripeObject $sofort
 * @property null|\Churnsolution\Stripe\StripeObject $swish
 * @property null|\Churnsolution\Stripe\StripeObject $twint
 * @property null|\Churnsolution\Stripe\StripeObject $us_bank_account
 * @property null|\Churnsolution\Stripe\StripeObject $wechat_pay
 * @property null|\Churnsolution\Stripe\StripeObject $zip
 */
class PaymentMethodConfiguration extends ApiResource
{
    const OBJECT_NAME = 'payment_method_configuration';

    use ApiOperations\Update;

    /**
     * Creates a payment method configuration.
     *
     * @param null|array $params
     * @param null|array|string $options
     *
     * @throws \Churnsolution\Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Churnsolution\Stripe\PaymentMethodConfiguration the created resource
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Churnsolution\Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * List payment method configurations.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Churnsolution\Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Churnsolution\Stripe\Collection<\Stripe\PaymentMethodConfiguration> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Churnsolution\Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieve payment method configuration.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Churnsolution\Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Churnsolution\Stripe\PaymentMethodConfiguration
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Churnsolution\Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Update payment method configuration.
     *
     * @param string $id the ID of the resource to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Churnsolution\Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Churnsolution\Stripe\PaymentMethodConfiguration the updated resource
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = \Churnsolution\Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
