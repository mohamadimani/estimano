<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingRequest;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function show(Shipping $shipping)
    {
        return response()->json($shipping, 200);
    }

    public function index()
    {
        $shippings = Shipping::all();
        return response()->json($shippings, 200);
    }

    public function store(ShippingRequest $request)
    {
        $shipping = Shipping::create([
            'title' => $request->title,
            'origin_city' => $request->origin_city,
            'origin_country' => $request->origin_country,
            'destination_city' => $request->destination_city,
            'destination_country' => $request->destination_country,
            'transport_type' => $request->transport_type,
            'included_all_city' => $request->included_all_city,
            'is_special' => $request->is_special,
            'cost_id' => $request->cost_id,
        ]);
        return response()->json($shipping, 201);
    }

    public function update(ShippingRequest $request, Shipping  $shipping)
    {
        $shipping->update([
            'title' => $request->title,
            'origin_city' => $request->origin_city,
            'origin_country' => $request->origin_country,
            'destination_city' => $request->destination_city,
            'destination_country' => $request->destination_country,
            'transport_type' => $request->transport_type,
            'included_all_city' => $request->included_all_city,
            'is_special' => $request->is_special,
            'cost_id' => $request->cost_id,
        ]);
        return response()->json($shipping, 200);
    }

}
