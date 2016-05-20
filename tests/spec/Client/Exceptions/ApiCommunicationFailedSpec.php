<?php

namespace spec\DusanKasan\Chan\Client\Exceptions;

use DusanKasan\Chan\Client\Exceptions\ApiCommunicationFailed;
use DusanKasan\Chan\Client\Exceptions\RuntimeException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin ApiCommunicationFailed
 */
class ApiCommunicationFailedSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(RuntimeException::class);
    }
}
