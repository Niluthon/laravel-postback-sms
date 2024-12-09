<?php

namespace App\PostbackSms\Services\Number;

use App\PostbackSms\Attributes\HttpClientAttribute;
use App\PostbackSms\Contracts\Number\NumberServiceInterface;
use App\PostbackSms\Dtos\CancelNumberResponseDto;
use App\PostbackSms\Dtos\GetActivationStatusResponseDto;
use App\PostbackSms\Dtos\GetNumberResponseDto;
use App\PostbackSms\Dtos\GetSmsResponseDto;
use App\PostbackSms\Enums\Responses\ResponseCodeEnum;
use App\PostbackSms\Enums\TargetApiActionMethodEnum;
use App\PostbackSms\Exceptions\ApiCalls\ApiRequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Override;

class NumberService implements NumberServiceInterface
{
    public function __construct(
        #[HttpClientAttribute('https://postback-sms.com/api')]
        readonly private Client $client
    ) {}

    /**
     * @param string $country
     * @param string $service
     * @param string $token
     * @param int|null $rent_time
     * @return GetNumberResponseDto
     * @throws ApiRequestException
     * @throws GuzzleException
     */
    #[Override]
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
     * @param string $token
     * @param int $activation
     * @return CancelNumberResponseDto
     * @throws GuzzleException
     * @throws ApiRequestException
     */
    #[Override]
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
     * @param string $token
     * @param int $activation
     * @return GetSmsResponseDto
     * @throws GuzzleException
     * @throws ApiRequestException
     */
    #[Override]
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

    /**
     * @param string $token
     * @param int $activation
     * @return GetActivationStatusResponseDto
     * @throws GuzzleException
     * @throws ApiRequestException
     */
    #[Override]
    public function getActivationStatus(string $token, int $activation): GetActivationStatusResponseDto
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

        return new GetActivationStatusResponseDto(
            code: ResponseCodeEnum::SUCCESS,
            status: $json['status'],
            count_sms: $json['count_sms'],
            end_rent_date: $json['end_rent_date'] ?? null,
        );
    }
}
