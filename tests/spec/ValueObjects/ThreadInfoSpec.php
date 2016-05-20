<?php

namespace spec\DusanKasan\Chan\ValueObjects;

use DateTime;
use DusanKasan\Chan\ValueObjects\File;
use DusanKasan\Chan\ValueObjects\Post;
use DusanKasan\Chan\ValueObjects\ThreadInfo;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin ThreadInfo
 */
class ThreadInfoSpec extends ObjectBehavior
{
    /**
     * @var Post
     */
    private $post;

    function let(Post $post)
    {
        $this->post = $post;
        $this->beConstructedWith(
            $this->post,
            1,
            2,
            'url',
            3
        );
    }

    function it_can_be_created(DateTime $createdAt, File $file)
    {
        $this->post->getId()->willReturn(4);
        $this->post->getCreatedAt()->willReturn($createdAt);
        $this->post->getTitle()->willReturn('title');
        $this->post->getBody()->willReturn('body');
        $this->post->getUserId()->willReturn(5);
        $this->post->getUsername()->willReturn('username');
        $this->post->getFile()->willReturn($file);

        $this->getId()->shouldReturn(4);
        $this->getCreatedAt()->shouldReturn($createdAt);
        $this->getTitle()->shouldReturn('title');
        $this->getBody()->shouldReturn('body');
        $this->getUserId()->shouldReturn(5);
        $this->getUsername()->shouldReturn('username');
        $this->getFile()->shouldReturn($file);
        $this->getReplyCount()->shouldReturn(1);
        $this->getImageCount()->shouldReturn(2);
        $this->getSemanticUrl()->shouldReturn('url');
        $this->getUniqueIpCount()->shouldReturn(3);
    }
}
