<?php

namespace App\PostbackSms\Dtos;

use App\PostbackSms\Enums\Responses\ResponseCodeEnum;

final readonly class CancelNumberResponseDto
{
    public ResponseCodeEnum $responseCode;
    public int $activation;
    public string $status;

    /**
     * @param int $activation
     * @param string $status
     */
    public function __construct(ResponseCodeEnum $responseCode, int $activation, string $status)
    {
        $this->responseCode = $responseCode;
        $this->activation = $activation;
        $this->status = $status;
    }


}
