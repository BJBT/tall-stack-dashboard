<?php

namespace Database\Factories;

use App\Models\SurveyCoupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SurveyCouponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SurveyCoupon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'code' => $this->faker->numberBetween(100, 9999)
        ];
    }
}
