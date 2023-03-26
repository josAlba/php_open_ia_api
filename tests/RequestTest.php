<?php

namespace Jos\OpenIaApi\Tests;

use Jos\OpenIaApi\Models\Request\Message;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    public function testBuild(): void
    {
        $result = (new Message('Hello!'))->__toString();

        $this->assertEquals('{"model":"gpt-3.5-turbo","messages":[{"role":"user","content":"Hello!"}]}', $result);
    }
}