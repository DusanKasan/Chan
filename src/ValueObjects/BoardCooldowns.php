<?php

namespace DusanKasan\Chan\ValueObjects;

class BoardCooldowns
{
    /**
     * @var int
     */
    private $threadCooldownInSeconds;
    /**
     * @var int
     */
    private $replyCooldownInSeconds;
    /**
     * @var int
     */
    private $imageCooldownInSeconds;

    public function __construct(
        int $threadCooldownInSeconds,
        int $replyCooldownInSeconds,
        int $imageCooldownInSeconds
    )
    {
        $this->threadCooldownInSeconds = $threadCooldownInSeconds;
        $this->replyCooldownInSeconds = $replyCooldownInSeconds;
        $this->imageCooldownInSeconds = $imageCooldownInSeconds;
    }

    /**
     * @return int
     */
    public function getThreadCooldownInSeconds()
    {
        return $this->threadCooldownInSeconds;
    }

    /**
     * @return int
     */
    public function getReplyCooldownInSeconds()
    {
        return $this->replyCooldownInSeconds;
    }

    /**
     * @return int
     */
    public function getImageCooldownInSeconds()
    {
        return $this->imageCooldownInSeconds;
    }
}
