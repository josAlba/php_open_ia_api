<?php

namespace Jos\OpenIaApi\Infrastructure;

interface ClientHttpInterface
{
    public function post(string $uri, string $body): string;
}