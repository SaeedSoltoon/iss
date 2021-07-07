<?php

namespace App\Domains\Company\Http\Controllers;

use App\Domains\Company\Http\Requests\StoreInsuranceRequest;
use App\Domains\Company\Services\InsuranceService;
use App\Http\Controllers\Controller;

class InsurancesController extends Controller
{
    /**
     * @var InsuranceService
     */
    protected $insuranceService;

    /**
     * InsurancesController constructor.
     * @param  InsuranceService  $insuranceService
     */
    public function __construct(InsuranceService $service)
    {
        $this->middleware('auth');
        $this->insuranceService = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/insurance",
     *      operationId="getInsuranceList",
     *      tags={"Insurances"},
     *      summary="Get list of Insurances",
     *      description="Returns list of Insurances",
     *      security={{"bearerAuth":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/InsuranceResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     *
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->insuranceService->all();
    }

    /**
     * @OA\Get(
     *      path="/api/insurance/companies",
     *      operationId="getInsuranceListWithComapanies",
     *      tags={"Insurances"},
     *      summary="Get list of Insurances with Companies",
     *      description="Returns list of Insurances",
     *      security={{"bearerAuth":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/InsuranceResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     * Display a listing of the resource with relations.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return $this->insuranceService->with('companies')->all();
    }

    /**
     * @OA\Post(
     *      path="/api/insurance",
     *      operationId="sotreInsurance",
     *      tags={"Insurances"},
     *      summary="Add new Insurance",
     *      description="Add new Inusrance and returns it",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *            @OA\Property(
     *              property="title",
     *              type="string",
     *            ),
     *            @OA\Property(
     *              property="description",
     *              type="string",
     *            ),
     *          ),
     *        ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/InsuranceResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     *
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInsuranceRequest $request)
    {
        return $this->insuranceService->store($request->validated());
    }

    /**
     * @OA\Get(
     *      path="/api/insurance/{insuranceId}/show",
     *      operationId="showInsurance",
     *      tags={"Insurances"},
     *      summary="show existing Insurance",
     *      description="retrieve a record and returns it",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="insuranceId",
     *          description="insurance id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *         response="200",
     *         description="ok",
     *         @OA\JsonContent(ref="#/components/schemas/Insurance")
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
     *
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($insuranceId)
    {
        return $this->insuranceService->with('companies')->getById($insuranceId);
    }

    /**
     * @OA\Put(
     *      path="/api/insurance/{insuranceId}/update",
     *      operationId="updateInsurance",
     *      tags={"Insurances"},
     *      summary="update existing Insurance",
     *      description="Update a record and returns no content",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *            @OA\Property(
     *              property="title",
     *              type="string",
     *            ),
     *            @OA\Property(
     *              property="description",
     *              type="string",
     *            ),
     *          ),
     *        ),
     *      ),
     *      @OA\Parameter(
     *          name="insuranceId",
     *          description="insurance id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
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
     *
     * Update the specified resource in storage.
     *
     * @param  StoreInsuranceRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreInsuranceRequest $request, $insuranceId)
    {
        return $this->insuranceService->update(
            $this->insuranceService->getById($insuranceId),
            $request->validated()
        );
    }

    /**
     * @OA\Delete(
     *      path="/api/insurance/{insuranceId}/delete",
     *      operationId="deleteInsurance",
     *      tags={"Insurances"},
     *      summary="Delete existing Insurance",
     *      description="Deletes a record and returns no content",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="insuranceId",
     *          description="insurance id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
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
     *
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($insuranceId)
    {
        return $this->insuranceService->deleteById($insuranceId);
    }
}
