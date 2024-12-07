<?php

namespace App\PostbackSms\Exceptions\ApiCalls;

use Exception;
use Throwable;

class ApiRequestException extends Exception
{

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
