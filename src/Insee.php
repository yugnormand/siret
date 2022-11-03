<?php

namespace Todocoding\Siret;

use GuzzleHttp\Client;

class Insee
{
    public function access_token()
    {
        // Base64 encode consumer key and secret
        $token = base64_encode(config('insee.consumer_key').':'.config('insee.consumer_secret'));

        // Request access token from Insee
        $client = new Client();
        $result = $client->post('https://api.insee.fr/token', [
            'headers' => [
                'Content-Type'  => 'application/x-www-form-urlencoded',
                'Authorization' => 'Basic '.$token,
            ],
            'form_params' => [
                'grant_type' => 'client_credentials',
            ],
        ]);

        $result = json_decode($result->getBody());

        return $result->access_token;
    }

    public function get($type, $number)
    {
        // Format number
        $number = str_replace(' ', '', $number);

        // Fetch company information from Insee
        $client = new Client();
        $result = $client->get('https://api.insee.fr/entreprises/sirene/V3/'.$type.'/'.$number, [
            'headers' => [
                'Authorization' => 'Bearer '.$this->access_token(),
            ],
            'http_errors' => false,
        ]);

        return json_decode($result->getBody());
    }

    public function siren($siren)
    {
        return $this->get('siren', $siren);
    }

    public function siret($siret)
    {
        return $this->get('siret', $siret);
    }
}
