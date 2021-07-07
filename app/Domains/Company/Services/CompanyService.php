<?php

namespace App\Domains\Company\Services;

use App\Domains\Company\Models\InsuranceCompany;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Exception;

/**
 * Class CompanyService.
 */
class CompanyService extends BaseService
{
    /**
     * CompanyService constructor.
     *
     * @param  InsuranceCompany  $company
     */
    public function __construct(InsuranceCompany $company)
    {
        $this->model = $company;
    }

    /**
     * @param  array  $data
     *
     * @return InsuranceCompany
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): InsuranceCompany
    {
        DB::beginTransaction();

        try {
            $user = $this->createCompany($data);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating your Insurace Company.'));
        }

        DB::commit();

        return $user;
    }

    /**
     * @param  array  $data
     *
     * @return InsuranceCompany
     */
    protected function createCompany(array $data = []): InsuranceCompany
    {
        return $this->model::create([
            'title'         => $data['title'],
            'slug'          => $data['slug'],
            'description'   => $data['description'],
            'website'       => $data['website'],
            'logo'          => $data['logo'],
            'bio'           => $data['bio'],
            'created_by'    => $data['created_by'],
        ]);
    }
}
