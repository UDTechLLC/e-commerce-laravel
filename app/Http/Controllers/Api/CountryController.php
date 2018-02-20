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
        $defaultCountry = $this->getDefaultCountry($request->ip());

        return response()->json(['countries' => $countries, 'default' => $defaultCountry]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStates(Request $request)
    {
        $country = ucfirst($request->get('country'));

        $states = Countries::where('name.common', $country)
            ->first()
            ->hydrateStates()
            ->states
            ->sortBy('name')
            ->pluck('name');

        return response()->json(['states' => $states]);
    }

    /**
     * Get country by ip.
     *
     * @param $ip
     *
     * @return mixed
     */
    private function getDefaultCountry($ip)
    {
        $http = new Client();

        $response = $this->decodeResponse($http->get("http://ip-api.com/json/{$ip}"));

        return isset($response->country) ?: 'United States';
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
}
