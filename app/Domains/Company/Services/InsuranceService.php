<?php

namespace App\Domains\Company\Services;

use App\Domains\Company\Models\Insurance;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Exception;
use phpDocumentor\Reflection\Types\Boolean;
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
            $insurance = $this->createInsurance($data);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating your Insurace product.'));
        }

        DB::commit();

        return $insurance;
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
            'description'   => $data['description'],
        ]);
    }

    /**
     * @param  array  $data
     *
     * @return bool
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(Insurance $insurance, array $data = []): bool
    {
        DB::beginTransaction();

        try {
            $insurance = $this->updateInsurance($insurance, $data);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating your Insurace product.'));
        }

        DB::commit();

        return $insurance;
    }

    /**
     * @param  array  $data
     *
     * @return Boolean
     */
    protected function updateInsurance(Insurance $insurance, array $data = []): bool
    {
        return $insurance->update([
            'title'         => $data['title'],
            'description'   => $data['description'],
        ]);
    }
}
