<?php

namespace Database\Seeders;

use App\Domains\Company\Models\Insurance;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class InsuranceSeeder extends Seeder
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

        $this->truncate('insurances');

        Insurance::factory()
            ->count(10)
            ->create();
    }
}
