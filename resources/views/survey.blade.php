@extends('layouts.app')
@section('content')
    <div class="overflow-auto bg-gray-200">
        <div class="flex flex-col bg-white rounded-md shadow-md mb-10 mt-8 mx-8 p-8 overflow-x-auto">
            <h2 class="flex items-center font-bold text-gray-900 text-xl py-4 mx-4">
                Surveys
            </h2>
            <hr>
            {{ Form::open(['url'=>route('surveys.update'), 'files'=>true]) }}
            <table class="table-fixed w-full">
                <thead class="text-sm font-normal text-gray-600 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-4">
                            Name
                        </th>
                        <th class="px-4 py-4">
                            Initial Message
                        </th>
                        <th class="px-4 py-4">
                            Is Active?
                        </th>
                        <th class="px-4 py-4">
                            Ordinality
                        </th>
                        <th class="px-4 py-4">
                            Add / Edit Questions
                        </th>
                        <th class="px-4 py-4">
                            Remove Survey
                        </th>
                        <th class="px-4 py-4">
                            Image
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($surveys->sortBy('ordinality') as $survey)
                        <tr class="border-t border-gray-200 text-sm text-gray-600 bg-transparent hover:bg-orange-100 transition ease-out duration-300">
                            <td class="px-4 py-4">
                                {{ $survey->name }}
                            </td>
                            <td class="text-right px-4 py-4">
                                <textarea class="bg-gray-100 border border-gray-300 rounded-md p-2"
                                          cols="30"
                                          name="survey[{{$survey->id}}][initial_message]"
                                          rows="10">{{ $survey->initial_message }}</textarea>
                            </td>
                            <td class="text-right px-4 py-4">
                                {{ Form::checkbox("survey[{$survey->id}][is_active]",1,$survey->is_active) }}
                            </td>
                            <td class="text-right px-4 py-4">
                                <input class="bg-white border border-gray-300 rounded-md p-2 w-25"
                                       name="survey[{{$survey->id}}][ordinality]"
                                       type="text"
                                       value="{{ $survey->ordinality }}"
                                >
                            </td>
                            <td class="text-right px-4 py-4">
                                <a class="text-tangerine hover:text-opacity-75"
                                   href="/survey_questions/{{$survey->id}}">Add/Edit Questions</a>
                            </td>
                            <td class="px-4 py-4">
                                <a id="Remove"
                                   class="text-red-600 hover:text-opacity-75"
                                   href="{{ route('survey.delete', [$survey]) }}">Remove</a>
                            </td>
                            <td class="px-4 py-4">
                                @if($survey->image_url)
                                    <img src="{{ route('images.survey_image',$survey) }}"
                                         width="256px"
                                         alt="">
                                    <a href="{{ route('survey.remove_image',$survey) }}">Remove Image</a>
                                @endif
                                <input id="logo"
                                       accept="image/png, image/jpeg, image/jpg"
                                       class="text-sm text-gray-600"
                                       name="survey[{{ $survey->id }}][survey_image]"
                                       type="file"
                                >
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ Form::submit('Update',['class'=>'uppercase bg-gray-500 text-white py-2 px-2 mx-2 my-2 rounded-md hover:bg-opacity-75 transition ease-out duration-300']) }}
            {{ Form::close() }}

            <div class="flex flex-col my-4 mx-4 text-right">
                {{ $surveys->links() }}
            </div>
        </div>
        <hr>
        <div class="flex flex-col bg-white rounded-md shadow-md mb-10 mt-8 mx-8 p-8">
            <h2 class="flex items-center font-bold text-gray-900 text-xl py-4">
                Create A Survey
            </h2>
            {{ Form::open(['url'=>route('survey.create'), 'files'=>true, 'enctype'=>"multipart/form-data"]) }}
            <div>
                <textarea class="text-md text-gray-600 mb-10 h-20 bg-gray-100 border border-gray-300 w-full rounded-md p-4"
                          name="name"
                          placeholder="Name Of Survey"
                ></textarea>
            </div>
            <div>
                <textarea class="text-md text-gray-600 mb-10 h-40 bg-gray-100 border border-gray-300 w-full rounded-md p-4"
                          name="initial_message"
                          placeholder="Initial Message"
                ></textarea>
            </div>
            <div>
                <input class="text-md text-gray-600 mb-10 h-10 w-10 bg-white border border-gray-300 w-full rounded-md p-4"
                       name="ordinality"
                       placeholder="Ordinality Of Survey"
                >
            </div>
            <p class="text-md text-gray-800 my-2">Survey Image file</p>
            <div>
                <input id="image"
                       accept="image/png, image/jpeg, image/jpg"
                       class="text-sm text-gray-600"
                       name="image_url"
                       type="file">
            </div>
            {{ Form::submit('Add',['class'=>'uppercase bg-gray-500 text-white py-2 px-2 mx-2 my-2 rounded-md hover:bg-opacity-75 transition ease-out duration-300']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection
