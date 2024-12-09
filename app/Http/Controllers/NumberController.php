<?php

namespace App\Http\Controllers;

use App\Http\Requests\CancelNumberRequest;
use App\Http\Requests\GetActivationStatusRequest;
use App\Http\Requests\GetNumberRequest;
use App\Http\Requests\GetSmsRequest;
use App\PostbackSms\Dtos\CancelNumberResponseDto;
use App\PostbackSms\Dtos\GetNumberResponseDto;
use App\PostbackSms\Dtos\GetSmsResponseDto;
use App\PostbackSms\Dtos\GetActivationStatusResponseDto;
use App\PostbackSms\Exceptions\ApiCalls\ApiRequestException;
use App\PostbackSms\Services\Number\NumberService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;

class NumberController extends Controller
{
    public function __construct(
        private readonly NumberService $numberService
    ) {}

    /**
     * @param GetNumberRequest $request
     * @return JsonResponse<GetNumberResponseDto>
     */
    public function getNumber(GetNumberRequest $request): JsonResponse
    {
        $validated = $request->validated();

        try {
            return response()->json($this->numberService->getNumber(...$validated));
        }
        catch (ApiRequestException $exception) {
            return response()->json(['error' => $exception->getMessage()])->setStatusCode(400);
        }
        catch (GuzzleException $e) {
            return response()->json(['error' => $e->getMessage()])->setStatusCode(400);
        }
    }

    /**
     * @param GetSmsRequest $request
     * @return JsonResponse<GetSmsResponseDto>
     */
    public function getSms(GetSmsRequest $request): JsonResponse
    {
        $validated = $request->validated();

        try {
            return response()->json($this->numberService->getSms(...$validated));
        }
        catch (ApiRequestException $exception) {
            return response()->json(['error' => $exception->getMessage()])->setStatusCode(400);
        }
        catch (GuzzleException $e) {
            return response()->json(['error' => $e->getMessage()])->setStatusCode(400);
        }
    }

    /**
     * @param CancelNumberRequest $request
     * @return JsonResponse<CancelNumberResponseDto>
     */
    public function cancelNumber(CancelNumberRequest $request): JsonResponse
    {
        $validated = $request->validated();

        try {
            return response()->json($this->numberService->cancelNumber(...$validated));
        }
        catch (ApiRequestException $exception) {
            return response()->json(['error' => $exception->getMessage()])->setStatusCode(400);
        }
        catch (GuzzleException $e) {
            return response()->json(['error' => $e->getMessage()])->setStatusCode(400);
        }

    }

    /**
     * @param GetActivationStatusRequest $request
     * @return JsonResponse<GetActivationStatusResponseDto>
     */
    public function getStatus(GetActivationStatusRequest $request): JsonResponse
    {
        $validated = $request->validated();

        try {
            return response()->json($this->numberService->getActivationStatus(...$validated));
        }
        catch (ApiRequestException $exception) {
            return response()->json(['error' => $exception->getMessage()])->setStatusCode(400);
        }
        catch (GuzzleException $e) {
            return response()->json(['error' => $e->getMessage()])->setStatusCode(400);
        }

    }
}
