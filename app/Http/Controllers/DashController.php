<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $customers = DB::table('customers')
            ->leftJoin('orders', 'customers.id', '=', 'orders.customer_id')
            ->orderByDesc('amount_in_cents')
            ->limit(5)
            ->get();

        $employees = DB::table('employees')
            ->leftJoin('orders', 'employees.id', '=', 'orders.employee_id')
            ->orderByDesc('amount_in_cents')
            ->limit(5)
            ->get();

        return view('dashboard', compact('tasks', 'customers', 'employees'));
    }
}
