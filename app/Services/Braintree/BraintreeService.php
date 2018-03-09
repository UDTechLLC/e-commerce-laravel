<?php

declare(strict_types = 1);

namespace App\Services\Braintree;

use Braintree\Gateway;

/**
 * Class BraintreeService.
 *
 * @package App\Services\Braintree
 */
class BraintreeService
{
    protected $gateway;

    protected $authToken;

    public function __construct()
    {
        $this->gateway = new Gateway(config('braintree'));
    }

    public function getToken()
    {
        return $this->gateway->clientToken()->generate();
    }

    public function setAuthToken(string $token)
    {
        $this->authToken = $token;
    }

    public function pay($amount)
    {
        return $this->gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $this->authToken,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
    }
}
