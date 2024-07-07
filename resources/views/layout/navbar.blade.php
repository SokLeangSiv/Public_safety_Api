
@php

    
    
    // $profileImage = Auth::user()->image;



@endphp

<nav class="bg-white dark:bg-gray-900  w-full  z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 gap-8">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{asset('img/logo.png')}}" class="h-24" alt="Flowbite Logo">
            {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span> --}}
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            {{-- <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</button>
             --}}

            <div class="navbar-end flex items-center space-x-4">
                @if (Route::has('login'))
                    <div class="lg:py-2 lg:px-2 py-5 md:py-10 text-right">
                        @auth
                            <div class="relative">
                                {{-- get current user img from user table --}}
                                <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
                                    data-dropdown-placement="bottom-start" class="w-32  rounded-full cursor-pointer"

                                    src="{{ $profileImage ? url('user/images/'. $profileImage) : url('noProfile.png') }}">
                                <div id="userDropdown"
                                    class="z-50 absolute top-full right-0 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                        <div>
                                            {{ Auth::user()->name }}
                                        </div>
                                        <div class="font-medium truncate">{{ Auth::user()->email }}</div>
                                    </div>

                                    <div class="py-1">
                                        <a href="{{route('show.profile')}}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                            Profie</a>
                                    </div>
                                    <div class="py-1">
                                        <a href="{{ route('user.logout') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                            out</a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}"
                                class="font-semibold text-white hover:text-gray-900 dark:text-gray-400 dark:hover:text-slate-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                <button
                                    class="btn bg-slate-700 text-white hover:text-slate-700 px-12 sm:px-10 xl:px-10 lg:px-6 md:px-10 sm:mb-5 mb-5 lg:mb-0 md:mb-0">Login</button>
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                    <button
                                        class="btn text-black border-slate-800 border-2 hover:text-slate-700 px-10 sm:px-10 xl:px-10 lg:px-6 md:px-10 sm:mb-5 mb-5 lg:mb-0 md:mb-0">Register</button>
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>



            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('show.form') }}"
                        class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                        aria-current="page">Report Incident</a>
                </li>
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                        class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                        Service
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="{{ route('show.fire') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Fire
                                    Service</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ route('show.about.us') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About
                        Us</a>
                </li>
                <li>
                    <a href="{{ route('show.contact.us') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact
                        Us</a>
                </li>
                <li>
                    <a href="{{ route('show.emergency') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Emergency
                        Contact</a>
                </li>
                <li>
                    <a href="{{ route('show.feedback') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Feedback</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Add this div to hold the right-end elements -->
{{-- <div class="navbar-end flex items-center space-x-4">
    @if (Route::has('login'))
        <div class="lg:py-10 lg:px-2 py-5 md:py-10 text-right">
            @auth
                <div class="relative">
                    <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
                        data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer"
                        src="/docs/images/people/profile-picture-5.jpg" alt="User dropdown">
                    <div id="userDropdown"
                        class="z-50 absolute top-full right-0 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div>Bonnie Green</div>
                            <div class="font-medium truncate">name@flowbite.com</div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 menu menu-sm dropdown-content mt-3 z-50 p-2 shadow bg-base-100 rounded-box w-52"
                            aria-labelledby="avatarButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                out</a>
                        </div>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="font-semibold text-white hover:text-gray-900 dark:text-gray-400 dark:hover:text-slate-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    <button
                        class="btn bg-slate-700 text-white hover:text-slate-700 px-12 sm:px-10 xl:px-10 lg:px-6 md:px-10 sm:mb-5 mb-5 lg:mb-0 md:mb-0">Login</button>
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        <button
                            class="btn text-black border-slate-800 border-2 hover:text-slate-700 px-10 sm:px-10 xl:px-10 lg:px-6 md:px-10 sm:mb-5 mb-5 lg:mb-0 md:mb-0">Register</button>
                    </a>
                @endif
            @endauth
        </div>
    @endif
</div> --}}
