@extends('layouts.app')
@section('content')
    <div class="overflow-auto bg-gray-200">
        <div class="flex flex-col bg-white rounded-md shadow-md mb-10 mt-8 mx-8 p-8 overflow-x-auto">
            <h2 class="flex items-center font-bold text-gray-900 text-xl py-4 mx-4">
                Coupons
            </h2>
            <hr>
            {{ Form::open(['url'=>route('coupons.update'), 'files'=>true]) }}
            <table class="table-auto w-full">
                <thead class="text-sm font-normal text-gray-600 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-4">
                            Name
                        </th>
                        <th class="px-4 py-4">
                            Description
                        </th>
                        <th class="px-4 py-4">
                            Code
                        </th>
                        <th class="px-4 py-4">
                            Remove
                        </th>
                        <th class="px-4 py-4">
                           Coupon Image
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coupons as $coupon)
                        <tr class="border-t border-gray-200 text-sm text-gray-600 bg-transparent hover:bg-orange-100 transition ease-out duration-300">
                            <td class="text-right px-4 py-4">
                                <input class="bg-white border border-gray-300 rounded-md p-2 w-25"
                                       name="coupons[{{$coupon->id}}][name]"
                                       type="text"
                                       value="{{ $coupon->name }}"
                                >
                            </td>
                            <td class="text-right px-4 py-4">
                                <textarea class="bg-gray-100 border border-gray-300 rounded-md p-2"
                                          cols="30"
                                          name="coupons[{{$coupon->id}}][description]"
                                          rows="10">{{ $coupon->description }}</textarea>
                            </td>
                            <td class="text-right px-4 py-4">
                                <input class="bg-white border border-gray-300 rounded-md p-2 w-25"
                                       name="coupons[{{$coupon->id}}][code]"
                                       type="text"
                                       value="{{ $coupon->code }}"
                                >
                            </td>
                            <td class="px-4 py-4">
                                <a id="Remove"
                                   class="text-red-600 hover:text-opacity-75"
                                   href="{{ route('coupon.delete', [$coupon]) }}">Remove</a>
                            </td>
                            <td class="text-left px-4 py-4">
                                @if($coupon->image_url)
                                    <img src="{{ route('images.coupon_image', $coupon) }}"
                                         width="256px"
                                         alt="">
                                @endif
                                <input id="logo"
                                       accept="image/png, image/jpeg, image/jpg"
                                       class="text-sm text-gray-600"
                                       name="coupons[{{ $coupon->id }}][coupon_image]"
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
                {{ $coupons->links() }}
            </div>
        </div>
        <hr>
        <div class="flex flex-col bg-white rounded-md shadow-md mb-10 mt-8 mx-8 p-8">
            <h2 class="flex items-center font-bold text-gray-900 text-xl py-4">
                Create A Survey
            </h2>
            {{ Form::open(['url'=>route('coupon.create'), 'files'=>true, 'enctype'=>"multipart/form-data"]) }}
            <div>
                <textarea class="text-md text-gray-600 mb-10 h-20 bg-gray-100 border border-gray-300 w-full rounded-md p-4"
                          name="name"
                          placeholder="Name Of Coupon"
                ></textarea>
            </div>
            <div>
                <textarea class="text-md text-gray-600 mb-10 h-40 bg-gray-100 border border-gray-300 w-full rounded-md p-4"
                          name="description"
                          placeholder="Description"
                ></textarea>
            </div>
            <div>
                <input class="text-md text-gray-600 mb-10 h-10 w-10 bg-white border border-gray-300 w-full rounded-md p-4"
                       name="code"
                       placeholder="Code"
                >
            </div>
            <p class="text-md text-gray-800 my-2">Coupon Image file</p>
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
