<?php

namespace Jos\OpenIaApi\Models\Response;

use Jos\OpenIaApi\Models\AbstractModel;
use JMS\Serializer\Annotation;

class MessageChoices extends AbstractModel
{
    /**
     * @var int
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("index")
     */
    private int $index;

    /**
     * @var MessageChoicesMessage
     * @Annotation\Type("Jos\OpenIaApi\Models\Response\MessageChoicesMessage")
     * @Annotation\SerializedName("message")
     */
    private MessageChoicesMessage $message;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("finish_reason")
     */
    private string $finishReason;

    public function __construct(int $index, MessageChoicesMessage $message, string $finishReason)
    {
        $this->index = $index;
        $this->message = $message;
        $this->finishReason = $finishReason;
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function getMessage(): MessageChoicesMessage
    {
        return $this->message;
    }

    public function getFinishReason(): string
    {
        return $this->finishReason;
    }
}