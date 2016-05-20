<?php

namespace spec\DusanKasan\Chan\ValueObjects;

use DateTime;
use DusanKasan\Chan\ValueObjects\File;
use DusanKasan\Chan\ValueObjects\Post;
use DusanKasan\Chan\ValueObjects\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin Post
 */
class PostSpec extends ObjectBehavior
{
    /**
     * @var DateTime
     */
    private $time;

    /**
     * @var User
     */
    private $user;

    /**
     * @var File
     */
    private $file;

    function let(DateTime $time, User $user, File $file)
    {
        $this->time = $time;
        $this->user = $user;
        $this->file = $file;

        $this->beConstructedWith(
            1,
            $this->time,
            'title',
            'body',
            $this->user,
            $this->file
        );
    }

    function it_can_be_created()
    {
        $this->user->getUserId()->willReturn(2);
        $this->user->getUsername()->willReturn('username');

        $this->getId()->shouldReturn(1);
        $this->getCreatedAt()->shouldReturn($this->time);
        $this->getTitle()->shouldReturn('title');
        $this->getBody()->shouldReturn('body');
        $this->getUserId()->shouldReturn(2);
        $this->getUsername()->shouldReturn('username');
        $this->getFile()->shouldReturn($this->file);
    }
}
