<?php

use App\Http\Controllers\CalcController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\RangeController;
use App\Http\Controllers\RouteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['prefix' => 'v1'], function () use ($router) {

    $router->get('shippings', [ShippingController::class, 'index']);
    $router->get('shippings/{shipping}', [ShippingController::class, 'show']);
    $router->post('shippings', [ShippingController::class, 'store']);
    $router->put('shippings/{shipping}', [ShippingController::class, 'update']);

    $router->get('costs', [CostController::class, 'index']);
    $router->get('costs/{cost}', [CostController::class, 'show']);
    $router->post('costs', [CostController::class, 'store']);
    $router->patch('costs/{cost}', [CostController::class, 'update']);
    $router->post('costs/{cost}/confirm', [CostController::class, 'confirmRange']);

    $router->get('costs/{cost}/ranges', [RangeController::class, 'index']);
    $router->get('costs/{cost}/ranges/{ranges}', [RangeController::class, 'show']);
    $router->post('costs/{cost}/ranges', [RangeController::class, 'store']);
    $router->patch('costs/{cost}/ranges/{ranges}', [RangeController::class, 'update']);
    $router->delete('costs/{cost}/ranges/{ranges}', [RangeController::class, 'delete']);
    $router->patch('costs/{cost}/ranges/{ranges}/priority', [RangeController::class, 'updatePriority']);

    $router->post('calc/cost/{cost}', [CalcController::class, 'cost']);
    $router->post('calc/shipping/{shipping}', [CalcController::class, 'shipping']);
    $router->post('calc/order', [CalcController::class, 'order']);

    $router->get('histories', [HistoryController::class, 'index']);
    $router->get('histories/{history}', [HistoryController::class, 'show']);
});
