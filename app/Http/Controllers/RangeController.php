<?php

namespace App\Http\Controllers;

use App\Http\Requests\RangeRequest;
use App\Http\Requests\UpdatePriorityRequest;
use App\Models\Cost;
use Illuminate\Http\Request;

class RangeController extends Controller
{
    public function show(Cost  $cost, $range)
    {
        $ranges = json_decode($cost->ranges);
        return response()->json($ranges->{$range}, 200);
    }

    public function index(Cost  $cost)
    {
        $ranges = json_decode($cost->ranges);
        return response()->json($ranges, 200);
    }

    public function store(RangeRequest $request, Cost  $cost)
    {

        $randomNumber = time();
        $ranges =  [
            "R" . $randomNumber =>
            json_decode(json_encode([
                "types" => $request->types,
                "priority" => $request->priority,
                "colleague" => $request->colleague ?? null,
                "items" => $request->items
            ]))
        ];

        $costRanges =  (array)json_decode($cost->ranges) + $ranges;
        uasort($costRanges, function ($a, $b) {
            return $b->priority - $a->priority;
        });


        $cost->update([
            'ranges' => json_encode($costRanges),
        ]);
        return response()->json($cost, 200);
    }

    public function update(RangeRequest $request, Cost  $cost, $ranges)
    {
        $costRanges =  (array)json_decode($cost->ranges);

        if ($costRanges[$ranges]) {
            $upadtesRanges = (array) $costRanges[$ranges];

            $upadtesRanges['types'] = $request->types;
            $upadtesRanges['priority'] = $request->priority;
            $upadtesRanges['colleague'] = $request->colleague;
            $upadtesRanges['items'] = $request->items;

            $costRanges[$ranges] = json_decode(json_encode($upadtesRanges));
            uasort($costRanges, function ($a, $b) {
                return $b->priority - $a->priority;
            });

            $cost->update([
                'ranges' => json_encode($costRanges),
            ]);
            return response()->json($cost, 200);
        }

        return response()->json('NOT FOUND!', 404);
    }

    public function updatePriority(UpdatePriorityRequest $request, Cost  $cost, $ranges)
    {
        $costRanges =  (array)json_decode($cost->ranges);

        if ($costRanges[$ranges]) {
            $upadtesRanges = (array) $costRanges[$ranges];

            $upadtesRanges['priority'] = $request->priority;

            $costRanges[$ranges] = json_decode(json_encode($upadtesRanges));
            uasort($costRanges, function ($a, $b) {
                return $b->priority - $a->priority;
            });

            $cost->update([
                'ranges' => json_encode($costRanges),
            ]);
            return response()->json($cost, 200);
        }

        return response()->json('NOT FOUND!', 404);
    }

    public function delete(Request $request, Cost  $cost, $ranges)
    {

        $costRanges =  (array)json_decode($cost->ranges);

        if ($ranges == 'R') {
            return response()->json('NOT ACCESS!', 403);
        }
        if ($costRanges[$ranges]) {
            unset($costRanges[$ranges]);

            uasort($costRanges, function ($a, $b) {
                return $b->priority - $a->priority;
            });

            $cost->update([
                'ranges' => json_encode($costRanges),
            ]);
            return response()->json($cost, 200);
        }

        return response()->json('NOT FOUND!', 404);
    }
}
