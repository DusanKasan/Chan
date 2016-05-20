<?php

namespace DusanKasan\Chan\Requests;

use DateTime;
use DusanKasan\Chan\Client\JsonClient;
use DusanKasan\Chan\ValueObjects\File;
use DusanKasan\Chan\ValueObjects\Post;
use DusanKasan\Chan\ValueObjects\Thread;
use DusanKasan\Chan\ValueObjects\ThreadInfo;
use DusanKasan\Chan\ValueObjects\User;

class ThreadRequest
{
    /**
     * @var JsonClient
     */
    private $client;

    /**
     * @var string
     */
    private $threadNumber;

    /**
     * @var string
     */
    private $boardName;

    public function __construct(JsonClient $client, string $boardName, string $threadNumber)
    {
        $this->client = $client;
        $this->threadNumber = $threadNumber;
        $this->boardName = $boardName;
    }

    public function getThread() : Thread
    {
        $data = $this->client->get("http://a.4cdn.org/{$this->boardName}/thread/{$this->threadNumber}.json");
        $posts = $data['posts'];

        $threadInfo = $this->createThreadInfo($posts[0]);

        $postsGenerator = function ($posts) {
            foreach ($posts as $post) {
                yield $this->createPost($post);
            }
        };

        return new Thread($threadInfo, $postsGenerator($posts));
    }

    private function createThreadInfo(array $firstPostData) : ThreadInfo
    {
        return new ThreadInfo(
            $this->createPost($firstPostData),
            $firstPostData['replies'],
            $firstPostData['images'],
            $firstPostData['semantic_url'],
            $firstPostData['unique_ips'] ?? 0
        );
    }

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
