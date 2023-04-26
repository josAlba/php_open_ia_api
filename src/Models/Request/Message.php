<?php

namespace Jos\OpenIaApi\Models\Request;

use JMS\Serializer\Annotation;
use Jos\OpenIaApi\Models\AbstractModel;

class Message extends AbstractModel
{
    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("model")
     */
    private string $model = 'gpt-3.5-turbo';

    /**
     * @var float|null
     * @Annotation\Type("string")
     * @Annotation\SerializedName("temperature")
     */
    private ?float $temperature = null;

    /**
     * @var array<MessageMessage>
     * @Annotation\Type("array<Jos\OpenIaApi\Models\Request\MessageMessage>")
     * @Annotation\SerializedName("messages")
     */
    private array $messages;

    public function __construct(string ...$messages)
    {
        foreach ($messages as $message) {
            $this->messages = [new MessageMessage($message)];
        }
    }

    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return array<MessageMessage>
     */
    public function getMessages(): array
    {
        return $this->messages;
    }
}