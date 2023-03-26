<?php

namespace Jos\OpenIaApi\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Jos\OpenIaApi\Models\Request\Message;
use Jos\OpenIaApi\Tests\Data\Client\Response;
use Jos\OpenIaApi\Tests\Data\OpenIATestData;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class OpenIATest extends TestCase
{
    /**
     * @return void
     * @throws Exception
     * @throws GuzzleException
     */
    public function testPost(): void
    {
        $bodyResponse = <<<json
{
  "id": "chatcmpl-123",
  "object": "chat.completion",
  "created": 1677652288,
  "choices": [{
    "index": 0,
    "message": {
      "role": "assistant",
      "content": "Hello there, how may I assist you today?"
    },
    "finish_reason": "stop"
  }],
  "usage": {
    "prompt_tokens": 9,
    "completion_tokens": 12,
    "total_tokens": 21
  }
}
json;
        $client = $this->createMock(Client::class);
        $response = new Response($bodyResponse);

        $client->method('post')
            ->willReturn($response);

        $openIA = OpenIATestData::new($client);

        $responsePost = $openIA->post(new Message('Hello!'));

        $this->assertEquals('Hello there, how may I assist you today?', $responsePost->__toString());
    }
}