<?php

namespace spec\DusanKasan\Chan\ValueObjects;

use DusanKasan\Chan\ValueObjects\BoardCooldowns;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin BoardCooldowns
 */
class BoardCooldownsSpec extends ObjectBehavior
{
    private $threadCooldownInSeconds = 1;

    private $replyCooldownInSeconds = 2;

    private $imageCooldownInSeconds = 3;

    function let()
    {
        $this->beConstructedWith(
            $this->threadCooldownInSeconds,
            $this->replyCooldownInSeconds,
            $this->imageCooldownInSeconds
        );
    }

    function it_can_get_thread_cooldown_in_seconds()
    {
        $this->getThreadCooldownInSeconds()->shouldReturn(1);
    }

    function it_can_get_reply_cooldown_in_seconds()
    {
        $this->getReplyCooldownInSeconds()->shouldReturn(2);
    }

    function it_can_get_image_cooldown_in_seconds()
    {
        $this->getImageCooldownInSeconds()->shouldReturn(3);
    }
}
