<?php

namespace DusanKasan\Chan\Requests;

use DateTime;
use DusanKasan\Chan\Client\JsonClient;
use DusanKasan\Chan\ValueObjects\File;
use DusanKasan\Chan\ValueObjects\Post;
use DusanKasan\Chan\ValueObjects\ThreadInfo;
use DusanKasan\Chan\ValueObjects\ThreadOverview;
use DusanKasan\Chan\ValueObjects\User;
use Generator;

class BoardCatalogRequest
{
    /**
     * @var JsonClient
     */
    private $client;

    /**
     * @var string
     */
    private $boardName;

    /**
     * @param JsonClient $client
     * @param string $boardName
     */
    public function __construct(JsonClient $client, string $boardName)
    {
        $this->client = $client;
        $this->boardName = $boardName;
    }

    /**
     * @return Generator|ThreadOverview[]
     */
    public function getCatalog()
    {
        $data = $this->client->get("http://a.4cdn.org/{$this->boardName}/catalog.json");

        foreach ($data as $pageData) {
            foreach ($pageData['threads'] as $threadData) {
                $file = null;
                if (isset($threadData['filename'])) {
                    $file = new File(
                        "https://i.4cdn.org/{$this->boardName}/{$threadData['time']}{$threadData['ext']}",
                        $threadData['w'],
                        $threadData['h'],
                        $threadData['ext'],
                        $threadData['fsize'],
                        "https://i.4cdn.org/{$this->boardName}/{$threadData['time']}s.jpg",
                        $threadData['tn_w'],
                        $threadData['tn_h']
                    );
                }

                $threadInfo = new ThreadInfo(
                    $this->createPost($threadData),
                    $threadData['replies'],
                    $threadData['images'],
                    $threadData['semantic_url'],
                    $threadData['unique_ips'] ?? 0
                );

                $lastReplies = array_map(
                    function ($data) {
                        return $this->createPost($data);
                    },
                    $threadData['last_replies']
                );

                yield new ThreadOverview($threadInfo, $lastReplies);
            }
        }
    }

    /**
     * @param array $data
     * @return Post
     */
    private function createPost(array $data) : Post
    {
        $file = null;
        if (isset($data['filename'])) {
            $file = new File(
                "https://i.4cdn.org/{$this->boardName}/{$data['time']}{$data['ext']}",
                $data['w'],
                $data['h'],
                $data['ext'],
                $data['fsize'],
                "https://i.4cdn.org/{$this->boardName}/{$data['time']}s.jpg",
                $data['tn_w'],
                $data['tn_h']
            );
        }

        return new Post(
            $data['no'],
            DateTime::createFromFormat('U', $data['time']),
            $data['sub'] ?? '',
            $data['com'] ?? '',
            new User(
                $data['name'],
                $data['id'] ?? null
            ),
            $file
        );
    }
}
