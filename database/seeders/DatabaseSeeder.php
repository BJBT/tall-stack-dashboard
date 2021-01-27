<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Product;
use App\Models\Survey;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Employee::factory(10)->create();
         Survey::factory(10)->create();
         Customer::factory(10)->create();
         Order::factory(10)->create();
         Product::factory(10)->create();
         Task::factory()->create();
    }
}
