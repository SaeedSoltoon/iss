<?php

namespace Database\Factories;

use App\Domains\Company\Models\InsuranceCompany;
use Illuminate\Database\Eloquent\Factories\Factory;

class InsuranceCompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InsuranceCompany::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->randomElement();
        $title = $this->faker->randomElement(['بیمه ایران', 'بیمه پارسیان', 'بیمه پاسارگاد', 'بیمه ملت', 'بیمه آسیا', 'بیمه ما', 'بیمه دانا', 'بیمه البرز', 'بیمه سامان', 'بیمه رازی', 'بیمه کوثر', 'بیمه سرمد', 'بیمه تعاون', 'بیمه سینا', 'بیمه آرمان']);
        return [
            'title'         => $title,
            'description'   => $this->faker->text,
            'website'       => $this->faker->url,
            'logo'          => $this->faker->imageUrl(),
            'bio'           => $this->faker->paragraph(),
            'created_by'    => 1,
        ];
    }
}
