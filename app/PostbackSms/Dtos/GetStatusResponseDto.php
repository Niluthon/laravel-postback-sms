<?php

namespace App\PostbackSms\Dtos;

use App\PostbackSms\Enums\Responses\ResponseCodeEnum;
use DateTime;

readonly final class GetStatusResponseDto
{
    public ResponseCodeEnum $code;
    public string $status;
    public int $count_sms;
    public DateTime $end_rend_date;

    /**
     * @param ResponseCodeEnum $code
     * @param string $status
     * @param int $count_sms
     * @param DateTime $end_rend_date
     */
    public function __construct(ResponseCodeEnum $code, string $status, int $count_sms, DateTime $end_rend_date)
    {
        $this->code = $code;
        $this->status = $status;
        $this->count_sms = $count_sms;
        $this->end_rend_date = $end_rend_date;
    }


}
