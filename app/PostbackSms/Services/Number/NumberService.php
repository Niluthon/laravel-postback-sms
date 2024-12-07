<?php

namespace App\PostbackSms\Services\Number;

use App\PostbackSms\Contracts\Number\NumberServiceInterface;
use App\PostbackSms\Enums\Responses\ResponseCodeEnum;
use App\PostbackSms\Exceptions\ApiCalls\ApiRequestException;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class NumberService
{


    /**
     * @throws GuzzleException
     * @throws ApiRequestException
     */
    public function test()
    {
        $guzzle = new \GuzzleHttp\Client(
            [
                'verify' => false
            ]
        );

        $request = $guzzle->request('GET', 'https://postback-sms.com/api', [
            'query' => [
                'action' => 'getSms',
                'token' => 'qergt34gqewf3245y6364ywergwergwergw234123r123r',
                'activation' => '10869836'
            ]
        ]);

        $json = json_decode($request->getBody(), true);

        if ($json['code'] === ResponseCodeEnum::ERROR->value) {
            throw new ApiRequestException($json['message']);
        }

        return $json;
    }
}
