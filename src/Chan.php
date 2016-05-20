<?php

namespace DusanKasan\Chan;

use DusanKasan\Chan\Client\Client;
use DusanKasan\Chan\Client\CurlClient;
use DusanKasan\Chan\Client\JsonClient;
use DusanKasan\Chan\Requests\BoardCatalogRequest;
use DusanKasan\Chan\Requests\BoardsRequest;
use DusanKasan\Chan\Requests\ThreadRequest;
use DusanKasan\Chan\ValueObjects\Thread;

class Chan
{
    /**
     * @var JsonClient
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = new JsonClient($client);
    }

    /**
     * @return ValueObjects\Board[]|\Generator
     */
    public function getBoards()
    {
        return (new BoardsRequest($this->client))->getBoards();
    }

    /**
     * @param string $boardName
     * @return ValueObjects\ThreadOverview[]|\Generator
     */
    public function getThreads(string $boardName)
    {
        return (new BoardCatalogRequest($this->client, $boardName))->getCatalog();
    }

    public function getThread(string $boardName, string $threadNumber) : Thread
    {
        return (new ThreadRequest($this->client, $boardName, $threadNumber))->getThread();
    }
}
