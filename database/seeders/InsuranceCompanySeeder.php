<?php

namespace Database\Seeders;

use App\Domains\Company\Models\InsuranceCompany;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class InsuranceCompanySeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        $this->truncate('insurance_companies');

        InsuranceCompany::factory()
            ->count(10)
            ->create();
    }
}
