<?php

namespace Jos\OpenIaApi\Models;

use JMS\Serializer\SerializerBuilder;

abstract class AbstractModel
{
    protected const JSON = 'json';

    public function __toString(): string
    {
        return SerializerBuilder::create()->build()->serialize($this, self::JSON);
    }
}