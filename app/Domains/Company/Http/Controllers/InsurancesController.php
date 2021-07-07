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
     * Display a listing of the resource with relations.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return $this->insuranceService->with('companies')->all();
    }

    /**
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
