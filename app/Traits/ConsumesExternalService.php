<?php

namespace App\Traits;

// Include the Guzzle Component Library
use GuzzleHttp\Client;

trait ConsumesExternalService
{
    /**
     * Send a request to any service
     *
     * @param string $method HTTP method (GET, POST, etc.)
     * @param string $requestUrl The endpoint URL
     * @param array $form_params (Optional) Form parameters
     * @param array $headers (Optional) Headers for the request
     * @return string Response body content
     */
    public function performRequest($method, $requestUrl, $form_params = [], $headers = [])
    {
    $client = new Client(['base_uri' => $this->baseUri]);

    $response = $client->request($method, $requestUrl, [
        'form_params' => $form_params,
        'headers' => $headers,
    ]);

    // Decode JSON before returning
    return json_decode($response->getBody()->getContents(), true);
}

}