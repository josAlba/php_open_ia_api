<?php

namespace Jos\OpenIaApi\Tests;

use JMS\Serializer\SerializerBuilder;
use Jos\OpenIaApi\Models\Response\Message;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    public function testDeserialize(): void
    {
        $response = <<<json
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

        $result = Message::deserialize($response);

        $this->assertEquals("Hello there, how may I assist you today?", $result->__toString());
    }
}