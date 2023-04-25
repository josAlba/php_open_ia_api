<?php

namespace Jos\OpenIaApi\Infrastructure;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ClientHttp implements ClientHttpInterface
{
    private Client $client;

    public function __construct(string $baseUri, array $headers)
    {
        $this->client = new Client(['base_uri' => $baseUri, 'header' => $headers,]);
    }

    /**
     * @param string $uri
     * @param string $body
     *
     * @return string
     * @throws GuzzleException
     */
    public function post(string $uri, string $body): string
    {
        $bodyResponse = $this->client->post(
            $uri,
            [
                'body' => $body,
            ]
        );

        return $bodyResponse->getBody()->getContents();
    }
}