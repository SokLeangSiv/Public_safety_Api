@extends('master')
@section('content')
    <div class="bg-gray-900 py-20 mb-20">
        <div class="container mx-auto px-6 md:px-12">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 lg:w-2/3">
                    <h1 class="text-4xl md:text-6xl lg:text-7xl text-white font-bold mb-6">
                        Welcome to our <br class="hidden md:block" />
                        <span class="text-indigo-500">Awesome</span> Website
                    </h1>
                    <p class="text-lg md:text-xl lg:text-2xl text-gray-400 mb-8 ">
                        We are serving the service for our community <br>
                        <span class="mt-6">"Empowering communities to report crime and build safer neighborhoods."</span>
                    </p>

                </div>
                <div class="md:w-1/2 lg:w-1/3 mt-8 md:mt-0">
                    <img src="{{ asset('img/aboutus/police.jpg') }}" alt="Hero Image" class="rounded-lg shadow-lg" />
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 max-w-7xl mx-auto mb-20">

        <div class=" max-w-full h-full  mx-auto mb-20 font-bold">
            <hr class="w-full bg-slate-700 h-[3px] mb-1">
            <hr class="w-[85%] bg-black h-[3px] ms-[40px]">


            <div class="pt-20 px-14">
                <p class="text-pretty font-monospace "> The Government has long yearn for a safer place to live
                    for the people and understanding the inconvenience and fear
                    of the people in reporting  crime which is the first step to build
                    a safer communities which is why we have launch a new crime-reporting website. </p>
            </div>


            <div class="pt-12 px-16 pb-20">
                <p class="text-justify font-monospace "> The Government has long yearn for a safer place to live
                    for the people and understanding the inconvenience and fear
                    of the people in reporting  crime which is the first step to build
                    a safer communities which is why we have launch a new crime-reporting website. </p>
            </div>


            <hr class="w-[85%] bg-black h-[3px] ms-[40px] mb-1">
            <hr class="w-full bg-black h-[3px] ">
        </div>

        <div class="div">

            <div class="flex justify-center mb-10">
                <img class="h-[300px] max-w-xl  rounded-lg" src="{{ asset('img/aboutus/police3.jpg') }}"
                    alt="image description">
            </div>



            <div
                class="max-w-md p-6  mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Know More ?</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">You can learn more about our website and
                    services that can provided online and in real time </p>
                <a href="#"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>


        </div>

    </div>

@endsection
