<?php

// File generated from our OpenAPI spec

namespace Churnsolution\Stripe;

/**
 * This object represents files hosted on Stripe's servers. You can upload
 * files with the <a href="https://stripe.com/docs/api#create_file">create file</a> request
 * (for example, when uploading dispute evidence). Stripe also
 * creates files independently (for example, the results of a <a href="#scheduled_queries">Sigma scheduled
 * query</a>).
 *
 * Related guide: <a href="https://stripe.com/docs/file-upload">File upload guide</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|int $expires_at The file expires and isn't available at this time in epoch seconds.
 * @property null|string $filename The suitable name for saving the file to a filesystem.
 * @property null|\Churnsolution\Stripe\Collection<\Stripe\FileLink> $links A list of <a href="https://stripe.com/docs/api#file_links">file links</a> that point at this file.
 * @property string $purpose The <a href="https://stripe.com/docs/file-upload#uploading-a-file">purpose</a> of the uploaded file.
 * @property int $size The size of the file object in bytes.
 * @property null|string $title A suitable title for the document.
 * @property null|string $type The returned file type (for example, <code>csv</code>, <code>pdf</code>, <code>jpg</code>, or <code>png</code>).
 * @property null|string $url Use your live secret API key to download the file from this URL.
 */
class File extends ApiResource
{
    const OBJECT_NAME = 'file';

    const PURPOSE_ACCOUNT_REQUIREMENT = 'account_requirement';
    const PURPOSE_ADDITIONAL_VERIFICATION = 'additional_verification';
    const PURPOSE_BUSINESS_ICON = 'business_icon';
    const PURPOSE_BUSINESS_LOGO = 'business_logo';
    const PURPOSE_CUSTOMER_SIGNATURE = 'customer_signature';
    const PURPOSE_DISPUTE_EVIDENCE = 'dispute_evidence';
    const PURPOSE_DOCUMENT_PROVIDER_IDENTITY_DOCUMENT = 'document_provider_identity_document';
    const PURPOSE_FINANCE_REPORT_RUN = 'finance_report_run';
    const PURPOSE_IDENTITY_DOCUMENT = 'identity_document';
    const PURPOSE_IDENTITY_DOCUMENT_DOWNLOADABLE = 'identity_document_downloadable';
    const PURPOSE_PCI_DOCUMENT = 'pci_document';
    const PURPOSE_SELFIE = 'selfie';
    const PURPOSE_SIGMA_SCHEDULED_QUERY = 'sigma_scheduled_query';
    const PURPOSE_TAX_DOCUMENT_USER_UPLOAD = 'tax_document_user_upload';
    const PURPOSE_TERMINAL_READER_SPLASHSCREEN = 'terminal_reader_splashscreen';

    /**
     * Returns a list of the files that your account has access to. Stripe sorts and
     * returns the files by their creation dates, placing the most recently created
     * files at the top.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Churnsolution\Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Churnsolution\Stripe\Collection<\Stripe\File> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Churnsolution\Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of an existing file object. After you supply a unique file
     * ID, Stripe returns the corresponding file object. Learn how to <a
     * href="/docs/file-upload#download-file-contents">access file contents</a>.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Churnsolution\Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Churnsolution\Stripe\File
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Churnsolution\Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    // This resource can have two different object names. In latter API
    // versions, only `file` is used, but since stripe-php may be used with
    // any API version, we need to support deserializing the older
    // `file_upload` object into the same class.
    const OBJECT_NAME_ALT = 'file_upload';

    use ApiOperations\Create {
        create as protected _create;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Churnsolution\Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Churnsolution\Stripe\File the created file
     */
    public static function create($params = null, $opts = null)
    {
        $opts = \Churnsolution\Stripe\Util\RequestOptions::parse($opts);
        if (null === $opts->apiBase) {
            $opts->apiBase = Stripe::$apiUploadBase;
        }
        // Manually flatten params, otherwise curl's multipart encoder will
        // choke on nested arrays.
        $flatParams = \array_column(\Churnsolution\Stripe\Util\Util::flattenParams($params), 1, 0);

        return static::_create($flatParams, $opts);
    }
}
