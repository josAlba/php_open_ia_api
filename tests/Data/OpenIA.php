<?php

namespace Jos\OpenIaApi\Tests\Data;

use Jos\OpenIaApi\Models\Request\Message as MessageRequest;

class OpenIA extends \Jos\OpenIaApi\OpenIA
{
    private const TOKEN = '';
    private const ORGANIZATION = '';

    private string $responseTest;

    public static function new(string $response): self
    {
        $openIA = new self(self::TOKEN, self::ORGANIZATION);
        $openIA->responseTest = $response;

        return $openIA;
    }

    public function postMessage(MessageRequest $message): string
    {
        return $this->responseTest;
    }
}