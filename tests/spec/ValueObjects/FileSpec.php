<?php

namespace spec\DusanKasan\Chan\ValueObjects;

use DusanKasan\Chan\ValueObjects\File;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin File
 */
class FileSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            'path',
            1,
            2,
            'gif',
            3,
            'thumb',
            4,
            5
        );
    }

    function it_can_be_constructed()
    {
        $this->getFilePath()->shouldReturn('path');
        $this->getWidth()->shouldReturn(1);
        $this->getHeight()->shouldReturn(2);
        $this->getExtension()->shouldReturn('gif');
        $this->getSizeInBytes()->shouldReturn(3);
        $this->getThumbnailPath()->shouldReturn('thumb');
        $this->getThumbnailWidth()->shouldReturn(4);
        $this->getThumbnailHeight()->shouldReturn(5);
    }
}
