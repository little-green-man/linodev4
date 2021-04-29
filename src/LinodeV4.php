<?php

namespace LittleGreenMan\LinodeV4;

use GuzzleHttp\Client;
use Locale;

class LinodeV4
{
    private string $api_key;

    public function __construct()
    {
        $this->api_key = config('linodev4.api_key');
    }

    public function getRegions()
    {
        $client      = new Client();
        $url         = 'https://api.linode.com/v4/regions';

        $params = [
            //If you have any Params Pass here
        ];

        $headers = [
            'Bearer' => $this->api_key,
        ];

        $response = $client->request('GET', $url, [
            // 'json' => $params,
            'headers' => $headers,
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        $regions = collect($responseBody->data)->map(function ($region) {
            $region->countryName =  Locale::getDisplayRegion('-' . $region->country);

            return $region;
        });

        return $regions;
    }
}
