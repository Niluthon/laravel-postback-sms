<?php

namespace App\PostbackSms\Dtos;

use App\PostbackSms\Enums\Responses\ResponseCodeEnum;

final readonly class CancelNumberResponseDto
{
    public ResponseCodeEnum $code;
    public int $activation;
    public string $status;

    /**
     * @param int $activation
     * @param string $status
     */
    public function __construct(ResponseCodeEnum $code, int $activation, string $status)
    {
        $this->code = $code;
        $this->activation = $activation;
        $this->status = $status;
    }


}
