<?php

namespace App\PostbackSms\Dtos;

use App\PostbackSms\Enums\Responses\ResponseCodeEnum;

readonly final class GetSmsResponseDto
{
    public ResponseCodeEnum $responseCode;
    public string $sms;

    /**
     * @param ResponseCodeEnum $responseCode
     * @param string $sms
     */
    public function __construct(ResponseCodeEnum $responseCode, string $sms)
    {
        $this->responseCode = $responseCode;
        $this->sms = $sms;
    }


}
