<?php

namespace App\PostbackSms\Dtos;

use App\PostbackSms\Enums\Responses\ResponseCodeEnum;
use DateTime;

readonly final class GetNumberResponseDto
{
    public ResponseCodeEnum $responseCode;

    public int $number;
    public int $activation;
    public ?DateTime $end_date;
    public float $cost;

    /**
     * @param ResponseCodeEnum $responseCode
     * @param int $number
     * @param int $activation
     * @param DateTime $end_date
     * @param float|null $cost
     */
    public function __construct(ResponseCodeEnum $responseCode, int $number, int $activation, DateTime $end_date, ?float $cost)
    {
        $this->responseCode = $responseCode;
        $this->number = $number;
        $this->activation = $activation;
        $this->end_date = $end_date;
        $this->cost = $cost;
    }


}