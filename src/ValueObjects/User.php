<?php

namespace DusanKasan\Chan\ValueObjects;

class User
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $userId;

    public function __construct(
        string $username,
        string $userId = NULL
    )
    {
        $this->username = $username;
        $this->userId = $userId;
    }

    /**
     * @return string|null
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
}
