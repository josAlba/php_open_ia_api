<?php

namespace Jos\OpenIaApi\Tests\Data;

use GuzzleHttp\Client;
use Jos\OpenIaApi\OpenIA;

class OpenIATestData extends OpenIA
{
    public static function new(Client $client): self
    {
        $openIA = new self('','');
        $openIA->client = $client;

        return $openIA;
    }
}