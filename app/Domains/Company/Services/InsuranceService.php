<?php

namespace App\Domains\Company\Services;

use App\Domains\Company\Models\Insurance;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Exception;
use Str;

/**
 * Class InsuranceService.
 */
class InsuranceService extends BaseService
{
    /**
     * InsuranceService constructor.
     *
     * @param  Insurance  $insurance
     */
    public function __construct(Insurance $insurance)
    {
        $this->model = $insurance;
    }

    /**
     * @param  array  $data
     *
     * @return Insurance
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Insurance
    {
        DB::beginTransaction();

        try {
            $user = $this->createInsurance($data);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating your Insurace product.'));
        }

        DB::commit();

        return $user;
    }

    /**
     * @param  array  $data
     *
     * @return Insurance
     */
    protected function createInsurance(array $data = []): Insurance
    {
        return $this->model::create([
            'title'         => $data['title'],
            'slug'          => Str::slug($data['title']),
            'description'   => $data['description'],
        ]);
    }
}
