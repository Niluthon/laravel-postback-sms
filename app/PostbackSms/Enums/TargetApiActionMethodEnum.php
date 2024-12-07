<?php

namespace App\PostbackSms\Enums;

enum TargetApiActionMethodEnum: string
{
    case GET_NUMBER = 'getNumber';
    case GET_SMS = 'getSms';
    case CANCEL_NUMBER = 'cancelNumber';
    case GET_ACTIVATION_STATUS = 'getStatus';
}
