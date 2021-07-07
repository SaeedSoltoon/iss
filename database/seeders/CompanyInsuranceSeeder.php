<?php

namespace Database\Seeders;

use App\Domains\Company\Models\InsuranceCompany;
use App\Domains\Company\Models\Insurance;
use Illuminate\Database\Seeder;

class CompanyInsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insurances = Insurance::all();
        InsuranceCompany::all()->each(function (InsuranceCompany $company) use ($insurances) {
            $company->insurances()->attach(
                $insurances->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
    }
}
