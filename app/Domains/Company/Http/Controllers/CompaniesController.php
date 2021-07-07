<?php

namespace App\Domains\Company\Http\Controllers;

use App\Domains\Company\Http\Requests\StoreCompanyRequest;

use App\Domains\Company\Services\CompanyService;
use Illuminate\Http\Request;
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
        $company = $this->companyService->getById($companyId);
        $company->update(
            $request->validated()
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($companyId)
    {
        return $this->companyService->deleteById($companyId);
    }
}
