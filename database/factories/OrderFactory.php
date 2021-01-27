<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $total = random_int(5000, 25000);

        return [
            'customer_id' => Customer::factory()->create(),
            'employee_id' => Employee::factory()->create(),
            'product_id' => Product::factory()->create(),
            'amount_in_cents' => $total,
        ];
    }
}
