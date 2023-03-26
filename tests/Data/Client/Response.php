<?php

namespace Jos\OpenIaApi\Tests\Data\Client;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class Response implements ResponseInterface
{
    private Stream $stream;

    public function __construct(string $body)
    {
        $this->stream = new Stream($body);
    }

    public function getBody(): StreamInterface
    {
        return $this->stream;
    }

    public function getProtocolVersion()
    {
    }

    public function withProtocolVersion($version)
    {
    }

    public function getHeaders()
    {
    }

    public function hasHeader($name)
    {
    }

    public function getHeader($name)
    {
    }

    public function getHeaderLine($name)
    {
    }

    public function withHeader($name, $value)
    {
    }

    public function withAddedHeader($name, $value)
    {
    }

    public function withoutHeader($name)
    {
    }

    public function withBody(StreamInterface $body)
    {
    }

    public function getStatusCode()
    {
    }

    public function withStatus($code, $reasonPhrase = '')
    {
    }

    public function getReasonPhrase()
    {
    }
}