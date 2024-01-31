<?php

namespace App\Http\SwaggerDocs\Api\V1;

use App\Http\Requests\RangeRequest;
use App\Http\Requests\UpdatePriorityRequest;
use App\Models\Cost;
use Illuminate\Http\Request;

class RangeControllerDoc
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *     path="/api/v1/costs/{cost}/ranges/{range}",
     *     operationId="showrange",
     *     tags={"range"},
     *
     *     summary="show range",
     *     description="show range",
     *
     *    @OA\Parameter(
     *       description="cost id",
     *       in="path",
     *       name="cost",
     *       required=true,
     *       example="1",
     *    ),
     *
     *     @OA\Parameter(
     *       name="range",
     *       in="path",
     *       description="range id",
     *       required=true,
     *       example="R123456",
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
    public function show(Cost  $cost, $range)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *     path="/api/v1/costs/{cost}/ranges",
     *     operationId="indexrange",
     *     tags={"range"},
     *
     *     summary="index range",
     *     description="index range",
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
    public function index()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @OA\Post(
     *     path="/api/v1/costs/{cost}/ranges",
     *     operationId="createranges",
     *     tags={"range"},
     *
     *     summary="store ranges",
     *     description="store new ranges",
     * 
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *   required={"types", "priority", "colleague" , "items"},
     *   @OA\Property(property="types", type="text"),
     *   @OA\Property(property="priority", type="int"),
     *   @OA\Property(property="colleague", type="text"),
     *   @OA\Property(property="items", type="text"),
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
    public function store(RangeRequest $request, Cost  $cost)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @OA\Patch(
     *     path="/api/v1/costs/{cost}/ranges/{R123456}",
     *     operationId="updateRange",
     *     tags={"range"},
     *
     *     summary="update ranges",
     *     description="update  ranges",
     *
     *    @OA\Parameter(
     *       description="ranges id",
     *       in="path",
     *       name="range",
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
     *   required={"types", "priority", "colleague" , "items"},
     *   @OA\Property(property="types", type="text"),
     *   @OA\Property(property="priority", type="int"),
     *   @OA\Property(property="colleague", type="text"),
     *   @OA\Property(property="items", type="text"),
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
    public function update(RangeRequest $request, Cost  $cost, $ranges)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @OA\Patch(
     *     path="/api/v1/costs/{cost}/ranges/{range}/priority",
     *     operationId="updatePriority",
     *     tags={"range"},
     *
     *     summary="update confirm Range",
     *     description="update confirm Range",
     *
     *    @OA\Parameter(
     *       description="cost id",
     *       in="path",
     *       name="cost",
     *       required=true,
     *       example="1",
     *    ),
     *     @OA\Parameter(
     *       description="range id",
     *       in="path",
     *       name="range",
     *       required=true,
     *       example="1",
     *    ),
     *
     *    @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *   required={"priority"},
     *   @OA\Property(property="priority", type="int"),
     *            ),
     *        ),
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
    public function updatePriority(UpdatePriorityRequest $request, Cost  $cost, $ranges)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @OA\Delete(
     *     path="/api/v1/costs/{cost}/ranges/{range}",
     *     operationId="deleterange",
     *     tags={"range"},
     *
     *     summary="delete range",
     *     description="delete range",
     *
     *    @OA\Parameter(
     *       description="cost id",
     *       in="path",
     *       name="cost",
     *       required=true,
     *       example="1",
     *    ),
     *
     *     @OA\Parameter(
     *       description="range id",
     *       in="path",
     *       name="range",
     *       required=true,
     *       example="R123456",
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
    public function delete(Request $request, Cost  $cost, $ranges)
    {
    }
}
