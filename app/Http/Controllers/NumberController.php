<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetNumberRequest;
use App\PostbackSms\Exceptions\ApiCalls\ApiRequestException;
use App\PostbackSms\Services\Number\NumberService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class NumberController extends Controller
{
    public function __construct(
        private readonly NumberService $numberService
    ) {}

    public function getNumber(): JsonResponse
    {
        try {
            return response()->json($this->numberService->test());
        } catch (ApiRequestException $exception) {
            return response()->json(['error' => $exception->getMessage()])->setStatusCode(400);
        } catch (GuzzleException $e) {
            return response()->json(['error' => $e->getMessage()])->setStatusCode(400);
        }
    }

    public function getSms(): JsonResponse
    {

    }

    public function cancelNumber(): JsonResponse
    {

    }

    public function getStatus(): JsonResponse
    {

    }
}
