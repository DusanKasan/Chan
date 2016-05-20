<?php

namespace DusanKasan\Chan\ValueObjects;

class File
{
    /**
     * @var string
     */
    private $filePath;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @var string
     */
    private $extension;

    /**
     * @var int
     */
    private $sizeInBytes;

    /**
     * @var string
     */
    private $thumbnailPath;

    /**
     * @var int
     */
    private $thumbnailWidth;

    /**
     * @var int
     */
    private $thumbnailHeight;

    public function __construct(
        string $filePath,
        int $width,
        int $height,
        string $extension,
        int $sizeInBytes,
        string $thumbnailPath,
        int $thumbnailWidth,
        int $thumbnailHeight
    )
    {
        $this->filePath = $filePath;
        $this->width = $width;
        $this->height = $height;
        $this->extension = $extension;
        $this->sizeInBytes = $sizeInBytes;
        $this->thumbnailPath = $thumbnailPath;
        $this->thumbnailWidth = $thumbnailWidth;
        $this->thumbnailHeight = $thumbnailHeight;
    }

    /**
     * @return string
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @return int
     */
    public function getSizeInBytes()
    {
        return $this->sizeInBytes;
    }

    /**
     * @return string
     */
    public function getThumbnailPath()
    {
        return $this->thumbnailPath;
    }

    /**
     * @return int
     */
    public function getThumbnailWidth()
    {
        return $this->thumbnailWidth;
    }

    /**
     * @return int
     */
    public function getThumbnailHeight()
    {
        return $this->thumbnailHeight;
    }
}
