@extends('layouts.app')
@section('content')
    <div class="overflow-auto bg-gray-200">
        <div class="flex flex-col bg-white rounded-md shadow-md mb-10 mt-8 mx-8 p-8 overflow-x-auto">
            <div class="w-full px-4 flex-1 border-b border-gray-200 flex items-end justify-between">
                <h5 class="flex items-center font-semibold text-gray-900 text-xl py-4">
                    <span class="mr-2">All Employees</span>
                </h5>
            </div>
            {{ Form::open(['url'=>route('employees.update'),'files'=>true, 'enctype'=>"multipart/form-data"]) }}
            <table class="table-auto w-full">
                <thead class="text-sm font-normal text-gray-600 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-4 text-left">
                            Full Name
                        </th>
                        <th class="px-4 py-4">
                            Start Date
                        </th>
                        <th class="px-4 py-4">
                            Salary (Yearly)
                        </th>
                        <th class="px-4 py-4">
                            Mobile Number
                        </th>
                        <th class="px-4 py-4">
                            Upload File
                        </th>
                        <th class="px-4 py-4">
                            Current Badge Image
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr @if(! $loop->last)
                            class="border-t border-gray-200 text-sm text-gray-600 bg-transparent hover:bg-orange-100 transition ease-out duration-300"
                            @else
                            class="text-sm text-gray-600 bg-transparent hover:bg-orange-100 transition ease-out duration-300"
                                @endif>
                            <td class="px-4 py-4">{{ $employee->name }}</td>
                            <td class="text-right px-4 py-4">
                                <input class="bg-white border border-gray-300 rounded-md p-2"
                                       type="text"
                                       name="employees[{{ $employee->id }}][start_date]"
                                       placeholder=""
                                       value="{{ $employee->start_date }}"
                                >
                            </td>
                            <td class="text-right px-4 py-4">
                                <input class="bg-white border border-gray-300 rounded-md p-2"
                                       type="text"
                                       name="employees[{{ $employee->id }}][salary]"
                                       placeholder=""
                                       value="{{ $employee->salary }}"
                                >
                            </td>
                            <td class="text-right px-4 py-4">
                                <input class="bg-white border border-gray-300 rounded-md p-2"
                                       type="text"
                                       name="employees[{{ $employee->id }}][mobile]"
                                       placeholder=""
                                       value="{{ $employee->mobile }}"
                                >
                            </td>
                            <td class="text-right px-4 py-4">
                                <input type="file"
                                       id="logo"
                                       name="employees[{{ $employee->id }}][badge_image]"
                                       accept="image/png, image/jpeg, image/jpg"
                                >
                            </td>
                            <td class="text-right px-4 py-4">
                                @if($employee->badge_image)
                                    <img src="{{ route('badge.image', $employee) }}" height="64px">
                                @else
                                    <p>No Logo Uploaded!</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ Form::submit('Update',['class'=>'uppercase bg-gray-500 text-white py-2 px-4 my-2 rounded-md hover:bg-opacity-75 transition ease-out duration-300']) }}
            {{ Form::close() }}

            <div class="flex flex-col my-4 mx-4 text-right">
                {{ $employees->links() }}
            </div>
        </div>
    </div>
@endsection
