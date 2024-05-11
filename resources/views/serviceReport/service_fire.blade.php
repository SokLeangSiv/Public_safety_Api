@extends('master')
@section('content')
    <div class="bg-gray-900 py-20 mb-16">
        <div class="container mx-auto px-6 md:px-12 ">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 lg:w-2/3">
                    <h1 class="text-4xl md:text-6xl lg:text-7xl text-white font-bold mb-6">
                        Welcome to our <br class="hidden md:block" />
                        <span class="text-orange-500">Fire Figther</span> Department
                    </h1>
                    <p class="text-lg md:text-xl lg:text-2xl text-gray-400 mb-8 mt-10 ">
                        The Cambodian fire department, officially known as the General <br> Commissariat of National Police
                        -
                        Fire Department, is responsible <br>
                        for fire prevention, firefighting, and rescue operations in
                        Cambodia. <br>It operates under the Ministry of Interior and plays a crucial role in <br>
                        safeguarding lives
                        and property from fire hazards and other emergencies.
                    </p>

                </div>
                <div class="md:w-1/2 lg:w-1/3 mt-8 md:mt-0">
                    <img src="{{ asset('img/service/fire_background.jpg') }}" alt="Hero Image"
                        class="rounded-lg shadow-lg" />
                </div>
            </div>
        </div>
    </div>

    <h1 class="text-3xl underline font-bold mb-16   mx-32">+ Fire Station</h1>

    {{-- ? accrodin --}}







    {{--  --}}


    <div class="grid grid-cols-1 lg:grid-cols-2 max-w-7xl mx-auto mb-20">

        <div id="accordion-collapse" data-accordion="collapse">
            <h2 id="accordion-collapse-heading-1">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-black dark:text-gray-600 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200  dark:border-gray-700  hover:bg-gray-100 dark:hover:bg-gray-800 gap-3 hover:text-white"
                    data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                    aria-controls="accordion-collapse-body-1">
                    <span class="">Cambodia Fire Department</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                <div class="p-5 border border-b-0 border-gray-200 ">
                    <p class="mb-2 text-gray-700 dark:text-gray-700">Cambodian firefighters play a vital role in protecting
                        lives and property from fire and other emergencies.</p>

                    <p class="text-blue-500 font-bold mb-5">Firefighting :</p>

                    <ul class="space-y-2 ms-6">
                        <li>Responding to fire emergencies and extinguishing fires of various types and sizes.</li>
                        <li>Utilizing firefighting equipment and techniques to control and suppress flames.
                        </li>
                        <li>Rescuing individuals trapped in burning buildings or other hazardous situations.
                        </li>
                        <li>Conducting search and rescue operations in collapsed structures or other disaster zones.
                        </li>

                    </ul>
                </div>
            </div>
            <h2 id="accordion-collapse-heading-2">
                <button type="button"
                    class="flex items-center justify-between w-full p-5  hover:text-white font-medium rtl:text-right text-black border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200  dark:border-gray-700 dark:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                    aria-controls="accordion-collapse-body-2">
                    <span>Is there a Figma file available?</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the
                        Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
                    <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/"
                            class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the
                        utility classes from Tailwind CSS and components from Flowbite.</p>
                </div>
            </div>
            <h2 id="accordion-collapse-heading-3">
                <button type="button"
                    class="flex items-center justify-between hover:text-white w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200  dark:border-gray-700 dark:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                    aria-controls="accordion-collapse-body-3">
                    <span>What are the differences between Flowbite and Tailwind UI?</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core components from
                        Flowbite are open source under the MIT license, whereas Tailwind UI is a paid product. Another
                        difference is that Flowbite relies on smaller and standalone components, whereas Tailwind UI offers
                        sections of pages.</p>
                    <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both Flowbite,
                        Flowbite Pro, and even Tailwind UI as there is no technical reason stopping you from using the best
                        of two worlds.</p>
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
                    <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                        <li><a href="https://flowbite.com/pro/"
                                class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite Pro</a></li>
                        <li><a href="https://tailwindui.com/" rel="nofollow"
                                class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a></li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="div">

            <div class="flex justify-center mb-10">
                <img class="h-[300px] max-w-xl  rounded-lg" src="{{ asset('img/service/fire_women.webp') }}"
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


    {{-- ? accrodin --}}
@endsection
