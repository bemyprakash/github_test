<?php

declare(strict_types=1);

namespace App\Helpers;

final class PaymentGatewayExample
{
    public static function razorpayOrderPayload(float $amount, string $receipt): array
    {
        return [
            'amount' => (int) round($amount * 100),
            'currency' => 'INR',
            'receipt' => $receipt,
            'notes' => ['brand' => 'A. Prakash & Co.'],
        ];
    }

    public static function stripeIntentPayload(float $amount): array
    {
        return [
            'amount' => (int) round($amount * 100),
            'currency' => 'inr',
            'automatic_payment_methods' => ['enabled' => true],
        ];
    }
}
