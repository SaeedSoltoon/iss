<?php

namespace Database\Factories;

use App\Models\Insurance;
use Illuminate\Database\Eloquent\Factories\Factory;

class InsuranceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Insurance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->randomElement(['بیمه آسانسور', 'بیمه زلزله', 'بیمه آتش سوزی', 'بیمه درمان تکمیلی', 'بیمه حوادث انفرادی', 'بیمه عمر', 'بیمه مسافرتی', 'بیمه موتور', 'بیمه بدنه', 'بیمه شخص ثالث']);
        return [
            'title'         => $title,
            'slug'          => \Str::slug($title),
            'description'   => $this->faker->text,
        ];
    }
}
