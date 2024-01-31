<?php

namespace App\Http\Controllers;

use App\Http\Requests\CostRequest;
use App\Http\Requests\UpdateRangeRequest;
use App\Models\Cost;
use App\Models\History;
use Illuminate\Http\Request;

class CostController extends Controller
{
    public function show(Cost $cost)
    {
        return response()->json($cost, 200);
    }

    public function index(Request $request)
    {
        $costs = Cost::search($request->all())->paginate($request->perpage ?? 10);
        return response()->json($costs, 200);
    }

    public function store(CostRequest $request)
    {
        $cost = Cost::create([
            'title' => $request->title,
            'price_unit' => $request->price_unit,

        ]);
        return response()->json($cost, 201);
    }

    public function update(CostRequest $request, Cost  $cost)
    {
        $cost->update([
            'title' => $request->title,
            'price_unit' => $request->price_unit,
        ]);
        return response()->json($cost, 200);
    }

    public function confirmRange(Cost $cost)
    {
        $cost->update([
            'confirmed_ranges' => $cost->ranges,
        ]);

        History::create([
            'ranges' => $cost->confirmed_ranges,
            'cost_id' => $cost->id,
        ]);

        return response()->json($cost, 200);
    }
}
