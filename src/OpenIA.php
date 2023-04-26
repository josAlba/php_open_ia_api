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
    private const URI_API_OPENAI_COM_MODELS = 'models';

    protected ClientHttpInterface $client;

    public function __construct(string $token, ?string $organization = null)
    {
        $headers = [
            'Authorization' => 'Bearer '.$token,
            'Content-Type' => 'application/json',
        ];

        if ($organization !== null) {
            $headers['OpenAI-Organization'] = $organization;
        }

        $this->client = new ClientHttp(
            self::URI_API_OPENAI_COM_V_1,
            $headers
        );
    }

    /**
     * @return string
     */
    final public function getModels(): string
    {
        return $this->client->get(self::URI_API_OPENAI_COM_MODELS);
    }

    /**
     * @param MessageRequest $message
     *
     * @return MessageResponse
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
     */
    public function postMessage(MessageRequest $message): string
    {
        return $this->client->post(
            self::URI_API_OPENAI_COM_V_1_CHAT_COMPLETIONS,
            $message->__toString()
        );
    }
}