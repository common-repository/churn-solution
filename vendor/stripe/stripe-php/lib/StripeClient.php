<?php

namespace Churnsolution\Stripe;

/**
 * Client used to send requests to Stripe's API.
 *
 * @property \Churnsolution\Stripe\Service\OAuthService $oauth
 * // The beginning of the section generated from our OpenAPI spec
 * @property \Churnsolution\Stripe\Service\AccountLinkService $accountLinks
 * @property \Churnsolution\Stripe\Service\AccountService $accounts
 * @property \Churnsolution\Stripe\Service\AccountSessionService $accountSessions
 * @property \Churnsolution\Stripe\Service\ApplePayDomainService $applePayDomains
 * @property \Churnsolution\Stripe\Service\ApplicationFeeService $applicationFees
 * @property \Churnsolution\Stripe\Service\Apps\AppsServiceFactory $apps
 * @property \Churnsolution\Stripe\Service\BalanceService $balance
 * @property \Churnsolution\Stripe\Service\BalanceTransactionService $balanceTransactions
 * @property \Churnsolution\Stripe\Service\Billing\BillingServiceFactory $billing
 * @property \Churnsolution\Stripe\Service\BillingPortal\BillingPortalServiceFactory $billingPortal
 * @property \Churnsolution\Stripe\Service\ChargeService $charges
 * @property \Churnsolution\Stripe\Service\Checkout\CheckoutServiceFactory $checkout
 * @property \Churnsolution\Stripe\Service\Climate\ClimateServiceFactory $climate
 * @property \Churnsolution\Stripe\Service\ConfirmationTokenService $confirmationTokens
 * @property \Churnsolution\Stripe\Service\CountrySpecService $countrySpecs
 * @property \Churnsolution\Stripe\Service\CouponService $coupons
 * @property \Churnsolution\Stripe\Service\CreditNoteService $creditNotes
 * @property \Churnsolution\Stripe\Service\CustomerService $customers
 * @property \Churnsolution\Stripe\Service\CustomerSessionService $customerSessions
 * @property \Churnsolution\Stripe\Service\DisputeService $disputes
 * @property \Churnsolution\Stripe\Service\Entitlements\EntitlementsServiceFactory $entitlements
 * @property \Churnsolution\Stripe\Service\EphemeralKeyService $ephemeralKeys
 * @property \Churnsolution\Stripe\Service\EventService $events
 * @property \Churnsolution\Stripe\Service\ExchangeRateService $exchangeRates
 * @property \Churnsolution\Stripe\Service\FileLinkService $fileLinks
 * @property \Churnsolution\Stripe\Service\FileService $files
 * @property \Churnsolution\Stripe\Service\FinancialConnections\FinancialConnectionsServiceFactory $financialConnections
 * @property \Churnsolution\Stripe\Service\Forwarding\ForwardingServiceFactory $forwarding
 * @property \Churnsolution\Stripe\Service\Identity\IdentityServiceFactory $identity
 * @property \Churnsolution\Stripe\Service\InvoiceItemService $invoiceItems
 * @property \Churnsolution\Stripe\Service\InvoiceService $invoices
 * @property \Churnsolution\Stripe\Service\Issuing\IssuingServiceFactory $issuing
 * @property \Churnsolution\Stripe\Service\MandateService $mandates
 * @property \Churnsolution\Stripe\Service\PaymentIntentService $paymentIntents
 * @property \Churnsolution\Stripe\Service\PaymentLinkService $paymentLinks
 * @property \Churnsolution\Stripe\Service\PaymentMethodConfigurationService $paymentMethodConfigurations
 * @property \Churnsolution\Stripe\Service\PaymentMethodDomainService $paymentMethodDomains
 * @property \Churnsolution\Stripe\Service\PaymentMethodService $paymentMethods
 * @property \Churnsolution\Stripe\Service\PayoutService $payouts
 * @property \Churnsolution\Stripe\Service\PlanService $plans
 * @property \Churnsolution\Stripe\Service\PriceService $prices
 * @property \Churnsolution\Stripe\Service\ProductService $products
 * @property \Churnsolution\Stripe\Service\PromotionCodeService $promotionCodes
 * @property \Churnsolution\Stripe\Service\QuoteService $quotes
 * @property \Churnsolution\Stripe\Service\Radar\RadarServiceFactory $radar
 * @property \Churnsolution\Stripe\Service\RefundService $refunds
 * @property \Churnsolution\Stripe\Service\Reporting\ReportingServiceFactory $reporting
 * @property \Churnsolution\Stripe\Service\ReviewService $reviews
 * @property \Churnsolution\Stripe\Service\SetupAttemptService $setupAttempts
 * @property \Churnsolution\Stripe\Service\SetupIntentService $setupIntents
 * @property \Churnsolution\Stripe\Service\ShippingRateService $shippingRates
 * @property \Churnsolution\Stripe\Service\Sigma\SigmaServiceFactory $sigma
 * @property \Churnsolution\Stripe\Service\SourceService $sources
 * @property \Churnsolution\Stripe\Service\SubscriptionItemService $subscriptionItems
 * @property \Churnsolution\Stripe\Service\SubscriptionService $subscriptions
 * @property \Churnsolution\Stripe\Service\SubscriptionScheduleService $subscriptionSchedules
 * @property \Churnsolution\Stripe\Service\Tax\TaxServiceFactory $tax
 * @property \Churnsolution\Stripe\Service\TaxCodeService $taxCodes
 * @property \Churnsolution\Stripe\Service\TaxIdService $taxIds
 * @property \Churnsolution\Stripe\Service\TaxRateService $taxRates
 * @property \Churnsolution\Stripe\Service\Terminal\TerminalServiceFactory $terminal
 * @property \Churnsolution\Stripe\Service\TestHelpers\TestHelpersServiceFactory $testHelpers
 * @property \Churnsolution\Stripe\Service\TokenService $tokens
 * @property \Churnsolution\Stripe\Service\TopupService $topups
 * @property \Churnsolution\Stripe\Service\TransferService $transfers
 * @property \Churnsolution\Stripe\Service\Treasury\TreasuryServiceFactory $treasury
 * @property \Churnsolution\Stripe\Service\WebhookEndpointService $webhookEndpoints
 * // The end of the section generated from our OpenAPI spec
 */
class StripeClient extends BaseStripeClient
{
    /**
     * @var \Churnsolution\Stripe\Service\CoreServiceFactory
     */
    private $coreServiceFactory;

    public function __get($name)
    {
        return $this->getService($name);
    }

    public function getService($name)
    {
        if (null === $this->coreServiceFactory) {
            $this->coreServiceFactory = new \Churnsolution\Stripe\Service\CoreServiceFactory($this);
        }

        return $this->coreServiceFactory->getService($name);
    }
}
