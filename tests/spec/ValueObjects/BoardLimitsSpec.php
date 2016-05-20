<?php

namespace spec\DusanKasan\Chan\ValueObjects;

use DusanKasan\Chan\ValueObjects\BoardLimits;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin BoardLimits
 */
class BoardLimitsSpec extends ObjectBehavior
{
    private $maxFilesizeInBytes = 1;

    private $maxWebmFilesizeInBytes = 2;

    private $maxCommentLength = 3;

    private $maxWebmDurationInSeconds = 4;

    private $bumpLimit = 5;

    private $imageLimit = 6;

    function let()
    {
        $this->beConstructedWith(
            $this->maxFilesizeInBytes,
            $this->maxWebmFilesizeInBytes,
            $this->maxCommentLength,
            $this->maxWebmDurationInSeconds,
            $this->bumpLimit,
            $this->imageLimit
        );
    }

    function it_can_get_max_filesize_in_bytes()
    {
        $this->getMaximumFilesizeInBytes()->shouldReturn(1);
    }

    function it_can_get_max_webm_filesize_in_bytes()
    {
        $this->getMaximumWebmFilesizeInBytes()->shouldReturn(2);
    }

    function it_can_get_max_comment_length()
    {
        $this->getMaximumCommentLength()->shouldReturn(3);
    }

    function it_can_get_max_webm_duration_in_seconds()
    {
        $this->getMaximumWebmDurationInSeconds()->shouldReturn(4);
    }

    function it_can_get_max_bump_limit()
    {
        $this->getBumpLimit()->shouldReturn(5);
    }

    function it_can_get_max_image_limit()
    {
        $this->getImageLimit()->shouldReturn(6);
    }
}
