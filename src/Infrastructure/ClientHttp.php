<?php

namespace Jos\OpenIaApi\Infrastructure;

use GuzzleHttp\Client;
use RuntimeException;
use Throwable;

class ClientHttp implements ClientHttpInterface
{
    private Client $client;

    /**
     * @param string $baseUri
     * @param array<string, string> $headers
     */
    public function __construct(string $baseUri, array $headers)
    {
        $this->client = new Client(['base_uri' => $baseUri, 'headers' => $headers,]);
    }

    /**
     * @param string $uri
     * @param string $body
     *
     * @return string
     */
    public function post(string $uri, string $body): string
    {
        try {
            $bodyResponse = $this->client->post(
                $uri,
                [
                    'body' => $body,
                ]
            );

            return $bodyResponse->getBody()->getContents();
        } catch (Throwable $exception) {
            throw new RuntimeException($exception->getMessage());
        }
    }

    /**
     * @param string $uri
     *
     * @return string
     */
    public function get(string $uri): string
    {
        try {
            $bodyResponse = $this->client->get($uri);

            return $bodyResponse->getBody()->getContents();
        } catch (Throwable $exception) {
            throw new RuntimeException($exception->getMessage());
        }
    }
}