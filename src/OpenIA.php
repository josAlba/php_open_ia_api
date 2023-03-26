<?php

namespace Jos\OpenIaApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Jos\OpenIaApi\Models\Request\Message as MessageRequest;
use Jos\OpenIaApi\Models\Response\Message as MessageResponse;

class OpenIA
{
    private const URI_API_OPENAI_COM_V_1 = 'https://api.openai.com/v1/';
    private const URI_API_OPENAI_COM_V_1_CHAT_COMPLETIONS = 'chat/completions';

    protected Client $client;

    public function __construct(string $token, string $organization)
    {
        $this->client = new Client(
            [
                'base_uri' => self::URI_API_OPENAI_COM_V_1,
                'header' => [
                    'Authorization' => 'Bearer '.$token,
                    'OpenAI-Organization' => $organization,
                ],
            ]
        );
    }

    /**
     * @param MessageRequest $message
     *
     * @return MessageResponse
     * @throws GuzzleException
     */
    final public function post(MessageRequest $message): MessageResponse
    {
        $bodyResponse = $this->client->post(
            self::URI_API_OPENAI_COM_V_1_CHAT_COMPLETIONS,
            [
                'body' => $message->__toString(),
            ]
        );

        return MessageResponse::deserialize($bodyResponse->getBody()->getContents());
    }
}