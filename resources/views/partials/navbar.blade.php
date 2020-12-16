<header class="flex items-center bg-white shadow-lg border-b border-gray-200 px-2 py-2">
    <div class="absolute top-0 right-0 mt-4 mr-4">
        @if (Route::has('login'))
            <div class="space-x-4">
                @auth
                    <a
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                    >
                        Log out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    <div class="flex">
        <img class="h-10 mr-6" src="{{asset('fluvvia.png')}}" alt="Fluvvia Cafe and Bar" />
    </div>
    <div class="md:text-md text-md text-gray-800 font-semibold tracking-normal space-x-2">
        <a class="hover:bg-gray-50 hover:text-gray-600" href="{{ route('dash') }}">Dashboard</a>
        <a class="hover:bg-gray-50 hover:text-gray-600" href="{{ route('employees.show') }}">Employees</a>
        <a class="hover:bg-gray-50 hover:text-gray-600" href="{{ route('surveys.show') }}">Surveys</a>
        <a class="hover:bg-gray-50 hover:text-gray-600" href="#">Coupons</a>
    </div>
</header>
