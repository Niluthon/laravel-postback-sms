<?php

namespace App\PostbackSms\Dtos;

use App\PostbackSms\Enums\Responses\ResponseCodeEnum;

readonly final class GetSmsResponseDto
{
    public ResponseCodeEnum $code;
    public string $sms;

    /**
     * @param ResponseCodeEnum $code
     * @param string $sms
     */
    public function __construct(ResponseCodeEnum $code, string $sms)
    {
        $this->code = $code;
        $this->sms = $sms;
    }

}
