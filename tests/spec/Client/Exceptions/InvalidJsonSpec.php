<?php

namespace spec\DusanKasan\Chan\Client\Exceptions;

use DusanKasan\Chan\Client\Exceptions\InvalidJson;
use DusanKasan\Chan\Client\Exceptions\RuntimeException;
use Exception;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin InvalidJson
 */
class InvalidJsonSpec extends ObjectBehavior
{
    private $jsonString = 'jsonString';

    private $code = 1;

    private $previousException;

    function let(Exception $e)
    {
        $this->previousException = $e;
        $this->beConstructedWith($this->jsonString, $this->code, $this->previousException);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(RuntimeException::class);
        $this->getMessage()->shouldReturn("Invalid JSON string: {$this->jsonString}");
        $this->getCode()->shouldReturn($this->code);
        $this->getPrevious()->shouldReturn($this->previousException);
    }
}
