<?php

namespace spec\DusanKasan\Chan\ValueObjects;

use DusanKasan\Chan\ValueObjects\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin User
 */
class UserSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('username', '1');
    }

    function it_can_be_created()
    {
        $this->getUserId()->shouldReturn('1');
        $this->getUsername()->shouldReturn('username');
    }
}
