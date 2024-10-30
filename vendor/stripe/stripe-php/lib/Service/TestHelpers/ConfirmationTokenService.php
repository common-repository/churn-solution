<?php

// File generated from our OpenAPI spec

namespace Churnsolution\Stripe\Service\TestHelpers;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ConfirmationTokenService extends \Churnsolution\Stripe\Service\AbstractService
{
    /**
     * Creates a test mode Confirmation Token server side for your integration tests.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Churnsolution\Stripe\Util\RequestOptions $opts
     *
     * @throws \Churnsolution\Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Churnsolution\Stripe\ConfirmationToken
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/test_helpers/confirmation_tokens', $params, $opts);
    }
}
