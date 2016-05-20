<?php

namespace DusanKasan\Chan\ValueObjects;

class BoardLimits
{
    /**
     * @var int
     */
    private $maximumFilesizeInBytes;

    /**
     * @var int
     */
    private $maximumWebmFilesizeInBytes;

    /**
     * @var int
     */
    private $maximumCommentLength;

    /**
     * @var int
     */
    private $maximumWebmDurationInSeconds;

    /**
     * @var int
     */
    private $bumpLimit;

    /**
     * @var int
     */
    private $imageLimit;

    public function __construct(
        int $maximumFilesizeInBytes,
        int $maximumWebmFilesizeInBytes,
        int $maximumCommentLength,
        int $maximumWebmDurationInSeconds,
        int $bumpLimit,
        int $imageLimit
    )
    {
        $this->maximumFilesizeInBytes = $maximumFilesizeInBytes;
        $this->maximumWebmFilesizeInBytes = $maximumWebmFilesizeInBytes;
        $this->maximumCommentLength = $maximumCommentLength;
        $this->maximumWebmDurationInSeconds = $maximumWebmDurationInSeconds;
        $this->bumpLimit = $bumpLimit;
        $this->imageLimit = $imageLimit;
    }

    /**
     * @return int
     */
    public function getMaximumFilesizeInBytes()
    {
        return $this->maximumFilesizeInBytes;
    }

    /**
     * @return int
     */
    public function getMaximumWebmFilesizeInBytes()
    {
        return $this->maximumWebmFilesizeInBytes;
    }

    /**
     * @return int
     */
    public function getMaximumCommentLength()
    {
        return $this->maximumCommentLength;
    }

    /**
     * @return int
     */
    public function getMaximumWebmDurationInSeconds()
    {
        return $this->maximumWebmDurationInSeconds;
    }

    /**
     * @return int
     */
    public function getBumpLimit()
    {
        return $this->bumpLimit;
    }

    /**
     * @return int
     */
    public function getImageLimit()
    {
        return $this->imageLimit;
    }
}
