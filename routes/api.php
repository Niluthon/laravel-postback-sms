<?php

use App\Http\Controllers\NumberController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;



Route::group(
    ['prefix' => 'v1'],
    function (Router $router) {
        $router->get('/getNumber', [NumberController::class, 'getNumber']);
    }
);
