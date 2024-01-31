<?php

namespace App\Http\SwaggerDocs\Api\V1;

use App\Http\Requests\ShippingRequest;
use App\Models\Shipping;

class ShippingControllerDoc
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *     path="/api/v1/shippings/{shipping}",
     *     operationId="showShipping",
     *     tags={"Shipping"},
     * 
     *     summary="show shipping",
     *     description="show shipping",
     * 
     *    @OA\Parameter(
     *       description="shipping id",
     *       in="path",
     *       name="shipping",
     *       required=true,
     *       example="1",
     *    ),
     * 
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
    public function show(Shipping $shipping)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *     path="/api/v1/shippings",
     *     operationId="indexShipping",
     *     tags={"Shipping"},
     * 
     *     summary="index shipping",
     *     description="index shipping",
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
    public function index()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @OA\Post(
     *     path="/api/v1/shippings",
     *     operationId="createShipping",
     *     tags={"Shipping"},
     * 
     *     summary="store shipping",
     *     description="store new shipping",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *   required={"title" , "origin_city" ,  "origin_country" , "destination_city" ,"destination_country" , "transport_type" , "included_all_city" ,"cost_id" ,"is_special"},
     *   @OA\Property(property="title", type="text"),
     *   @OA\Property(property="origin_city", type="text"),
     *   @OA\Property(property="origin_country", type="text"),
     *   @OA\Property(property="destination_city", type="text"),
     *   @OA\Property(property="destination_country", type="text"),
     *   @OA\Property(property="transport_type", type="text"),
     *   @OA\Property(property="included_all_city", type="bool"),
     *   @OA\Property(property="cost_id", type="int"),
     *   @OA\Property(property="is_special", type="bool"),
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
    public function store(ShippingRequest $request)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @OA\Put(
     *     path="/api/v1/shippings/{shipping}",
     *     operationId="updateShipping",
     *     tags={"Shipping"},
     * 
     *     summary="update shipping",
     *     description="update  shipping",
     * 
     *    @OA\Parameter(
     *       description="shipping id",
     *       in="path",
     *       name="shipping",
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
     *   required={"title" , "origin_city" ,  "origin_country" , "destination_city" ,"destination_country" , "transport_type" , "included_all_city" ,"cost_id" ,"is_special"},
     *   @OA\Property(property="title", type="text"),
     *   @OA\Property(property="origin_city", type="text"),
     *   @OA\Property(property="origin_country", type="text"),
     *   @OA\Property(property="destination_city", type="text"),
     *   @OA\Property(property="destination_country", type="text"),
     *   @OA\Property(property="transport_type", type="text"),
     *   @OA\Property(property="included_all_city", type="bool"),
     *   @OA\Property(property="cost_id", type="int"),
     *   @OA\Property(property="is_special", type="bool"),
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
    public function update(ShippingRequest $request, Shipping  $shipping)
    {
    }
}
