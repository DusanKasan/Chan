<?php

namespace DusanKasan\Chan\ValueObjects;

use DateTime;

class ThreadInfo
{
    /**
     * @var Post
     */
    private $firstPost;

    /**
     * @var int
     */
    private $replyCount;

    /**
     * @var int
     */
    private $imageCount;

    /**
     * @var string
     */
    private $semanticUrl;

    /**
     * @var int
     */
    private $uniqueIpCount;

    /**
     * Thread constructor.
     * @param Post $firstPost
     * @param int $replyCount
     * @param int $imageCount
     * @param string $semanticUrl
     * @param int $uniqueIpCount
     */
    public function __construct(
        Post $firstPost,
        int $replyCount,
        int $imageCount,
        string $semanticUrl,
        int $uniqueIpCount
    )
    {
        $this->firstPost = $firstPost;
        $this->replyCount = $replyCount;
        $this->imageCount = $imageCount;
        $this->semanticUrl = $semanticUrl;
        $this->uniqueIpCount = $uniqueIpCount;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->firstPost->getId();
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->firstPost->getCreatedAt();
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->firstPost->getTitle();
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->firstPost->getBody();
    }

    /**
     * @return string|null
     */
    public function getUserId()
    {
        return $this->firstPost->getUserId();
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->firstPost->getUsername();
    }

    /**
     * @return File|null
     */
    public function getFile()
    {
        return $this->firstPost->getFile();
    }

    /**
     * @return int
     */
    public function getReplyCount()
    {
        return $this->replyCount;
    }

    /**
     * @return int
     */
    public function getImageCount()
    {
        return $this->imageCount;
    }

    /**
     * @return string
     */
    public function getSemanticUrl()
    {
        return $this->semanticUrl;
    }

    /**
     * @return int
     */
    public function getUniqueIpCount()
    {
        return $this->uniqueIpCount;
    }
}
