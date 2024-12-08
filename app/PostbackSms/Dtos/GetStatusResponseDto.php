<?php

namespace App\PostbackSms\Dtos;

use App\PostbackSms\Enums\Responses\ResponseCodeEnum;
use DateTime;

readonly final class GetStatusResponseDto
{
    public ResponseCodeEnum $responseCode;
    public string $status;
    public int $count_sms;
    public DateTime $end_rend_date;

    /**
     * @param ResponseCodeEnum $responseCode
     * @param string $status
     * @param int $count_sms
     * @param DateTime $end_rend_date
     */
    public function __construct(ResponseCodeEnum $responseCode, string $status, int $count_sms, DateTime $end_rend_date)
    {
        $this->responseCode = $responseCode;
        $this->status = $status;
        $this->count_sms = $count_sms;
        $this->end_rend_date = $end_rend_date;
    }


}
