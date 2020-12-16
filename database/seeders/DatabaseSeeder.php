<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Survey;
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
    }
}
