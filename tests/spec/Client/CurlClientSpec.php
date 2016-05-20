<?php

namespace spec\DusanKasan\Chan\Client;

use DusanKasan\Chan\Client\CurlClient;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin CurlClient
 */
class CurlClientSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(CurlClient::class);
    }
}
