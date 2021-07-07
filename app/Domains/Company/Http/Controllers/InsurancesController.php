<?php

namespace App\Domains\Company\Http\Controllers;

use App\Domains\Company\Http\Requests\StoreInsuranceRequest;
use App\Domains\Company\Services\InsuranceService;
use Illuminate\Http\Request;
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
