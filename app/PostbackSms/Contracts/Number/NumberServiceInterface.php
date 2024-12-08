<?php

namespace App\PostbackSms\Contracts\Number;

use App\PostbackSms\Enums\TargetApiActionMethodEnum;

interface NumberServiceInterface
{
    public function getNumber(string $country, string $token, ?int $rentTime);
    public function cancelNumber(string $token, int $activation);
    public function getSms(string $token, int $activation);
    public function getActivationStatus(string $token, int $activation);
}
