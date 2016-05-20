<?php

namespace DusanKasan\Chan\ValueObjects;

use DateTime;

class Post
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var DateTime
     */
    private $createdAt;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $body;

    /**
     * @var User
     */
    private $user;

    /**
     * @var File
     */
    private $file;

    public function __construct(
        int $id,
        DateTime $createdAt,
        string $title,
        string $body,
        User $user,
        File $file = NULL
    )
    {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->title = $title;
        $this->body = $body;
        $this->user = $user;
        $this->file = $file;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return string|null
     */
    public function getUserId()
    {
        return $this->user->getUserId();
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->user->getUsername();
    }

    /**
     * @return File|null
     */
    public function getFile()
    {
        return $this->file;
    }
}
