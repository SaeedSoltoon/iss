<?php

namespace App\Domains\Company\Http\Controllers;

use App\Domains\Company\Http\Requests\StoreCompanyRequest;

use App\Domains\Company\Services\CompanyService;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class CompaniesController extends Controller
{
    /**
     * @var CompanyService
     */
    protected $companyService;

    /**
     * CompaniesController constructor.
     * @param  CompanyService  $CompanyService
     */
    public function __construct(CompanyService $service)
    {
        $this->middleware('auth');
        $this->companyService = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/insurance-company",
     *      operationId="getInsuranceCompanyList",
     *      tags={"Insurance Companies"},
     *      summary="Get list of Insurance Companies",
     *      description="Returns list of Insurance Companies",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/InsuranceCompanyResource")
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
        return $this->companyService->all();
    }

    /**
     * Display a listing of the resource with relations.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return $this->companyService->with('insurances')->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        return $this->companyService->store($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($companyId)
    {
        return $this->companyService->with('insurances')->getById($companyId);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompanyRequest $request, $companyId)
    {
        $this->companyService->update(
            $this->companyService->getById($companyId),
            $request->validated()
        );
    }

    /**
     * @OA\Delete(
     *      path="/api/insurance-company/{companyId}/delete",
     *      operationId="deleteInsuranceCompany",
     *      tags={"Insurance Companies"},
     *      summary="Delete existing Insurance Company",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="companyId",
     *          description="company id",
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
    public function destroy($companyId)
    {
        $this->companyService->deleteById($companyId);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
