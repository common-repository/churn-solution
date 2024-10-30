<?php

// File generated from our OpenAPI spec

namespace Churnsolution\Stripe;

/**
 * <code>Source</code> objects allow you to accept a variety of payment methods. They
 * represent a customer's payment instrument, and can be used with the Stripe API
 * just like a <code>Card</code> object: once chargeable, they can be charged, or can be
 * attached to customers.
 *
 * Stripe doesn't recommend using the deprecated <a href="https://stripe.com/docs/api/sources">Sources API</a>.
 * We recommend that you adopt the <a href="https://stripe.com/docs/api/payment_methods">PaymentMethods API</a>.
 * This newer API provides access to our latest features and payment method types.
 *
 * Related guides: <a href="https://stripe.com/docs/sources">Sources API</a> and <a href="https://stripe.com/docs/sources/customers">Sources &amp; Customers</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|\Churnsolution\Stripe\StripeObject $ach_credit_transfer
 * @property null|\Churnsolution\Stripe\StripeObject $ach_debit
 * @property null|\Churnsolution\Stripe\StripeObject $acss_debit
 * @property null|\Churnsolution\Stripe\StripeObject $alipay
 * @property null|int $amount A positive integer in the smallest currency unit (that is, 100 cents for $1.00, or 1 for ¥1, Japanese Yen being a zero-decimal currency) representing the total amount associated with the source. This is the amount for which the source will be chargeable once ready. Required for <code>single_use</code> sources.
 * @property null|\Churnsolution\Stripe\StripeObject $au_becs_debit
 * @property null|\Churnsolution\Stripe\StripeObject $bancontact
 * @property null|\Churnsolution\Stripe\StripeObject $card
 * @property null|\Churnsolution\Stripe\StripeObject $card_present
 * @property string $client_secret The client secret of the source. Used for client-side retrieval using a publishable key.
 * @property null|\Churnsolution\Stripe\StripeObject $code_verification
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $currency Three-letter <a href="https://stripe.com/docs/currencies">ISO code for the currency</a> associated with the source. This is the currency for which the source will be chargeable once ready. Required for <code>single_use</code> sources.
 * @property null|string $customer The ID of the customer to which this source is attached. This will not be present when the source has not been attached to a customer.
 * @property null|\Churnsolution\Stripe\StripeObject $eps
 * @property string $flow The authentication <code>flow</code> of the source. <code>flow</code> is one of <code>redirect</code>, <code>receiver</code>, <code>code_verification</code>, <code>none</code>.
 * @property null|\Churnsolution\Stripe\StripeObject $giropay
 * @property null|\Churnsolution\Stripe\StripeObject $ideal
 * @property null|\Churnsolution\Stripe\StripeObject $klarna
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Churnsolution\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|\Churnsolution\Stripe\StripeObject $multibanco
 * @property null|\Churnsolution\Stripe\StripeObject $owner Information about the owner of the payment instrument that may be used or required by particular source types.
 * @property null|\Churnsolution\Stripe\StripeObject $p24
 * @property null|\Churnsolution\Stripe\StripeObject $receiver
 * @property null|\Churnsolution\Stripe\StripeObject $redirect
 * @property null|\Churnsolution\Stripe\StripeObject $sepa_credit_transfer
 * @property null|\Churnsolution\Stripe\StripeObject $sepa_debit
 * @property null|\Churnsolution\Stripe\StripeObject $sofort
 * @property null|\Churnsolution\Stripe\StripeObject $source_order
 * @property null|string $statement_descriptor Extra information about a source. This will appear on your customer's statement every time you charge the source.
 * @property string $status The status of the source, one of <code>canceled</code>, <code>chargeable</code>, <code>consumed</code>, <code>failed</code>, or <code>pending</code>. Only <code>chargeable</code> sources can be used to create a charge.
 * @property null|\Churnsolution\Stripe\StripeObject $three_d_secure
 * @property string $type The <code>type</code> of the source. The <code>type</code> is a payment method, one of <code>ach_credit_transfer</code>, <code>ach_debit</code>, <code>alipay</code>, <code>bancontact</code>, <code>card</code>, <code>card_present</code>, <code>eps</code>, <code>giropay</code>, <code>ideal</code>, <code>multibanco</code>, <code>klarna</code>, <code>p24</code>, <code>sepa_debit</code>, <code>sofort</code>, <code>three_d_secure</code>, or <code>wechat</code>. An additional hash is included on the source with a name matching this value. It contains additional information specific to the <a href="https://stripe.com/docs/sources">payment method</a> used.
 * @property null|string $usage Either <code>reusable</code> or <code>single_use</code>. Whether this source should be reusable or not. Some source types may or may not be reusable by construction, while others may leave the option at creation. If an incompatible value is passed, an error will be returned.
 * @property null|\Churnsolution\Stripe\StripeObject $wechat
 */
