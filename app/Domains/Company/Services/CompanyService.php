<?php

namespace App\Domains\Company\Services;

use App\Domains\Company\Models\InsuranceCompany;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Exception;
use phpDocumentor\Reflection\Types\Boolean;
use Str;

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
            $company = $this->createCompany($data);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating your Insurace Company.'));
        }

        DB::commit();

        return $company;
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
            'description'   => $data['description'],
            'website'       => $data['website'],
            'logo'          => $data['logo'],
            'bio'           => $data['bio'],
            'created_by'    => auth()->id(),
        ]);
    }

    /**
     * @param  array  $data
     *
     * @return Boolean
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(array $data = []): bool
    {
        DB::beginTransaction();

        try {
            $company = $this->updateCompany($data);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating your Insurace Company.'));
        }

        DB::commit();

        return $company;
    }

    /**
     * @param  array  $data
     *
     * @return Boolean
     */
    protected function updateCompany(array $data = []): bool
    {
        return $this->model->update([
            'title'         => $data['title'],
            'description'   => $data['description'],
            'website'       => $data['website'],
            'logo'          => $data['logo'],
            'bio'           => $data['bio'],
        ]);
    }
}
