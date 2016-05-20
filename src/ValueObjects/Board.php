<?php

namespace DusanKasan\Chan\ValueObjects;

class Board
{

    /**
     * @var string
     */
    private $abbreviation;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var BoardLimits
     */
    private $limits;

    /**
     * @var BoardCooldowns
     */
    private $cooldowns;

    /**
     * @var bool
     */
    private $worksafe;

    /**
     * @var bool
     */
    private $archived;

    /**
     * @var bool
     */
    private $userIds;

    /**
     * @var bool
     */
    private $forcedAnonymous;

    public function __construct(
        string $abbreviation,
        string $name,
        string $description,
        BoardLimits $limits,
        BoardCooldowns $cooldowns,
        bool $worksafe,
        bool $archived,
        bool $userIds,
        bool $forcedAnonymous
    )
    {
        $this->abbreviation = $abbreviation;
        $this->name = $name;
        $this->description = $description;
        $this->limits = $limits;
        $this->cooldowns = $cooldowns;
        $this->worksafe = $worksafe;
        $this->archived = $archived;
        $this->userIds = $userIds;
        $this->forcedAnonymous = $forcedAnonymous;
    }

    public function getAbbreviation() : string
    {
        return $this->abbreviation;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function isWorksafe() : bool
    {
        return $this->worksafe;
    }

    public function isArchived() : bool
    {
        return $this->archived;
    }

    public function usesUserIds() : bool
    {
        return $this->userIds;
    }

    public function forcesAnonymous() : bool
    {
        return $this->forcedAnonymous;
    }

    public function getThreadCooldownInSeconds() : int
    {
        return $this->cooldowns->getThreadCooldownInSeconds();
    }

    public function getReplyCooldownInSeconds() : int
    {
        return $this->cooldowns->getReplyCooldownInSeconds();
    }

    public function getImageCooldownInSeconds() : int
    {
        return $this->cooldowns->getImageCooldownInSeconds();
    }

    public function getMaximumFilesizeInBytes() : int
    {
        return $this->limits->getMaximumFilesizeInBytes();
    }

    public function getMaximumWebmFilesizeInBytes() : int
    {
        return $this->limits->getMaximumWebmFilesizeInBytes();
    }

    public function getMaximumCommentLength() : int
    {
        return $this->limits->getMaximumCommentLength();
    }

    public function getMaximumWebmDurationInSeconds() : int
    {
        return $this->limits->getMaximumWebmDurationInSeconds();
    }

    public function getBumpLimit() : int
    {
        return $this->limits->getBumpLimit();
    }

    public function getImageLimit() : int
    {
        return $this->limits->getImageLimit();
    }
}
