<?php

namespace Jos\OpenIaApi\Tests\Data\Client;

use Psr\Http\Message\StreamInterface;

class Stream implements StreamInterface
{
    private string $body;

    public function __construct(string $body)
    {
        $this->body = $body;
    }

    public function __toString(): string
    {
        return $this->body;
    }

    public function getContents(): string
    {
        return $this->body;
    }

    public function close(): void
    {
    }

    public function detach()
    {
    }

    public function getSize()
    {
    }

    public function tell()
    {
    }

    public function eof()
    {
    }

    public function isSeekable()
    {
    }

    public function seek($offset, $whence = SEEK_SET): void
    {
    }

    public function rewind(): void
    {
    }

    public function isWritable()
    {
    }

    public function write($string)
    {
    }

    public function isReadable()
    {
    }

    public function read($length)
    {
    }

    public function getMetadata($key = null)
    {
    }
}