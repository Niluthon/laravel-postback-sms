<?php

namespace App\PostbackSms\Contracts\Number;

use App\PostbackSms\Dtos\CancelNumberResponseDto;
use App\PostbackSms\Dtos\GetActivationStatusResponseDto;
use App\PostbackSms\Dtos\GetNumberResponseDto;
use App\PostbackSms\Dtos\GetSmsResponseDto;

interface NumberServiceInterface
{
    public function getNumber(string $country, string $service, string $token, ?int $rent_time): GetNumberResponseDto;
    public function cancelNumber(string $token, int $activation): CancelNumberResponseDto;
    public function getSms(string $token, int $activation): GetSmsResponseDto;
    public function getActivationStatus(string $token, int $activation): GetActivationStatusResponseDto;
}
