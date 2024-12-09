<?php

namespace App\PostbackSms\Services\Number;

use App\PostbackSms\Attributes\HttpClientAttribute;
use App\PostbackSms\Contracts\Number\NumberServiceInterface;
use App\PostbackSms\Dtos\CancelNumberResponseDto;
use App\PostbackSms\Dtos\GetNumberResponseDto;
use App\PostbackSms\Dtos\GetSmsResponseDto;
use App\PostbackSms\Enums\Responses\ResponseCodeEnum;
use App\PostbackSms\Enums\TargetApiActionMethodEnum;
use App\PostbackSms\Exceptions\ApiCalls\ApiRequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class NumberService implements NumberServiceInterface
{
    public function __construct(
        #[HttpClientAttribute('https://postback-sms.com/api')]
        readonly private Client $client
    ) {}

    public function getNumber(string $country, string $service, string $token, ?int $rent_time): GetNumberResponseDto
    {
        $request = $this->client->request('GET', 'https://postback-sms.com/api', [
            'query' => [
                'action' => TargetApiActionMethodEnum::GET_NUMBER->value,
                'token' => $token,
                'country' => $country,
                'service' => $service,
                $rent_time ? fn() => ['rent_time' => $rent_time] : null,
            ]
        ]);

        $json = json_decode($request->getBody(), true);

        if ($json['code'] === ResponseCodeEnum::ERROR->value) {
            throw new ApiRequestException($json['message']);
        }

        return new GetNumberResponseDto(
            code: ResponseCodeEnum::SUCCESS,
            number: $json['number'],
            activation: $json['activation'],
            end_date: $json['end_date'],
            cost: $json['cost'],
        );
    }

    /**
     * @throws GuzzleException
     * @throws ApiRequestException
     */
    public function cancelNumber(string $token, int $activation): CancelNumberResponseDto
    {
        $request = $this->client->request('GET', 'https://postback-sms.com/api', [
            'query' => [
                'action' => TargetApiActionMethodEnum::CANCEL_NUMBER->value,
                'token' => $token,
                'activation' => $activation
            ]
        ]);

        $json = json_decode($request->getBody(), true);

        if ($json['code'] === ResponseCodeEnum::ERROR->value) {
            throw new ApiRequestException($json['message']);
        }

        return new CancelNumberResponseDto(
            code: ResponseCodeEnum::SUCCESS,
            activation: $json['activation'],
            status: $json['status'],
        );
    }


    /**
     * @throws GuzzleException
     * @throws ApiRequestException
     */
    public function getSms(string $token, int $activation): GetSmsResponseDto
    {
        $request = $this->client->request('GET', 'https://postback-sms.com/api', [
            'query' => [
                'action' => TargetApiActionMethodEnum::GET_SMS->value,
                'token' => $token,
//                'token' => 'qergt34gqewf3245y6364ywergwergwergw234123r123r',
                'activation' => $activation
            ]
        ]);

        $json = json_decode($request->getBody(), true);

        if ($json['code'] === ResponseCodeEnum::ERROR->value) {
            throw new ApiRequestException($json['message']);
        }

        return new GetSmsResponseDto(
            code: ResponseCodeEnum::SUCCESS,
            sms: $json['message'],
        );
    }

    public function getActivationStatus(string $token, int $activation): GetSmsResponseDto
    {
        $request = $this->client->request('GET', 'https://postback-sms.com/api', [
            'query' => [
                'action' => TargetApiActionMethodEnum::GET_ACTIVATION_STATUS->value,
                'token' => $token,
                'activation' => $activation
            ]
        ]);

        $json = json_decode($request->getBody(), true);

        if ($json['code'] === ResponseCodeEnum::ERROR->value) {
            throw new ApiRequestException($json['message']);
        }

        return new GetSmsResponseDto(
            code: ResponseCodeEnum::SUCCESS,
            sms: $json['message'],
        );
    }
}
