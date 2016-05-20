<?php

namespace spec\DusanKasan\Chan\ValueObjects;

use DateTime;
use DusanKasan\Chan\ValueObjects\File;
use DusanKasan\Chan\ValueObjects\Post;
use DusanKasan\Chan\ValueObjects\Thread;
use DusanKasan\Chan\ValueObjects\ThreadInfo;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin Thread
 */
class ThreadSpec extends ObjectBehavior
{
    /**
     * @var ThreadInfo
     */
    private $threadInfo;

    /**
     * @var Post[]
     */
    private $posts;

    function let(ThreadInfo $threadInfo, Post $post)
    {
        $this->threadInfo = $threadInfo;
        $this->posts = [$post];

        $this->beConstructedWith($this->threadInfo, $this->posts);
    }

    function it_can_be_created(DateTime $time, File $file)
    {
        $this->threadInfo->getId()->willReturn(1);
        $this->threadInfo->getBody()->willReturn('body');
        $this->threadInfo->getUserId()->willReturn(2);
        $this->threadInfo->getCreatedAt()->willReturn($time);
        $this->threadInfo->getFile()->willReturn($file);
        $this->threadInfo->getImageCount()->willReturn(3);
        $this->threadInfo->getReplyCount()->willReturn(4);
        $this->threadInfo->getSemanticUrl()->willReturn('url');
        $this->threadInfo->getTitle()->willReturn('title');
        $this->threadInfo->getUniqueIpCount()->willReturn(5);
        $this->threadInfo->getUsername()->willReturn('username');

        $this->getId()->shouldReturn(1);
        $this->getBody()->shouldReturn('body');
        $this->getUserId()->shouldReturn(2);
        $this->getCreatedAt()->shouldReturn($time);
        $this->getFile()->shouldReturn($file);
        $this->getImageCount()->shouldReturn(3);
        $this->getReplyCount()->shouldReturn(4);
        $this->getSemanticUrl()->shouldReturn('url');
        $this->getTitle()->shouldReturn('title');
        $this->getUniqueIpCount()->shouldReturn(5);
        $this->getUsername()->shouldReturn('username');
        $this->getPosts()->shouldReturn($this->posts);
    }
}
