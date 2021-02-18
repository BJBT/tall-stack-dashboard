<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Task;
use Carbon\Carbon;
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

        $revenue_today = Order::whereDate('created_at', '=', Carbon::today())
                ->sum('amount_in_cents') / 100;

        $revenue_past_30 = Order::whereDate('created_at', '>', Carbon::now()->subDays(30))
                ->sum('amount_in_cents') / 100;

        $orders_today = Order::whereDate('created_at', '=', Carbon::today())
            ->count();

        $orders_past_30 = Order::whereDate('created_at', '>', Carbon::now()->subDays(30))
                ->count();

        $new_customers_today = Customer::whereDate('created_at', '=', Carbon::today())
            ->count();

        $tasks_count = Task::count();

        return view('dashboard',
            compact('tasks', 'customers', 'employees', 'revenue_today', 'revenue_past_30', 'orders_today', 'orders_past_30', 'new_customers_today', 'tasks_count'));
    }
}
