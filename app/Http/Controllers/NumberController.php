<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetNumberRequest;
use App\PostbackSms\Services\Number\NumberService;
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
        dd($this->numberService->test());
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
