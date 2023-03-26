<?php

namespace Jos\OpenIaApi\Models\Response;

use Jos\OpenIaApi\Models\AbstractModel;
use JMS\Serializer\Annotation;

class MessageChoicesMessage extends AbstractModel
{
    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("role")
     */
    private string $role;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("content")
     */
    private string $content;

    public function __construct(string $role, string $content)
    {
        $this->role = $role;
        $this->content = $content;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function __toString(): string
    {
        return $this->content;
    }
}