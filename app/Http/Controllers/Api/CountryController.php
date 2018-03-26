<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PragmaRX\Countries\Package\Countries;

class CountryController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $countries = Countries::all()->pluck('name.common');
        $name = $request->get('country');
        $ip = $request->ip();

        $country = $name ?? $this->getCountry($ip);
        
        $shippingSum = $this->getShippingSum($country);

        return response()->json([
            'countries' => $countries,
            'states'    => $this->getStates($country),
            'shipping'  => $shippingSum,
            'selected'  => $country,
        ]);
    }

    /**
     * @param string $country
     *
     * @return array
     */
    public function getStates(string $country)
    {
        \Log::info('CountryController@getStates: ', ['country' => $country]);

        $states = Countries::where('name.common', $country)
            ->first()
            ->hydrateStates()
            ->states
            ->sortBy('name')
            ->pluck('name');

        return $states;
    }

    /**
     * Get country by ip.
     *
     * @param $ip
     *
     * @return mixed
     */
    private function getCountry($ip)
    {
        $http = new Client();

        $response = $this->decodeResponse($http->get("http://ip-api.com/json/{$ip}"));
        
        return $response->country ?? 'United States';
    }

    /**
     * Decode response.
     *
     * @param $response
     *
     * @return mixed
     */
    private function decodeResponse($response)
    {
        return json_decode((string)$response->getBody());
    }

    /**
     * Get shipping sum by country.
     *
     * @param null $country
     *
     * @return float
     */
    private function getShippingSum($country)
    {
        return $country === 'United States'
            ? 6.99
            : 17.99;
    }
}
