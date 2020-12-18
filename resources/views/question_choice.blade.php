@extends('layouts.app')
@section('content')
    <style>
        ul.breadcrumb {
            padding: 10px 16px;
            list-style: none;
        }

        ul.breadcrumb li {
            display: inline;
            font-size: 14px;
        }

        ul.breadcrumb li + li:before {
            padding: 8px;
            color: black;
            content: "/\00a0";
        }
    </style>
    <div class="overflow-auto bg-gray-200">
        <ul class="breadcrumb bg-gray-300">
            <li class="text-orange-400 hover:text-opacity-75"><a href="{{ route('surveys.show') }}">Surveys</a></li>
            <li class="text-orange-400 hover:text-opacity-75"><a href="{{ route('questions.show', $survey) }}">Survey Questions</a></li>
            <li class="text-gray-900">{{ $surveyQuestion->name }} - Question Choices</li>
        </ul>
        <hr>
        <div class="flex flex-col bg-white rounded-md shadow-md mb-10 mt-8 mx-8 p-8 overflow-x-auto">
            <div class="w-full px-4 flex-1 border-b border-gray-200 flex items-end justify-between">
                <h4 class="flex items-center font-semibold text-gray-900 text-xl py-4">
                    <span class="mr-2">Question Choices</span>
                </h4>
            </div>
            {{ Form::open(['url'=>route('choice.update', $surveyQuestion)]) }}
            <table class="table-auto w-full">
                <thead class="text-sm font-normal text-gray-600 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-4 text-left">
                            Name
                        </th>
                        <th class="px-4 py-4 text-left">
                            Ordinality
                        </th>
                        <th class="px-4 py-4 text-left">
                            Delete
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surveyQuestion->choices->sortBy('ordinality') as $choice)
                        <tr @if(! $loop->last)
                            class="border-t border-gray-200 text-sm text-gray-600 bg-transparent hover:bg-orange-100 transition ease-out duration-300"
                            @else
                            class="text-sm text-gray-600 bg-transparent hover:bg-orange-100 transition ease-out duration-300"
                                @endif>
                            <td class="px-4 py-4">
                                <textarea class="text-left md:w-2/4 h-20 bg-gray-100 border border-gray-300 rounded-md p-2"
                                          name="choices[{{$choice->id}}][name]"
                                          type="textarea">{{ $choice->name }}</textarea>
                            </td>
                            <td class="px-4 py-4">
                                <input class="bg-white border border-gray-300 rounded-md p-2"
                                       name="choices[{{$choice->id}}][ordinality]"
                                       type="text"
                                       value="{{ $choice->ordinality }}">
                            </td>
                            <td class="px-4 py-4">
                                <a id="Remove"
                                   class="text-red-600 text-bold"
                                   href="{{ route('choice.delete', $choice) }}">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ Form::submit('Update Choices',['class'=>'uppercase bg-gray-500 text-white py-2 px-2 rounded-md hover:bg-opacity-75 transition ease-out duration-300']) }}
            {{ Form::close() }}
        </div>
        <hr>
        <div class="flex flex-col bg-white rounded-md shadow-md mb-10 mt-8 mx-8 p-8">
            <div class="w-full px-4 flex-1 border-b border-gray-200 flex items-end justify-between">
                <h5 class="flex items-center font-semibold text-gray-900 text-xl py-4">
                    <span class="mr-2">Add A New Choice</span>
                </h5>
            </div>
            {{ Form::open(['url'=>route('choice.create', $surveyQuestion)]) }}
            <div>
                <textarea class="text-md text-gray-600 mb-10 h-20 w-full bg-gray-100 border border-gray-300 rounded-md p-4"
                          name="name"
                          placeholder="Name Of New Choice"></textarea>
            </div>
            <div>
                <input class="text-md text-gray-600 mb-10 h-10 w-10 bg-white border border-gray-300 w-full rounded-md p-4"
                       name="ordinality"
                       placeholder="Ordinality Of New Choice"
                >
            </div>
            {{ Form::submit('Add',['class'=>'uppercase bg-gray-500 text-white py-2 px-2 rounded-md hover:bg-opacity-75 transition ease-out duration-300']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop
@push('scripts')
@endpush