class Source extends ApiResource
{
    const OBJECT_NAME = 'source';

    use ApiOperations\Update;

    const FLOW_CODE_VERIFICATION = 'code_verification';
    const FLOW_NONE = 'none';
    const FLOW_RECEIVER = 'receiver';
    const FLOW_REDIRECT = 'redirect';

    const STATUS_CANCELED = 'canceled';
    const STATUS_CHARGEABLE = 'chargeable';
    const STATUS_CONSUMED = 'consumed';
    const STATUS_FAILED = 'failed';
    const STATUS_PENDING = 'pending';

    const TYPE_ACH_CREDIT_TRANSFER = 'ach_credit_transfer';
    const TYPE_ACH_DEBIT = 'ach_debit';
    const TYPE_ACSS_DEBIT = 'acss_debit';
    const TYPE_ALIPAY = 'alipay';
    const TYPE_AU_BECS_DEBIT = 'au_becs_debit';
    const TYPE_BANCONTACT = 'bancontact';
    const TYPE_CARD = 'card';
    const TYPE_CARD_PRESENT = 'card_present';
    const TYPE_EPS = 'eps';
    const TYPE_GIROPAY = 'giropay';
    const TYPE_IDEAL = 'ideal';
    const TYPE_KLARNA = 'klarna';
    const TYPE_MULTIBANCO = 'multibanco';
    const TYPE_P24 = 'p24';
    const TYPE_SEPA_CREDIT_TRANSFER = 'sepa_credit_transfer';
    const TYPE_SEPA_DEBIT = 'sepa_debit';
    const TYPE_SOFORT = 'sofort';
    const TYPE_THREE_D_SECURE = 'three_d_secure';
    const TYPE_WECHAT = 'wechat';

    const USAGE_REUSABLE = 'reusable';
    const USAGE_SINGLE_USE = 'single_use';

    /**
     * Creates a new source object.
     *
     * @param null|array $params
     * @param null|array|string $options
     *
     * @throws \Churnsolution\Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Churnsolution\Stripe\Source the created resource
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
     * Retrieves an existing source object. Supply the unique source ID from a source
     * creation request and Stripe will return the corresponding up-to-date source
     * object information.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Churnsolution\Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Churnsolution\Stripe\Source
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Churnsolution\Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates the specified source by setting the values of the parameters passed. Any
     * parameters not provided will be left unchanged.
     *
     * This request accepts the <code>metadata</code> and <code>owner</code> as
     * arguments. It is also possible to update type specific information for selected
     * payment methods. Please refer to our <a href="/docs/sources">payment method
     * guides</a> for more detail.
     *
     * @param string $id the ID of the resource to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Churnsolution\Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Churnsolution\Stripe\Source the updated resource
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

    use ApiOperations\NestedResource;

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Churnsolution\Stripe\Exception\UnexpectedValueException if the source is not attached to a customer
     * @throws \Churnsolution\Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Churnsolution\Stripe\Source the detached source
     */
    public function detach($params = null, $opts = null)
    {
        self::_validateParams($params);

        $id = $this['id'];
        if (!$id) {
            $class = static::class;
            $msg = "Could not determine which URL to request: {$class} instance "
             . "has invalid ID: {$id}";

            throw new Exception\UnexpectedValueException($msg, null);
        }

        if ($this['customer']) {
            $base = Customer::classUrl();
            $parentExtn = \urlencode(Util\Util::utf8($this['customer']));
            $extn = \urlencode(Util\Util::utf8($id));
            $url = "{$base}/{$parentExtn}/sources/{$extn}";

            list($response, $opts) = $this->_request('delete', $url, $params, $opts);
            $this->refreshFrom($response, $opts);

            return $this;
        }
        $message = 'This source object does not appear to be currently attached '
               . 'to a customer object.';

        throw new Exception\UnexpectedValueException($message);
    }

    /**
     * @param string $id
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Churnsolution\Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Churnsolution\Stripe\Collection<\Stripe\SourceTransaction> list of source transactions
     */
    public static function allSourceTransactions($id, $params = null, $opts = null)
    {
        $url = static::resourceUrl($id) . '/source_transactions';
        list($response, $opts) = static::_staticRequest('get', $url, $params, $opts);
        $obj = \Churnsolution\Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Churnsolution\Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Churnsolution\Stripe\Source the verified source
     */
    public function verify($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/verify';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}