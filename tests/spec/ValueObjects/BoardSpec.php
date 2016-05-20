<?php

namespace spec\DusanKasan\Chan\ValueObjects;

use DusanKasan\Chan\ValueObjects\Board;
use DusanKasan\Chan\ValueObjects\BoardCooldowns;
use DusanKasan\Chan\ValueObjects\BoardLimits;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin Board
 */
class BoardSpec extends ObjectBehavior
{
    private $boardAbbreviation = 'b';

    private $boardName = 'Random';

    private $boardDescription = 'description';

    /**
     * @var BoardLimits
     */
    private $boardLimits;

    /**
     * @var BoardCooldowns
     */
    private $boardCooldowns;

    private $worksafe = TRUE;

    private $archived = TRUE;

    private $useUserIds = TRUE;

    private $forcedAnonymous = TRUE;

    function let(BoardLimits $limits, BoardCooldowns $cooldowns)
    {
        $this->boardLimits = $limits;
        $this->boardCooldowns = $cooldowns;
        $this->beConstructedWith(
            $this->boardAbbreviation,
            $this->boardName,
            $this->boardDescription,
            $this->boardLimits,
            $this->boardCooldowns,
            $this->worksafe,
            $this->archived,
            $this->useUserIds,
            $this->forcedAnonymous
        );
    }

    function it_can_get_board_abbreviation()
    {
        $this->getAbbreviation()->shouldReturn($this->boardAbbreviation);
    }

    function it_can_get_board_name()
    {
        $this->getName()->shouldReturn($this->boardName);
    }

    function it_can_get_board_description()
    {
        $this->getDescription()->shouldReturn($this->boardDescription);
    }

    function it_can_check_if_board_is_worksafe()
    {
        $this->isWorksafe()->shouldReturn($this->worksafe);
    }

    function it_can_check_if_board_is_archived()
    {
        $this->isArchived()->shouldReturn($this->archived);
    }

    function it_can_check_if_board_uses_user_ids()
    {
        $this->usesUserIds()->shouldReturn($this->useUserIds);
    }

    function it_can_check_is_board_forces_anonymous()
    {
        $this->forcesAnonymous()->shouldReturn($this->forcedAnonymous);
    }

    function it_can_get_thread_cooldown_in_seconds()
    {
        $this->boardCooldowns->getThreadCooldownInSeconds()->willReturn(2);
        $this->getThreadCooldownInSeconds()->shouldReturn(2);
    }

    function it_can_get_reply_cooldown_in_seconds()
    {
        $this->boardCooldowns->getReplyCooldownInSeconds()->willReturn(2);
        $this->getReplyCooldownInSeconds()->shouldReturn(2);
    }

    function it_can_get_image_cooldown_in_seconds()
    {
        $this->boardCooldowns->getImageCooldownInSeconds()->willReturn(2);
        $this->getImageCooldownInSeconds()->shouldReturn(2);
    }

    function it_can_get_maximum_filesize_in_bytes()
    {
        $this->boardLimits->getMaximumFilesizeInBytes()->willReturn(2);
        $this->getMaximumFilesizeInBytes()->shouldReturn(2);
    }

    function it_can_get_maximum_webm_filesize_in_bytes()
    {
        $this->boardLimits->getMaximumWebmFilesizeInBytes()->willReturn(2);
        $this->getMaximumWebmFilesizeInBytes()->shouldReturn(2);
    }

    function it_can_get_maximum_content_length()
    {
        $this->boardLimits->getMaximumCommentLength()->willReturn(2);
        $this->getMaximumCommentLength()->shouldReturn(2);
    }

    function it_can_get_maximum_webm_duration_in_seconds()
    {
        $this->boardLimits->getMaximumWebmDurationInSeconds()->willReturn(2);
        $this->getMaximumWebmDurationInSeconds()->shouldReturn(2);
    }

    function it_can_get_bump_limit()
    {
        $this->boardLimits->getBumpLimit()->willReturn(2);
        $this->getBumpLimit()->shouldReturn(2);
    }

    function it_can_get_image_limit()
    {
        $this->boardLimits->getImageLimit()->willReturn(2);
        $this->getImageLimit()->shouldReturn(2);
    }
}
