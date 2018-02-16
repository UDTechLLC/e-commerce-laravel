<?php

declare(strict_types = 1);

namespace App\Services\PayPal;

use Omnipay\Omnipay;

/**
 * Class PayPalService.
 *
 * @package App\Services\PayPal
 */
class PayPalService
{
    const SANDBOX_MODE = 'sandbox';
    const LIVE_MODE    = 'live';

    /** @var \Omnipay\PayPal\ExpressGateway $gateway */
    public $gateway;

    /** @var array $parameters */
    protected $parameters = [];

    /** @var string $currency */
    protected $currency;

    /** @var int */
    protected $amount;

    /**
     * PayPalService constructor.
     */
    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Express');

        $this->setSettings();
    }

    /**
     * Set amount.
     *
     * @param int $amount
     */
    public function setAmount(int $amount)
    {
        $this->amount = $amount;

        $this->parameters['amount'] = (float) $this->amount;
    }

    /**
     * Set currency.
     *
     * @param $currency
     */
    public function setCurrency($currency = 'USD')
    {
        $this->currency = $currency;

        $this->parameters['currency'] = $this->currency;
    }

    /**
     * Get currency.
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Initial settings.
     */
    private function setSettings()
    {
        /** Sed pay-pal mode and credentials */
        $this->setCredentials();

        /** Set currency */
        $this->setCurrency();
    }

    /**
     * Set return url for paypal response.
     *
     * @param string $url
     */
    public function setReturnUrl(string $url)
    {
        $this->parameters['returnUrl'] = $url;
    }

    /**
     * Set cancel url for paypal response.
     *
     * @param string $url
     */
    public function setCancelUrl(string $url)
    {
        $this->parameters['cancelUrl'] = $url;
    }

    /**
     * Purchase order.
     *
     * @return \Omnipay\Common\Message\ResponseInterface
     */
    public function purchase()
    {
        $response = $this->gateway->purchase($this->parameters)->send();

        if ($response->isRedirect()) {
            return $response;
        }
    }

    /**
     * Complete purchase order.
     *
     * @return \Omnipay\Common\Message\ResponseInterface
     */
    public function completePurchase()
    {
        $response = $this->gateway->completePurchase($this->parameters)->send();

        if ($response->isSuccessful()) {
            return $response;
        }
    }

    /**
     * Set credentials for paypal request.
     */
    private function setCredentials()
    {
        $testMode = self::SANDBOX_MODE === config('paypal.mode');

        $config = $testMode
            ? config('paypal.sandbox')
            : config('paypal.live');

        $this->gateway->setUsername($config['username']);
        $this->gateway->setPassword($config['password']);
        $this->gateway->setSignature($config['secret']);

        $this->gateway->setTestMode($testMode);
    }
}
