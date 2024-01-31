<?php

namespace App\Services;

use App\Models\Cost;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalcService
{
    const DEFAULT_RANGEHASH = 'R';

    public static function calcCostAccumulative($typesAndWeights, $costId, $places = [], $useConfirmedRanges = true)
    {
        $totalWeight = static::getTotalCWeight($typesAndWeights);
        $prices = 0;
        $ranges = static::getCostRange($costId, $useConfirmedRanges);

        foreach ($ranges as $range) {
            foreach ($typesAndWeights as $typesAndWeight) {
                if (!empty($range['colleague']) and in_array($range['colleague'], $places)) {
                    $itemCost = static::calcItemCost($range, $totalWeight);
                    if ($itemCost['status']) {
                        return [
                            'status' => true,
                            'msg' => '',
                            'prices' => $itemCost['price'],
                            'summary' => [$itemCost],
                        ];
                    }
                }
            }
        }

        foreach ($ranges as $range) {
            foreach ($typesAndWeights as $typesAndWeight) {
                foreach ($typesAndWeight['types'] as $weightType) {
                    if (in_array($weightType, (array) $range['types'])) {
                        $itemCost = static::calcItemCost($range, $totalWeight);
                        if ($itemCost['status']) {
                            return [
                                'status' => true,
                                'msg' => '',
                                'prices' => $itemCost['price'],
                                'summary' => [$itemCost],
                            ];
                        }
                    }
                }
            }
        }

        $range = $ranges[self::DEFAULT_RANGEHASH];
        foreach ($typesAndWeights as $typesAndWeight) {
            $itemCost = static::calcItemCost($range, $totalWeight);
            if ($itemCost['status']) {
                return [
                    'status' => true,
                    'msg' => '',
                    'prices' => $itemCost['price'],
                    'summary' => [$itemCost],
                ];
            }
        }

        return [
            'status' => false,
            'msg' => __('panel.shippingcost.not_found_shippingcost_for_this_path'),
            'prices' => $prices,
            'summary' => [],
        ];
    }

    public static function calcCost($typesAndWeights, $costId, $places = [], $useConfirmedRanges = true)
    {
        $prices = 0;
        $calculatingSummary = [];
        $calculatedTypesAndWeightsIndex = [];

        $ranges = static::getCostRange($costId, $useConfirmedRanges);
        //calc colleague
        $isColleague = false;
        foreach ($ranges as $range) {
            if (!empty($range['colleague']) and in_array($range['colleague'], $places)) {
                $weight = self::getCWeight($typesAndWeights, $calculatedTypesAndWeightsIndex, false, null, true);
                $itemCost = static::calcItemCost($range, $weight, false);
                if ($itemCost['status']) {
                    $prices += $itemCost['price'];
                    $calculatingSummary[] = $itemCost;
                    $isColleague = true;
                }
            }
        }

        foreach ($ranges as $range) {
            foreach ((array) $range['types'] as $rangeType) {
                $weight = static::getCWeight($typesAndWeights, $calculatedTypesAndWeightsIndex, true, $rangeType);
                if ($weight) {
                    $itemCost = static::calcItemCost($range, $weight, false);
                    if ($itemCost['status']) {
                        $prices += $itemCost['price'];
                        $calculatingSummary[] = $itemCost;
                    }
                }
            }
        }

        $range = $ranges[self::DEFAULT_RANGEHASH];
        $weight = static::getTotalCWeight($typesAndWeights);
        if ($weight and !$isColleague) {
            $itemCost = static::calcItemCost($range, $weight, false);
            if ($itemCost['status']) {
                $prices += $itemCost['price'];
                $calculatingSummary[] = $itemCost;
            } else {
                return [
                    'status' => false,
                    'msg' => __('panel.shippingcost.not_found_shippingcost_for_this_path'),
                    'prices' => $prices,
                    'summary' => $calculatingSummary,
                ];
            }
        }

        return [
            'status' => true,
            'msg' => '',
            'prices' => $prices,
            'summary' => $calculatingSummary,
        ];
    }

    public static function calcItemCost($range, $weight, $isAccumulative = true)
    {
        $rangeItems = (array) $range['items'];
        $roundedWeight = null;

        $selectedRangeItemRawWeight = self::detectWeightRange($rangeItems, $weight);

        $selectedRangeItem = null;
        if ($selectedRangeItemRawWeight) {
            $roundTo = (1 / $selectedRangeItemRawWeight['roundingWeight']);
            $roundedWeight = round(ceil($weight * $roundTo) / $roundTo, 1);

            $selectedRangeItem = self::detectWeightRange($rangeItems, $roundedWeight);
        }
        if (is_null($selectedRangeItem)) {
            return [
                'status' => false,
                'msg' => __('panel.shippingcost.order_weight_is_not_included_in_shipingranges'),
                'price' => null,
                'weight' => $weight,
                'roundedWeight' => $roundedWeight,
            ];
        }

        if ($isAccumulative) {
            $price = (isset($selectedRangeItem['perKilo']) and isset($selectedRangeItem['fixed'])) ? ($selectedRangeItem['perKilo']  * $roundedWeight) + $selectedRangeItem['fixed'] : 0;
        } else {
            $price = (isset($selectedRangeItem['perKiloNonAccumulative']) and isset($selectedRangeItem['fixedNonAccumulative'])) ? ($selectedRangeItem['perKiloNonAccumulative']  * $roundedWeight) + $selectedRangeItem['fixedNonAccumulative'] : 0;
        }

        return [
            'status' => true,
            'msg' => '',
            'price' => $price,
            'weight' => $weight,
            'roundedWeight' => $roundedWeight,
        ];
    }

    public static function detectWeightRange($rangeItems, $weight)
    {
        $startRange = 0;
        foreach ($rangeItems as $rangeItem) {
            if ($startRange <= $weight && $weight <= $rangeItem['endRange']) {
                return $rangeItem;
            }
            $startRange = $rangeItem['endRange'];
        }
        return null;
    }

    public static function getTotalCWeight($typesAndWeights)
    {
        $calculatedTypesAndWeightsIndex = [];
        $totalWeight = 0.00;
        foreach ($typesAndWeights as $typesAndWeight) {
            $totalWeight += static::getCWeight($typesAndWeights, $calculatedTypesAndWeightsIndex);
        }
        return $totalWeight;
    }

    public static function getCWeight($typesAndWeights, &$calculatedTypesAndWeightsIndex, $checkType = false, $type = null, $isColleague = false)
    {
        $totalWeight = 0;
        $totalVweight = 0;
        $totalCweight = 0;
        foreach ($typesAndWeights as $typesAndWeightIndex => $typesAndWeight) {
            if (!in_array($typesAndWeightIndex, $calculatedTypesAndWeightsIndex)) {

                $isInType = true;
                if ($checkType) {
                    $isInType = (in_array($type, (array) $typesAndWeight['types']));
                }

                if ($isInType or $isColleague) {
                    $totalWeight += $typesAndWeight['weight'] ?? 0;
                    $totalWeight = self::cleanDecimal($totalWeight);

                    $totalVweight += $typesAndWeight['vweight'] ?? 0;
                    $totalVweight = self::cleanDecimal($totalVweight);

                    $calculatedTypesAndWeightsIndex[] = $typesAndWeightIndex;
                }
            }
        }
        if ($totalWeight or $totalVweight) {
            $totalCweight = static::getMaxCweight($totalWeight, $totalVweight);
        }
        return $totalCweight;
    }

    public static function cleanDecimal($number, $exponent = 2)
    {
        $base = 10 ** $exponent;
        return (intval($number * $base) / $base);
    }

    public static function getMaxCweight($weight, $vWeight)
    {
        $cWeightUnRounded = max($weight, $vWeight);
        if ($cWeightUnRounded <= 10) {
            $cWeight = round(ceil($cWeightUnRounded * 2) / 2, 1);
        } else {
            $cWeight = round(ceil($cWeightUnRounded));
        }
        return $cWeight;
    }

    public static function getCostRange($costId, $useConfirmedRanges = false)
    {
        $currentShippingcost = static::getCost($costId);

        if ($useConfirmedRanges) {
            $ranges = (array)json_decode($currentShippingcost->confirmed_ranges, true);
        } else {
            $ranges = (array)json_decode($currentShippingcost->ranges, true);
        }

        return $ranges;
    }

    public static $cacheGetCost = [];
    public static function getCost($id, $useCache = true)
    {
        if ($useCache and isset(static::$cacheGetCost[$id])) {
            return static::$cacheGetCost[$id];
        }
        return static::$cacheGetCost[$id] = Cost::find($id);
    }

    public static $cacheGetRealtedShipping = [];
    public static function getRealtedShipping($origin, $destination, $transportType, $useCache = true)
    {
        $cacheKey = implode('-', [$origin, $destination]);
        if ($useCache and isset(static::$cacheGetRealtedShipping[$cacheKey])) {
            return static::$cacheGetRealtedShipping[$cacheKey];
        }

        $theModel = DB::table('shippings')
            ->select(DB::raw('*'))
            ->where('is_active', 1)
            ->where('is_special', 'IS', NULL)
            ->where('transport_type', 'LIKE', '%' . $transportType . '%')
            ->where('origin', $origin)
            ->where('destination', $destination)
            ->first();

        if ($theModel) {
            return static::$cacheGetRealtedShipping[$cacheKey] = $theModel;
        }

        return static::$cacheGetRealtedShipping[$cacheKey] = false;
    }
}
