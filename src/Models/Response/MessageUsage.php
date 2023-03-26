<?php

namespace Jos\OpenIaApi\Models\Response;

use Jos\OpenIaApi\Models\AbstractModel;
use JMS\Serializer\Annotation;

class MessageUsage extends AbstractModel
{
    /**
     * @var int
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("prompt_tokens")
     */
    private int $promptTokens;

    /**
     * @var int
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("completion_tokens")
     */
    private int $completionTokens;

    /**
     * @var int
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("total_tokens")
     */
    private int $totalTokens;

    /**
     * @param int $promptTokens
     * @param int $completionTokens
     * @param int $totalTokens
     */
    public function __construct(int $promptTokens, int $completionTokens, int $totalTokens)
    {
        $this->promptTokens = $promptTokens;
        $this->completionTokens = $completionTokens;
        $this->totalTokens = $totalTokens;
    }

    public function getPromptTokens(): int
    {
        return $this->promptTokens;
    }

    public function getCompletionTokens(): int
    {
        return $this->completionTokens;
    }

    public function getTotalTokens(): int
    {
        return $this->totalTokens;
    }
}