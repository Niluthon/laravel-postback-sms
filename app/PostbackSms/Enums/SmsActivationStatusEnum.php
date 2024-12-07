<?php

namespace App\PostbackSms\Enums;

enum SmsActivationStatusEnum: string
{
    case WAITING = "Waiting first sms";
    case SMS_RECEIVED = "SMS received. You can get more";
    case SMS_NOT_RECEIVED = "SMS not received. Activation canceled";
    case SMS_RECEIVED_ACTIVATED = "SMS received. Activation finished";
}
