<?php

namespace spec\DusanKasan\Chan\Requests;

use DusanKasan\Chan\Client\JsonClient;
use DusanKasan\Chan\Requests\BoardsRequest;
use DusanKasan\Chan\ValueObjects\Board;
use DusanKasan\Chan\ValueObjects\BoardCooldowns;
use DusanKasan\Chan\ValueObjects\BoardLimits;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Traversable;

/**
 * @mixin BoardsRequest
 */
class BoardsRequestSpec extends ObjectBehavior
{
    /**
     * @var JsonClient
     */
    private $client;

    function let(JsonClient $client)
    {
        $this->client = $client;
        $this->beConstructedWith($this->client);
    }

    function it_can_get_boards()
    {
        $boardData =[
            'boards' => [
                [
                    'board' => "an",
                    'title' => "Animals & Nature",
                    'ws_board' => 1,
                    'per_page' => 15,
                    'pages' => 5,
                    'max_filesize' => 4194304,
                    'max_webm_filesize' => 3145728,
                    'max_comment_chars' => 2000,
                    'max_webm_duration' => 120,
                    'bump_limit' => 310,
                    'image_limit' => 150,
                    'cooldowns' => [
                        'threads' => 600,
                        'replies' => 30,
                        'images' => 60,
                        'replies_intra' => 60,
                        'images_intra' => 60,
                    ],
                    'meta_description' => "&quot;/an/ - Animals &amp; Nature&quot; is 4chan's imageboard for posting pictures of animals, pets, and nature.",
                    'is_archived' => 1,
                ]
            ]
        ];
        
        $this->client->get('http://a.4cdn.org/boards.json')->willReturn($boardData);
        
        $boards = $this->getBoards();
        $boards->shouldBeAnInstanceOf(Traversable::class);
        $boards->rewind();
        $boards->current()->shouldBeLike(new Board(
            'an',
            'Animals & Nature',
            '&quot;/an/ - Animals &amp; Nature&quot; is 4chan\'s imageboard for posting pictures of animals, pets, and nature.',
            new BoardLimits(
                4194304,
                3145728,
                2000,
                120,
                310,
                150
            ),
            new BoardCooldowns(600, 30, 60),
            true,
            true,
            false,
            false
        ));
    }
}
