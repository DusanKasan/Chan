<?php

namespace DusanKasan\Chan\Client\Exceptions;

use Exception;

class InvalidJson extends RuntimeException
{
    public function __construct(string $jsonString, int $code = 0, Exception $previous = NULL)
    {
        parent::__construct(
            "Invalid JSON string: $jsonString",
            $code,
            $previous
        );
    }
}
