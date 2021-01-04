<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Models\User;
use Tests\TestCase;

class EmployeesTest extends TestCase
{
    /** @test */
    public function we_can_update_an_employee_from_the_front_end()
    {
        User::where('id', '>', 0)->delete();
        Employee::where('id', '>', 0)->delete();

        $user = User::factory()->create();
        auth()->login($user);

        $old_start_date = 1973-06-02;
        $old_salary = 60000;
        $old_mobile = (551)-840-9875;

        $new_start_date = 1973-06-04;
        $new_salary = 80000;
        $new_mobile = (551)-840-9999;

        $employee = Employee::factory()->create([
            'start_date' => $old_start_date,
            'salary' => $old_salary,
            'mobile' => $old_mobile
        ]);

        $this->visitRoute('employees.show');
        $this->type($new_start_date, "employees[{$employee->id}][start_date]");
        $this->type($new_salary, "employees[{$employee->id}][salary]");
        $this->type($new_mobile, "employees[{$employee->id}][mobile]");
        $this->press('Update');
        $this->seePageIs(route('employees.show'));
    }
}
