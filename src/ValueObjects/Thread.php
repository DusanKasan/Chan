<?php

namespace DusanKasan\Chan\ValueObjects;

use DateTime;

class Thread
{
    /**
     * @var Post[]
     */
    private $posts;

    /**
     * @var ThreadInfo
     */
    private $threadInfo;

    /**
     * @param ThreadInfo $threadInfo
     * @param Post[] $posts
     */
    public function __construct(ThreadInfo $threadInfo, $posts)
    {
        $this->posts = $posts;
        $this->threadInfo = $threadInfo;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->threadInfo->getId();
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->threadInfo->getCreatedAt();
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->threadInfo->getTitle();
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->threadInfo->getBody();
    }

    /**
     * @return string|null
     */
    public function getUserId()
    {
        return $this->threadInfo->getUserId();
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->threadInfo->getUsername();
    }

    /**
     * @return File|null
     */
    public function getFile()
    {
        return $this->threadInfo->getFile();
    }


    /**
     * @return int
     */
    public function getReplyCount()
    {
        return $this->threadInfo->getReplyCount();
    }

    /**
     * @return int
     */
    public function getImageCount()
    {
        return $this->threadInfo->getImageCount();
    }

    /**
     * @return string
     */
    public function getSemanticUrl()
    {
        return $this->threadInfo->getSemanticUrl();
    }

    /**
     * @return int
     */
    public function getUniqueIpCount()
    {
        return $this->threadInfo->getUniqueIpCount();
    }

    /**
     * @return Post[]
     */
    public function getPosts()
    {
        return $this->posts;
    }
}
