<?php

// File generated from our OpenAPI spec

namespace Churnsolution\Stripe\Issuing;

/**
 * You can <a href="https://stripe.com/docs/issuing/cards">create physical or virtual cards</a> that are issued to cardholders.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $brand The brand of the card.
 * @property null|string $cancellation_reason The reason why the card was canceled.
 * @property \Churnsolution\Stripe\Issuing\Cardholder $cardholder <p>An Issuing <code>Cardholder</code> object represents an individual or business entity who is <a href="https://stripe.com/docs/issuing">issued</a> cards.</p><p>Related guide: <a href="https://stripe.com/docs/issuing/cards#create-cardholder">How to create a cardholder</a></p>
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Supported currencies are <code>usd</code> in the US, <code>eur</code> in the EU, and <code>gbp</code> in the UK.
 * @property null|string $cvc The card's CVC. For security reasons, this is only available for virtual cards, and will be omitted unless you explicitly request it with <a href="https://stripe.com/docs/api/expanding_objects">the <code>expand</code> parameter</a>. Additionally, it's only available via the <a href="https://stripe.com/docs/api/issuing/cards/retrieve">&quot;Retrieve a card&quot; endpoint</a>, not via &quot;List all cards&quot; or any other endpoint.
 * @property int $exp_month The expiration month of the card.
 * @property int $exp_year The expiration year of the card.
 * @property null|string $financial_account The financial account this card is attached to.
 * @property string $last4 The last 4 digits of the card number.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Churnsolution\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $number The full unredacted card number. For security reasons, this is only available for virtual cards, and will be omitted unless you explicitly request it with <a href="https://stripe.com/docs/api/expanding_objects">the <code>expand</code> parameter</a>. Additionally, it's only available via the <a href="https://stripe.com/docs/api/issuing/cards/retrieve">&quot;Retrieve a card&quot; endpoint</a>, not via &quot;List all cards&quot; or any other endpoint.
 * @property null|string|\Churnsolution\Stripe\Issuing\PersonalizationDesign $personalization_design The personalization design object belonging to this card.
 * @property null|string|\Churnsolution\Stripe\Issuing\Card $replaced_by The latest card that replaces this card, if any.
 * @property null|string|\Churnsolution\Stripe\Issuing\Card $replacement_for The card this card replaces, if any.
 * @property null|string $replacement_reason The reason why the previous card needed to be replaced.
 * @property null|\Churnsolution\Stripe\StripeObject $shipping Where and how the card will be shipped.
 * @property \Churnsolution\Stripe\StripeObject $spending_controls
 * @property string $status Whether authorizations can be approved on this card. May be blocked from activating cards depending on past-due Cardholder requirements. Defaults to <code>inactive</code>.
 * @property string $type The type of the card.
 * @property null|\Churnsolution\Stripe\StripeObject $wallets Information relating to digital wallets (like Apple Pay and Google Pay).
 */
class Card extends \Churnsolution\Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.card';

    use \Churnsolution\Stripe\ApiOperations\Update;

    const CANCELLATION_REASON_DESIGN_REJECTED = 'design_rejected';
    const CANCELLATION_REASON_LOST = 'lost';
    const CANCELLATION_REASON_STOLEN = 'stolen';

    const REPLACEMENT_REASON_DAMAGED = 'damaged';
    const REPLACEMENT_REASON_EXPIRED = 'expired';
    const REPLACEMENT_REASON_LOST = 'lost';
    const REPLACEMENT_REASON_STOLEN = 'stolen';

    const STATUS_ACTIVE = 'active';
    const STATUS_CANCELED = 'canceled';
    const STATUS_INACTIVE = 'inactive';

    const TYPE_PHYSICAL = 'physical';
    const TYPE_VIRTUAL = 'virtual';

    /**
     * Creates an Issuing <code>Card</code> object.
     *
     * @param null|array $params
     * @param null|array|string $options
     *
     * @throws \Churnsolution\Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Churnsolution\Stripe\Issuing\Card the created resource
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
     * Returns a list of Issuing <code>Card</code> objects. The objects are sorted in
     * descending order by creation date, with the most recently created object
     * appearing first.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Churnsolution\Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Churnsolution\Stripe\Collection<\Stripe\Issuing\Card> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Churnsolution\Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves an Issuing <code>Card</code> object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Churnsolution\Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Churnsolution\Stripe\Issuing\Card
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Churnsolution\Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates the specified Issuing <code>Card</code> object by setting the values of
     * the parameters passed. Any parameters not provided will be left unchanged.
     *
     * @param string $id the ID of the resource to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Churnsolution\Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Churnsolution\Stripe\Issuing\Card the updated resource
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