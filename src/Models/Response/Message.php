<?php

namespace Jos\OpenIaApi\Models\Response;

use Exception;
use JMS\Serializer\Annotation;
use JMS\Serializer\SerializerBuilder;
use Jos\OpenIaApi\Models\AbstractModel;

class Message extends AbstractModel
{
    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private string $id;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("object")
     */
    private string $object;

    /**
     * @var int
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("created")
     */
    private int $created;

    /**
     * @var array<MessageChoices>
     * @Annotation\Type("array<Jos\OpenIaApi\Models\Response\MessageChoices>")
     * @Annotation\SerializedName("choices")
     */
    private array $choices = [];

    /**
     * @var MessageUsage
     * @Annotation\Type("Jos\OpenIaApi\Models\Response\MessageUsage")
     * @Annotation\SerializedName("usage")
     */
    private MessageUsage $usage;

    /**
     * @param string $id
     * @param string $object
     * @param int $created
     * @param array<MessageChoices> $choices
     * @param MessageUsage $usage
     */
    public function __construct(string $id, string $object, int $created, array $choices, MessageUsage $usage)
    {
        $this->id = $id;
        $this->object = $object;
        $this->created = $created;
        $this->choices = $choices;
        $this->usage = $usage;
    }

    public static function deserialize(string $json): self
    {
        /** @var self $message */
        $message = SerializerBuilder::create()->build()->deserialize($json, self::class, self::JSON);

        return $message;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getObject(): string
    {
        return $this->object;
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    public function getChoices(): array
    {
        return $this->choices;
    }

    public function getUsage(): MessageUsage
    {
        return $this->usage;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function __toString(): string
    {
        if (empty($this->choices)) {
            throw new Exception('Message is empty');
        }

        /** @var MessageChoices $message */
        $message = current($this->choices);

        return $message->getMessage();
    }
}