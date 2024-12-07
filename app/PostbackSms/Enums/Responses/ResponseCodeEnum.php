<?php

namespace App\PostbackSms\Enums\Responses;

enum ResponseCodeEnum: string
{
    case SUCCESS = 'ok';
    case ERROR = 'error';
}
