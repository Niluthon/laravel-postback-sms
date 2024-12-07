<?php

namespace App\PostbackSms\Services\Number;

use App\PostbackSms\Contracts\Number\NumberServiceInterface;
use Psr\Http\Message\ResponseInterface;

class NumberService
{


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


        return $request->getBody()->getContents();
    }
}
