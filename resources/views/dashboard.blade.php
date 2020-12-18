@extends('layouts.app')
@section('content')
    <div class="bg-gray-100 flex flex-col justify-content-center min-h-screen sm:px-6 lg:px-8">
        <div class="mt-4 grid grid-cols-4 gap-4">
            <div class="bg-pink-400 shadow-lg rounded-lg py-8 px-8">1</div>
            <div class="bg-pink-400 shadow-lg rounded-lg py-8 px-8">2</div>
            <div class="bg-pink-400 shadow-lg rounded-lg py-8 px-8">3</div>
            <div class="bg-pink-400 shadow-lg rounded-lg py-8 px-8">4</div>
        </div>
        <div class="card col-1 flex items-center justify-center">
            <div class="flex flex-col md:flex-row py-2 px-2 space-y-10 justify-content-center">
                <div class="bg-gray-600 shadow-lg rounded-lg md:mx-2 py-2 px-2 space-y-8">
                    <a href="{{ route('home') }}">
                        <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
                    </a>

                    <h1 class="text-5xl font-extrabold tracking-wider text-center text-gray-400">
                        Tall Dashboard
                    </h1>
                </div>
            </div>
        </div>
    </div>
@endsection
