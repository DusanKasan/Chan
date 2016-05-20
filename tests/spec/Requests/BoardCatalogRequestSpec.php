<?php

namespace spec\DusanKasan\Chan\Requests;

use DusanKasan\Chan\Client\JsonClient;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BoardCatalogRequestSpec extends ObjectBehavior
{
    function let(JsonClient $client)
    {
        $this->beConstructedWith($client, 'b');
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('DusanKasan\Chan\Requests\BoardCatalogRequest');
    }
}
