<?php

namespace App\PostbackSms\Contracts\Number;

interface NumberServiceInterface
{
    public function getNumber();
    public function cancelNumber();
    public function getSms();
    public function getActivationStatus();
}
