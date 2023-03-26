<?php

namespace Jos\OpenIaApi\Models\Request;

use Jos\OpenIaApi\Models\AbstractModel;
use JMS\Serializer\Annotation;

class MessageMessage extends AbstractModel
{
    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("role")
     */
    private string $role = 'user';

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("content")
     */
    private string $content;

    public function __construct(string $messages)
    {
        $this->content = $messages;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}