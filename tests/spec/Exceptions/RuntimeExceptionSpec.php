<?php

namespace spec\DusanKasan\Chan\Exceptions;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use RuntimeException;

/**
 * @mixin RuntimeException
 */
class RuntimeExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(RuntimeException::class);
    }
}
