<?php

namespace Churnsolution\Stripe\Exception\OAuth;

/**
 * Implements properties and methods common to all (non-SPL) Stripe OAuth
 * exceptions.
 */
abstract class OAuthErrorException extends \Churnsolution\Stripe\Exception\ApiErrorException
{
    protected function constructErrorObject()
    {
        if (null === $this->jsonBody) {
            return null;
        }

        return \Churnsolution\Stripe\OAuthErrorObject::constructFrom($this->jsonBody);
    }
}
