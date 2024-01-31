<?php

namespace App\Http\SwaggerDocs\Api\V1;

use App\Http\Requests\CalcCostRequest;
use App\Http\Requests\CalcOrderRequest;
use App\Http\Requests\CalcShippingRequest;
use App\Models\Cost;
use App\Models\Shipping;

class CalcControllerDoc
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @OA\Post(
     *     path="/api/v1/calc/cost/{cost}",
     *     operationId="calcCost",
     *     tags={"calc"},
     *
     *     summary="calc cost",
     *     description="calc cost",
     *
     *    @OA\Parameter(
     *       description="cost id",
     *       in="path",
     *       name="cost",
     *       required=true,
     *       example="1",
     *    ),
     *
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *   required={"place", "useconfirmedrange", "is_test", "types_and_weights"},
     *   @OA\Property(property="place", type="text"),
     *   @OA\Property(property="useconfirmedrange", type="boolean"),
     *   @OA\Property(property="is_test", type="text"),
     *   @OA\Property(property="types_and_weights", type="text"),
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="")
     *       ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="")
     *       ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="")
     *       ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function cost(CalcCostRequest $request, Cost $cost)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @OA\Post(
     *     path="/api/v1/calc/shipping",
     *     operationId="calcshipping",
     *     tags={"calc"},
     *
     *     summary="calc cost",
     *     description="calccost",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *   required={"place", "useconfirmedrange", "is_test", "types_and_weights"},
     *   @OA\Property(property="place", type="text"),
     *   @OA\Property(property="useconfirmedrange", type="text"),
     *   @OA\Property(property="is_test", type="text"),
     *   @OA\Property(property="types_and_weights", type="text"),
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="")
     *       ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="")
     *       ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="")
     *       ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function shipping(CalcShippingRequest $request, Shipping $shipping)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @OA\Post(
     *     path="/api/v1/calc/order",
     *     operationId="calcorder",
     *     tags={"calc"},
     *
     *     summary="calc cost",
     *     description="calccost",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *   required={"origin", "destination" , "place", "transport_type", "useconfirmedrange", "is_test", "types_and_weights"},
     *   @OA\Property(property="origin", type="text"),
     *   @OA\Property(property="destination", type="text"),
     *   @OA\Property(property="transport_type", type="text"),
     *   @OA\Property(property="place", type="text"),
     *   @OA\Property(property="useconfirmedrange", type="text"),
     *   @OA\Property(property="is_test", type="text"),
     *   @OA\Property(property="types_and_weights", type="text"),
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="")
     *       ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="")
     *       ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="")
     *       ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function order(CalcOrderRequest $request)
    {
    }
}
