<?php

namespace DusanKasan\Chan\Requests;

use DusanKasan\Chan\Client\Client;
use DusanKasan\Chan\Client\JsonClient;
use DusanKasan\Chan\ValueObjects\Board;
use DusanKasan\Chan\ValueObjects\BoardCooldowns;
use DusanKasan\Chan\ValueObjects\BoardLimits;
use Generator;

class BoardsRequest
{
    /**
     * @var string
     */
    private $url = 'http://a.4cdn.org/boards.json';

    /**
     * @var JsonClient
     */
    private $client;

    public function __construct(JsonClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return Generator|Board[]
     */
    public function getBoards()
    {
        $data = $this->client->get($this->url);

        foreach ($data['boards'] as $boardData) {
            $limits = new BoardLimits(
                $boardData['max_filesize'],
                $boardData['max_webm_filesize'],
                $boardData['max_comment_chars'],
                $boardData['max_webm_duration'],
                $boardData['bump_limit'],
                $boardData['image_limit']
            );

            $cooldowns = new BoardCooldowns(
                $boardData['cooldowns']['threads'],
                $boardData['cooldowns']['replies'],
                $boardData['cooldowns']['images']
            );

            yield new Board(
                $boardData['board'],
                $boardData['title'],
                $boardData['meta_description'],
                $limits,
                $cooldowns,
                $boardData['ws_board'],
                $boardData['is_archived'] ?? FALSE,
                $boardData['user_ids'] ?? FALSE,
                $boardData['forced_anon'] ?? FALSE
            );
        }
    }
}
