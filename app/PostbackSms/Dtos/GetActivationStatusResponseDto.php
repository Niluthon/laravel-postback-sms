<?php

namespace App\PostbackSms\Dtos;

use App\PostbackSms\Enums\Responses\ResponseCodeEnum;
use DateTime;

readonly final class GetActivationStatusResponseDto
{
    public ResponseCodeEnum $code;
    public string $status;
    public int $count_sms;
    public ?DateTime $end_rent_date;

    /**
     * @param ResponseCodeEnum $code
     * @param string $status
     * @param int $count_sms
     * @param DateTime|null $end_rent_date
     */
    public function __construct(ResponseCodeEnum $code, string $status, int $count_sms, ?DateTime $end_rent_date = null)
    {
        $this->code = $code;
        $this->status = $status;
        $this->count_sms = $count_sms;
        $this->end_rent_date = $end_rent_date;
    }


}
