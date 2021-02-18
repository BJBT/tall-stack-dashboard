@extends('layouts.app')
@section('content')
    <!--Container-->
{{--<div class="container w-full mx-auto pt-10">--}}
    <div class="overflow-auto bg-gray-200">
        <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">

            <!--Analytics Content-->
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-white rounded-lg shadow-md p-2 text-sm text-gray-600 bg-transparent hover:bg-orange-100 transition ease-out duration-300">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-2 shadow-lg bg-green-600"><i class="fa fa-wallet fa-lg fa-fw fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-500">Total Revenue <span class="text-xs">(Today)</span></h5>
                                <h3 class="font-bold text-2xl">${{ $revenue_today }} <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-white rounded-lg shadow-md p-2 text-sm text-gray-600 bg-transparent hover:bg-orange-100 transition ease-out duration-300">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-2 shadow-lg bg-pink-600"><i class="fas fa-users fa-lg fa-fw fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-500">Total Sales <span class="text-xs">(Today)</span></h5>
                                <h3 class="font-bold text-2xl">{{ $orders_today }} <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-white rounded-lg shadow-md p-2 text-sm text-gray-600 bg-transparent hover:bg-orange-100 transition ease-out duration-300">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-2 shadow-lg bg-yellow-600"><i class="fas fa-user-plus fa-lg fa-fw fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-500">New Customers</h5>
                                <h3 class="font-bold text-2xl">{{ $new_customers_today }} <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-white rounded-lg shadow-md p-2 text-sm text-gray-600 bg-transparent hover:bg-orange-100 transition ease-out duration-300">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-2 shadow-lg bg-green-600"><i class="fa fa-wallet fa-lg fa-fw fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-500">Total Revenue <span class="text-xs">(Last 30 Days)</span></h5>
                                <h3 class="font-bold text-2xl">${{ $revenue_past_30 }} <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-white rounded-lg shadow-md p-2 text-sm text-gray-600 bg-transparent hover:bg-orange-100 transition ease-out duration-300">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-2 shadow-lg bg-pink-600"><i class="fas fa-users fa-lg fa-fw fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-500">Total Sales <span class="text-xs">(Last 30 Days)</span></h5>
                                <h3 class="font-bold text-2xl">{{ $orders_past_30 }} <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-white rounded-lg shadow-md p-2 text-sm text-gray-600 bg-transparent hover:bg-orange-100 transition ease-out duration-300">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-2 shadow-lg bg-indigo-600"><i class="fas fa-tasks fa-lg fa-fw fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-500">To Do List</h5>
                                <h3 class="font-bold text-2xl">{{ $tasks_count }} tasks</h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
            </div>

            <!--Divider-->
            <hr class="border-b-2 border-gray-400 my-8 mx-4">

            <div class="flex flex-row flex-wrap flex-grow mt-2" >
                <!--Graph Card-->
                <div class="w-full md:w-1/2 p-3">
                    <div class="bg-white border rounded shadow">
                        <div class="border-b p-3">
                            <h5 class="font-bold uppercase text-gray-600 text-center">
                                Total Sales Today
                            </h5>
                        </div>
                        <div class="p-5">
                            <!-- Chart's container -->
                            <div id="ts_today_chart" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
                <!--/Graph Card-->

                <!--Graph Card-->
                <div class="w-full md:w-1/2 p-3">
                    <div class="bg-white border rounded shadow">
                        <div class="border-b p-3">
                            <h5 class="font-bold uppercase text-gray-600 text-center">
                                Total Sales mo/mo
                            </h5>
                        </div>
                        <div class="p-5">
                            <div id="ts_month_chart" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
                <!--/Graph Card-->

                <!--Employee Card-->
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <div class="bg-white border rounded shadow">
                        <div class="border-b p-3">
                            <h5 class="font-bold uppercase text-gray-600 text-center">
                                Top Employees
                            </h5>
                        </div>
                        <div class="p-5">
                            <table class="table-auto w-full h-full">
                                <thead class="text-sm font-normal text-gray-600 border-b border-gray-200">
                                    <tr>
                                        <th class="">Employee</th>
                                        <th class="">Amount Sold ($)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                    <tr class="border-t border-gray-200 text-sm text-gray-600 bg-transparent hover:bg-orange-100 transition ease-out duration-300">
                                        <td class="py-4 px-4">
                                            {{ $employee->name }}
                                        </td>
                                        <td class="py- px-4">
                                            <span class="text-green-500"> ${{ $employee->amount_in_cents / 100 }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/Employee Card-->

                <!--Customer Card-->
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <div class="bg-white border rounded shadow">
                        <div class="border-b p-3">
                            <h5 class="font-bold uppercase text-gray-600 text-center">
                                Top Customers
                            </h5>
                        </div>
                        <table class="table-auto w-full h-full">
                            <thead class="text-sm font-normal text-gray-600 border-b border-gray-200">
                                <tr>
                                    <th class="">Customer</th>
                                    <th class="">Amount Spent ($)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                <tr class="border-t border-gray-200 text-sm text-gray-600 bg-transparent hover:bg-orange-100 transition ease-out duration-300">
                                        <td class="py-4 px-4">
                                            {{ $customer->name }}
                                        </td>
                                        <td class="py- px-4">
                                            <span class="text-green-500"> ${{ $customer->amount_in_cents / 100 }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/Customer Card-->

                <!--Task Card-->
                <div class="w-full md:w-1/2 xl:w-1/3 p-3 overflow-y-auto">
                    <div class="bg-white border rounded shadow">
                        <div class="border-b p-3">
                            <h5 class="font-bold uppercase text-gray-600 text-center">
                                Notes / To-Do's
                            </h5>
                        </div>
                        @foreach($tasks as $task)
                            <div class="p-2">
                                <ul>
                                    <li>- {{ $task->title }}</li>
                                    <hr>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!--/Task Card-->
            </div>

        </div>
    </div>
@endsection
