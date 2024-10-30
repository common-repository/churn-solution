<?php

namespace Churnsolution\Stripe\Util;

class ObjectTypes
{
    /**
     * @var array Mapping from object types to resource classes
     */
    const mapping =
        [
            \Churnsolution\Stripe\Collection::OBJECT_NAME => \Churnsolution\Stripe\Collection::class,
            \Churnsolution\Stripe\Issuing\CardDetails::OBJECT_NAME => \Churnsolution\Stripe\Issuing\CardDetails::class,
            \Churnsolution\Stripe\SearchResult::OBJECT_NAME => \Churnsolution\Stripe\SearchResult::class,
            \Churnsolution\Stripe\File::OBJECT_NAME_ALT => \Churnsolution\Stripe\File::class,
            // object classes: The beginning of the section generated from our OpenAPI spec
            \Churnsolution\Stripe\Account::OBJECT_NAME => \Churnsolution\Stripe\Account::class,
            \Churnsolution\Stripe\AccountLink::OBJECT_NAME => \Churnsolution\Stripe\AccountLink::class,
            \Churnsolution\Stripe\AccountSession::OBJECT_NAME => \Churnsolution\Stripe\AccountSession::class,
            \Churnsolution\Stripe\ApplePayDomain::OBJECT_NAME => \Churnsolution\Stripe\ApplePayDomain::class,
            \Churnsolution\Stripe\Application::OBJECT_NAME => \Churnsolution\Stripe\Application::class,
            \Churnsolution\Stripe\ApplicationFee::OBJECT_NAME => \Churnsolution\Stripe\ApplicationFee::class,
            \Churnsolution\Stripe\ApplicationFeeRefund::OBJECT_NAME => \Churnsolution\Stripe\ApplicationFeeRefund::class,
            \Churnsolution\Stripe\Apps\Secret::OBJECT_NAME => \Churnsolution\Stripe\Apps\Secret::class,
            \Churnsolution\Stripe\Balance::OBJECT_NAME => \Churnsolution\Stripe\Balance::class,
            \Churnsolution\Stripe\BalanceTransaction::OBJECT_NAME => \Churnsolution\Stripe\BalanceTransaction::class,
            \Churnsolution\Stripe\BankAccount::OBJECT_NAME => \Churnsolution\Stripe\BankAccount::class,
            \Churnsolution\Stripe\Billing\Alert::OBJECT_NAME => \Churnsolution\Stripe\Billing\Alert::class,
            \Churnsolution\Stripe\Billing\AlertTriggered::OBJECT_NAME => \Churnsolution\Stripe\Billing\AlertTriggered::class,
            \Churnsolution\Stripe\Billing\Meter::OBJECT_NAME => \Churnsolution\Stripe\Billing\Meter::class,
            \Churnsolution\Stripe\Billing\MeterEvent::OBJECT_NAME => \Churnsolution\Stripe\Billing\MeterEvent::class,
            \Churnsolution\Stripe\Billing\MeterEventAdjustment::OBJECT_NAME => \Churnsolution\Stripe\Billing\MeterEventAdjustment::class,
            \Churnsolution\Stripe\Billing\MeterEventSummary::OBJECT_NAME => \Churnsolution\Stripe\Billing\MeterEventSummary::class,
            \Churnsolution\Stripe\BillingPortal\Configuration::OBJECT_NAME => \Churnsolution\Stripe\BillingPortal\Configuration::class,
            \Churnsolution\Stripe\BillingPortal\Session::OBJECT_NAME => \Churnsolution\Stripe\BillingPortal\Session::class,
            \Churnsolution\Stripe\Capability::OBJECT_NAME => \Churnsolution\Stripe\Capability::class,
            \Churnsolution\Stripe\Card::OBJECT_NAME => \Churnsolution\Stripe\Card::class,
            \Churnsolution\Stripe\CashBalance::OBJECT_NAME => \Churnsolution\Stripe\CashBalance::class,
            \Churnsolution\Stripe\Charge::OBJECT_NAME => \Churnsolution\Stripe\Charge::class,
            \Churnsolution\Stripe\Checkout\Session::OBJECT_NAME => \Churnsolution\Stripe\Checkout\Session::class,
            \Churnsolution\Stripe\Climate\Order::OBJECT_NAME => \Churnsolution\Stripe\Climate\Order::class,
            \Churnsolution\Stripe\Climate\Product::OBJECT_NAME => \Churnsolution\Stripe\Climate\Product::class,
            \Churnsolution\Stripe\Climate\Supplier::OBJECT_NAME => \Churnsolution\Stripe\Climate\Supplier::class,
            \Churnsolution\Stripe\ConfirmationToken::OBJECT_NAME => \Churnsolution\Stripe\ConfirmationToken::class,
            \Churnsolution\Stripe\ConnectCollectionTransfer::OBJECT_NAME => \Churnsolution\Stripe\ConnectCollectionTransfer::class,
            \Churnsolution\Stripe\CountrySpec::OBJECT_NAME => \Churnsolution\Stripe\CountrySpec::class,
            \Churnsolution\Stripe\Coupon::OBJECT_NAME => \Churnsolution\Stripe\Coupon::class,
            \Churnsolution\Stripe\CreditNote::OBJECT_NAME => \Churnsolution\Stripe\CreditNote::class,
            \Churnsolution\Stripe\CreditNoteLineItem::OBJECT_NAME => \Churnsolution\Stripe\CreditNoteLineItem::class,
            \Churnsolution\Stripe\Customer::OBJECT_NAME => \Churnsolution\Stripe\Customer::class,
            \Churnsolution\Stripe\CustomerBalanceTransaction::OBJECT_NAME => \Churnsolution\Stripe\CustomerBalanceTransaction::class,
            \Churnsolution\Stripe\CustomerCashBalanceTransaction::OBJECT_NAME => \Churnsolution\Stripe\CustomerCashBalanceTransaction::class,
            \Churnsolution\Stripe\CustomerSession::OBJECT_NAME => \Churnsolution\Stripe\CustomerSession::class,
            \Churnsolution\Stripe\Discount::OBJECT_NAME => \Churnsolution\Stripe\Discount::class,
            \Churnsolution\Stripe\Dispute::OBJECT_NAME => \Churnsolution\Stripe\Dispute::class,
            \Churnsolution\Stripe\Entitlements\ActiveEntitlement::OBJECT_NAME => \Churnsolution\Stripe\Entitlements\ActiveEntitlement::class,
            \Churnsolution\Stripe\Entitlements\ActiveEntitlementSummary::OBJECT_NAME => \Churnsolution\Stripe\Entitlements\ActiveEntitlementSummary::class,
            \Churnsolution\Stripe\Entitlements\Feature::OBJECT_NAME => \Churnsolution\Stripe\Entitlements\Feature::class,
            \Churnsolution\Stripe\EphemeralKey::OBJECT_NAME => \Churnsolution\Stripe\EphemeralKey::class,
            \Churnsolution\Stripe\Event::OBJECT_NAME => \Churnsolution\Stripe\Event::class,
            \Churnsolution\Stripe\ExchangeRate::OBJECT_NAME => \Churnsolution\Stripe\ExchangeRate::class,
            \Churnsolution\Stripe\File::OBJECT_NAME => \Churnsolution\Stripe\File::class,
            \Churnsolution\Stripe\FileLink::OBJECT_NAME => \Churnsolution\Stripe\FileLink::class,
            \Churnsolution\Stripe\FinancialConnections\Account::OBJECT_NAME => \Churnsolution\Stripe\FinancialConnections\Account::class,
            \Churnsolution\Stripe\FinancialConnections\AccountOwner::OBJECT_NAME => \Churnsolution\Stripe\FinancialConnections\AccountOwner::class,
            \Churnsolution\Stripe\FinancialConnections\AccountOwnership::OBJECT_NAME => \Churnsolution\Stripe\FinancialConnections\AccountOwnership::class,
            \Churnsolution\Stripe\FinancialConnections\Session::OBJECT_NAME => \Churnsolution\Stripe\FinancialConnections\Session::class,
            \Churnsolution\Stripe\FinancialConnections\Transaction::OBJECT_NAME => \Churnsolution\Stripe\FinancialConnections\Transaction::class,
            \Churnsolution\Stripe\Forwarding\Request::OBJECT_NAME => \Churnsolution\Stripe\Forwarding\Request::class,
            \Churnsolution\Stripe\FundingInstructions::OBJECT_NAME => \Churnsolution\Stripe\FundingInstructions::class,
            \Churnsolution\Stripe\Identity\VerificationReport::OBJECT_NAME => \Churnsolution\Stripe\Identity\VerificationReport::class,
            \Churnsolution\Stripe\Identity\VerificationSession::OBJECT_NAME => \Churnsolution\Stripe\Identity\VerificationSession::class,
            \Churnsolution\Stripe\Invoice::OBJECT_NAME => \Churnsolution\Stripe\Invoice::class,
            \Churnsolution\Stripe\InvoiceItem::OBJECT_NAME => \Churnsolution\Stripe\InvoiceItem::class,
            \Churnsolution\Stripe\InvoiceLineItem::OBJECT_NAME => \Churnsolution\Stripe\InvoiceLineItem::class,
            \Churnsolution\Stripe\Issuing\Authorization::OBJECT_NAME => \Churnsolution\Stripe\Issuing\Authorization::class,
            \Churnsolution\Stripe\Issuing\Card::OBJECT_NAME => \Churnsolution\Stripe\Issuing\Card::class,
            \Churnsolution\Stripe\Issuing\Cardholder::OBJECT_NAME => \Churnsolution\Stripe\Issuing\Cardholder::class,
            \Churnsolution\Stripe\Issuing\Dispute::OBJECT_NAME => \Churnsolution\Stripe\Issuing\Dispute::class,
            \Churnsolution\Stripe\Issuing\PersonalizationDesign::OBJECT_NAME => \Churnsolution\Stripe\Issuing\PersonalizationDesign::class,
            \Churnsolution\Stripe\Issuing\PhysicalBundle::OBJECT_NAME => \Churnsolution\Stripe\Issuing\PhysicalBundle::class,
            \Churnsolution\Stripe\Issuing\Token::OBJECT_NAME => \Churnsolution\Stripe\Issuing\Token::class,
            \Churnsolution\Stripe\Issuing\Transaction::OBJECT_NAME => \Churnsolution\Stripe\Issuing\Transaction::class,
            \Churnsolution\Stripe\LineItem::OBJECT_NAME => \Churnsolution\Stripe\LineItem::class,
            \Churnsolution\Stripe\LoginLink::OBJECT_NAME => \Churnsolution\Stripe\LoginLink::class,
            \Churnsolution\Stripe\Mandate::OBJECT_NAME => \Churnsolution\Stripe\Mandate::class,
            \Churnsolution\Stripe\PaymentIntent::OBJECT_NAME => \Churnsolution\Stripe\PaymentIntent::class,
            \Churnsolution\Stripe\PaymentLink::OBJECT_NAME => \Churnsolution\Stripe\PaymentLink::class,
            \Churnsolution\Stripe\PaymentMethod::OBJECT_NAME => \Churnsolution\Stripe\PaymentMethod::class,
            \Churnsolution\Stripe\PaymentMethodConfiguration::OBJECT_NAME => \Churnsolution\Stripe\PaymentMethodConfiguration::class,
            \Churnsolution\Stripe\PaymentMethodDomain::OBJECT_NAME => \Churnsolution\Stripe\PaymentMethodDomain::class,
            \Churnsolution\Stripe\Payout::OBJECT_NAME => \Churnsolution\Stripe\Payout::class,
            \Churnsolution\Stripe\Person::OBJECT_NAME => \Churnsolution\Stripe\Person::class,
            \Churnsolution\Stripe\Plan::OBJECT_NAME => \Churnsolution\Stripe\Plan::class,
            \Churnsolution\Stripe\Price::OBJECT_NAME => \Churnsolution\Stripe\Price::class,
            \Churnsolution\Stripe\Product::OBJECT_NAME => \Churnsolution\Stripe\Product::class,
            \Churnsolution\Stripe\ProductFeature::OBJECT_NAME => \Churnsolution\Stripe\ProductFeature::class,
            \Churnsolution\Stripe\PromotionCode::OBJECT_NAME => \Churnsolution\Stripe\PromotionCode::class,
            \Churnsolution\Stripe\Quote::OBJECT_NAME => \Churnsolution\Stripe\Quote::class,
            \Churnsolution\Stripe\Radar\EarlyFraudWarning::OBJECT_NAME => \Churnsolution\Stripe\Radar\EarlyFraudWarning::class,
            \Churnsolution\Stripe\Radar\ValueList::OBJECT_NAME => \Churnsolution\Stripe\Radar\ValueList::class,
            \Churnsolution\Stripe\Radar\ValueListItem::OBJECT_NAME => \Churnsolution\Stripe\Radar\ValueListItem::class,
            \Churnsolution\Stripe\Refund::OBJECT_NAME => \Churnsolution\Stripe\Refund::class,
            \Churnsolution\Stripe\Reporting\ReportRun::OBJECT_NAME => \Churnsolution\Stripe\Reporting\ReportRun::class,
            \Churnsolution\Stripe\Reporting\ReportType::OBJECT_NAME => \Churnsolution\Stripe\Reporting\ReportType::class,
            \Churnsolution\Stripe\ReserveTransaction::OBJECT_NAME => \Churnsolution\Stripe\ReserveTransaction::class,
            \Churnsolution\Stripe\Review::OBJECT_NAME => \Churnsolution\Stripe\Review::class,
            \Churnsolution\Stripe\SetupAttempt::OBJECT_NAME => \Churnsolution\Stripe\SetupAttempt::class,
            \Churnsolution\Stripe\SetupIntent::OBJECT_NAME => \Churnsolution\Stripe\SetupIntent::class,
            \Churnsolution\Stripe\ShippingRate::OBJECT_NAME => \Churnsolution\Stripe\ShippingRate::class,
            \Churnsolution\Stripe\Sigma\ScheduledQueryRun::OBJECT_NAME => \Churnsolution\Stripe\Sigma\ScheduledQueryRun::class,
            \Churnsolution\Stripe\Source::OBJECT_NAME => \Churnsolution\Stripe\Source::class,
            \Churnsolution\Stripe\SourceMandateNotification::OBJECT_NAME => \Churnsolution\Stripe\SourceMandateNotification::class,
            \Churnsolution\Stripe\SourceTransaction::OBJECT_NAME => \Churnsolution\Stripe\SourceTransaction::class,
            \Churnsolution\Stripe\Subscription::OBJECT_NAME => \Churnsolution\Stripe\Subscription::class,
            \Churnsolution\Stripe\SubscriptionItem::OBJECT_NAME => \Churnsolution\Stripe\SubscriptionItem::class,
            \Churnsolution\Stripe\SubscriptionSchedule::OBJECT_NAME => \Churnsolution\Stripe\SubscriptionSchedule::class,
            \Churnsolution\Stripe\Tax\Calculation::OBJECT_NAME => \Churnsolution\Stripe\Tax\Calculation::class,
            \Churnsolution\Stripe\Tax\CalculationLineItem::OBJECT_NAME => \Churnsolution\Stripe\Tax\CalculationLineItem::class,
            \Churnsolution\Stripe\Tax\Registration::OBJECT_NAME => \Churnsolution\Stripe\Tax\Registration::class,
            \Churnsolution\Stripe\Tax\Settings::OBJECT_NAME => \Churnsolution\Stripe\Tax\Settings::class,
            \Churnsolution\Stripe\Tax\Transaction::OBJECT_NAME => \Churnsolution\Stripe\Tax\Transaction::class,
            \Churnsolution\Stripe\Tax\TransactionLineItem::OBJECT_NAME => \Churnsolution\Stripe\Tax\TransactionLineItem::class,
            \Churnsolution\Stripe\TaxCode::OBJECT_NAME => \Churnsolution\Stripe\TaxCode::class,
            \Churnsolution\Stripe\TaxDeductedAtSource::OBJECT_NAME => \Churnsolution\Stripe\TaxDeductedAtSource::class,
            \Churnsolution\Stripe\TaxId::OBJECT_NAME => \Churnsolution\Stripe\TaxId::class,
            \Churnsolution\Stripe\TaxRate::OBJECT_NAME => \Churnsolution\Stripe\TaxRate::class,
            \Churnsolution\Stripe\Terminal\Configuration::OBJECT_NAME => \Churnsolution\Stripe\Terminal\Configuration::class,
            \Churnsolution\Stripe\Terminal\ConnectionToken::OBJECT_NAME => \Churnsolution\Stripe\Terminal\ConnectionToken::class,
            \Churnsolution\Stripe\Terminal\Location::OBJECT_NAME => \Churnsolution\Stripe\Terminal\Location::class,
            \Churnsolution\Stripe\Terminal\Reader::OBJECT_NAME => \Churnsolution\Stripe\Terminal\Reader::class,
            \Churnsolution\Stripe\TestHelpers\TestClock::OBJECT_NAME => \Churnsolution\Stripe\TestHelpers\TestClock::class,
            \Churnsolution\Stripe\Token::OBJECT_NAME => \Churnsolution\Stripe\Token::class,
            \Churnsolution\Stripe\Topup::OBJECT_NAME => \Churnsolution\Stripe\Topup::class,
            \Churnsolution\Stripe\Transfer::OBJECT_NAME => \Churnsolution\Stripe\Transfer::class,
            \Churnsolution\Stripe\TransferReversal::OBJECT_NAME => \Churnsolution\Stripe\TransferReversal::class,
            \Churnsolution\Stripe\Treasury\CreditReversal::OBJECT_NAME => \Churnsolution\Stripe\Treasury\CreditReversal::class,
            \Churnsolution\Stripe\Treasury\DebitReversal::OBJECT_NAME => \Churnsolution\Stripe\Treasury\DebitReversal::class,
            \Churnsolution\Stripe\Treasury\FinancialAccount::OBJECT_NAME => \Churnsolution\Stripe\Treasury\FinancialAccount::class,
            \Churnsolution\Stripe\Treasury\FinancialAccountFeatures::OBJECT_NAME => \Churnsolution\Stripe\Treasury\FinancialAccountFeatures::class,
            \Churnsolution\Stripe\Treasury\InboundTransfer::OBJECT_NAME => \Churnsolution\Stripe\Treasury\InboundTransfer::class,
            \Churnsolution\Stripe\Treasury\OutboundPayment::OBJECT_NAME => \Churnsolution\Stripe\Treasury\OutboundPayment::class,
            \Churnsolution\Stripe\Treasury\OutboundTransfer::OBJECT_NAME => \Churnsolution\Stripe\Treasury\OutboundTransfer::class,
            \Churnsolution\Stripe\Treasury\ReceivedCredit::OBJECT_NAME => \Churnsolution\Stripe\Treasury\ReceivedCredit::class,
            \Churnsolution\Stripe\Treasury\ReceivedDebit::OBJECT_NAME => \Churnsolution\Stripe\Treasury\ReceivedDebit::class,
            \Churnsolution\Stripe\Treasury\Transaction::OBJECT_NAME => \Churnsolution\Stripe\Treasury\Transaction::class,
            \Churnsolution\Stripe\Treasury\TransactionEntry::OBJECT_NAME => \Churnsolution\Stripe\Treasury\TransactionEntry::class,
            \Churnsolution\Stripe\UsageRecord::OBJECT_NAME => \Churnsolution\Stripe\UsageRecord::class,
            \Churnsolution\Stripe\UsageRecordSummary::OBJECT_NAME => \Churnsolution\Stripe\UsageRecordSummary::class,
            \Churnsolution\Stripe\WebhookEndpoint::OBJECT_NAME => \Churnsolution\Stripe\WebhookEndpoint::class,
            // object classes: The end of the section generated from our OpenAPI spec
        ];
}