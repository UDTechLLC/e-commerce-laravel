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
    protected $gateway;

    /** @var array $parameters */
    protected $parameters = [];

    /** @var string $currency */
    protected $currency = 'USD';

    /** @var integer */
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
    public function setAmount(integer $amount)
    {
        $this->amount = $amount;

        $this->parameters['amount'] = $this->amount;
    }

    /**
     * Set currency.
     *
     * @param $currency
     */
    public function setCurrency($currency)
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

        /** Set callback url's */
        $this->setCallbacks();
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
