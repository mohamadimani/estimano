<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalcCostRequest;
use App\Http\Requests\CalcOrderRequest;
use App\Http\Requests\CalcShippingRequest;
use Illuminate\Http\Request;
use App\Services\CalcService;
use App\Http\Requests\CalcRequest;
use App\Models\Cost;
use App\Models\Shipping;

class CalcController extends Controller
{


    public function cost(CalcCostRequest $request, Cost $cost)
    {
        $res = $this->calc($request->types_and_weights, $cost->id, $request->place, $request->useconfirmedrange, $request->is_test);
        return response()->json($res, 200);
    }

    public function shipping(CalcShippingRequest $request, Shipping $shipping)
    {
        $res = $this->calc($request->types_and_weights, $shipping->cost_id, $request->place, $request->useconfirmedrange, $request->is_test);
        return response()->json($res, 200);
    }

    public function order(CalcOrderRequest $request)
    {
        $shipping = CalcService::getRealtedShipping($request->origin, $request->destination, $request->transport_type);

        $res = $this->calc($request->types_and_weights, $shipping->cost_id, $request->place, $request->useconfirmedrange, $request->is_test);

        return response()->json($res, 200);
    }

    public function calc($typesAndWeights, $costId, $place, $useConfirmedRange, $isTest)
    {
        if ($isTest) {
            return CalcService::calcCost($typesAndWeights, $costId, [$place], $useConfirmedRange);
        }
        return CalcService::calcCostAccumulative($typesAndWeights, $costId, [$place], $useConfirmedRange);
    }
}
