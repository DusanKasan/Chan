<?php

namespace spec\DusanKasan\Chan\Client;

use DusanKasan\Chan\Client\Client;
use DusanKasan\Chan\Client\Exceptions\InvalidJson;
use DusanKasan\Chan\Client\JsonClient;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin JsonClient
 */
class JsonClientSpec extends ObjectBehavior
{
    /**
     * @var Client
     */
    private $client;

    function let(Client $client)
    {
        $this->client = $client;
        $this->beConstructedWith($this->client);
    }

    function it_proxies_get_call()
    {
        $this->client->get('url')->willReturn('{"boards": 1}');
        $this->get('url')->shouldReturn(['boards' => 1]);
    }

    function it_throws_on_invalid_json()
    {
        $this->client->get('url')->willReturn('{"boards": 1');
        $this->shouldThrow(new InvalidJson('{"boards": 1', 4))->during('get', ['url']);
    }
}
