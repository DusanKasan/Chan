<?php

namespace spec\DusanKasan\Chan\Client\Exceptions;

use DusanKasan\Chan\Client\Exceptions\RuntimeException;
use DusanKasan\Chan\Exceptions\RuntimeException as ChanRuntimeException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin RuntimeException
 */
class RuntimeExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ChanRuntimeException::class);
    }
}
