<?php

namespace Jos\OpenIaApi;

use GuzzleHttp\Exception\GuzzleException;
use Jos\OpenIaApi\Infrastructure\ClientHttp;
use Jos\OpenIaApi\Infrastructure\ClientHttpInterface;
use Jos\OpenIaApi\Models\Request\Message as MessageRequest;
use Jos\OpenIaApi\Models\Response\Message as MessageResponse;

class OpenIA
{
    private const URI_API_OPENAI_COM_V_1 = 'https://api.openai.com/v1/';
    private const URI_API_OPENAI_COM_V_1_CHAT_COMPLETIONS = 'chat/completions';

    protected ClientHttpInterface $client;

    public function __construct(string $token, string $organization)
    {
        $this->client = new ClientHttp(
            self::URI_API_OPENAI_COM_V_1,
            [
                'Authorization' => 'Bearer '.$token,
                'OpenAI-Organization' => $organization,
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
        $bodyResponse = $this->postMessage($message);

        return MessageResponse::deserialize($bodyResponse);
    }

    /**
     * @param MessageRequest $message
     *
     * @return string
     * @throws GuzzleException
     */
    public function postMessage(MessageRequest $message): string
    {
        return $this->client->post(
            self::URI_API_OPENAI_COM_V_1_CHAT_COMPLETIONS,
            $message->__toString()
        );
    }
}