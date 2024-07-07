@extends('master')
@section('content')
    <main class="">
        <div class="hero min-h-screen animate__animated  animate__fadeIn relative  z-[1] bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('img/hero.jpg.crdownload') }}');">
            <div class="hero-overlay bg-opacity-40"></div>
            <div class="hero-content text-center max-w-full bg-white rounded-3xl text-black">
                <div class="max-w-md">
                    <h1 class="mb-5 text-4xl font-bold">Report incidents easily with our online form</h1>
                    <p class="mb-5">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi
                        exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                    <button class="btn btn-primary">Get Started</button>
                </div>
            </div>
        </div>

        {{-- secpond hero  --}}
        <div class="hero min-h-screen max-w-8xl mx-auto mb-5">
            <div class="hero-content flex-col lg:flex-row-reverse">
                <img data-aos="fade-left" data-aos-duration="500" src="{{ asset('img/hero2.jpg') }}"
                    class=" lg:flex-none flex-wrap  max-w-sm lg:max-w-3xl lg:-mx-20 rounded-lg shadow-2xl" />
                <div data-aos="fade-right" data-aos-duration="500" class="lg:text-start text-center">
                    <h1 class="text-5xl font-bold ">Box Office News!</h1>
                    <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi
                        exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                    <button class="btn btn-primary">Get Started</button>
                </div>
            </div>
        </div>

        {{-- governemnt --}}


        <p class="flex justify-center font-bold mb-24">Recongize by Many Goverment</p>

        <div data-aos="fade-down" data-aos-duration="500" class="flex justify-center items-center mb-32">
            <div class="grid grid-cols-2 gap-6 md:grid-cols-2 lg:grid-cols-5">
                <!-- Grid items (replace with your content) -->
                <div class="bg-gray-200 p-4"><img src="{{ asset('img/goverement.png') }}" alt=""width="100px"
                        height="100px"></div>
                <div class="bg-gray-200 p-4"><img src="{{ asset('img/goverement.png') }}" alt=""width="100px"
                        height="100px"></div>
                <div class="bg-gray-200 p-4"><img src="{{ asset('img/goverement.png') }}" alt=""width="100px"
                        height="100px"></div>
                <div class="bg-gray-200 p-4"><img src="{{ asset('img/goverement.png') }}" alt=""width="100px"
                        height="100px"></div>
                <div class="bg-gray-200 p-4"><img src="{{ asset('img/goverement.png') }}" alt=""width="100px"
                        height="100px"></div>

                <!-- Add more grid items as needed -->
            </div>
        </div>

        {{-- * start Efforelessly --}}

        <h1 class="flex justify-center items-center font-bold text-3xl text-center mb-24">Effortlessly Report Incidents and
            <br>Stay Informed
        </h1>

        <div data-aos="zoom-in" data-aos-duration="500" class="flex justify-center items-center mb-24 -z-[2]">
            <div class="grid grid-cols-1 gap-16 m-4 lg:gap-24 md:gird-col-2 lg:grid-cols-3 text-center place-items-center">
                <div class="card place-items-center z">
                    <img src="{{ asset('img/home/report.png') }}" class="w-[63px] h-[63px] mb-5" alt="">

                    <h1 class="text-2xl font-bold mb-6">Simple Reporting Process</h1>
                    <p class="text-center w-64">Report incidents with ease using our
                        intuitive reporting tools.</p>
                </div>
                <div class="card place-items-center">
                    <img src="{{ asset('img/home/resource-allocation.png') }}" class="w-[63px] h-[63px] mb-5"
                        alt="">

                    <h1 class="text-2xl font-bold mb-6">Simple Reporting Process</h1>
                    <p class="text-center w-64">Report incidents with ease using our
                        intuitive reporting tools.</p>
                </div>
                <div class="card place-items-center">
                    <img src="{{ asset('img/home/updated.png') }}" class="w-[63px] h-[63px] mb-5" alt="">

                    <h1 class="text-2xl font-bold mb-6">Simple Reporting Process</h1>
                    <p class="text-center w-64">Report incidents with ease using our
                        intuitive reporting tools.</p>
                </div>


            </div>
        </div>



        <div class=" flex justify-center items-center gap-4 mb-44">
            <button class="btn rounded-lg bg-slate-950 w-28 text-white">Report</button>
            <button class="btn rounded-lg bg-white border-black w-28">Learn More</button>
        </div>


        {{-- ! end Efforelessly --}}

        {{-- ? horizintol line  --}}

        <div class="line flex justify-center">
            <hr class="w-[75%] h-[2px] bg-slate-300 mb-16" />
        </div>

        {{-- * start step of reporting --}}


        <div class="grid grid-cols-1 lg:grid-cols-2 lg:mx-[190px]  mb-36  ">

            <div data-aos="zoom-in-right" data-aos-duration="500"
                class="col-span-1 mx-auto sm:mx-auto lg:mx-1 md:mx-auto md:mb-10 sm:mb-32 mb-16 ">
                <p class="mb-3">Report</p>
                <h1 class="text-4xl font-bold mb-10">Easy Steps to Report <br>
                    Incidents Online
                </h1>

                <button class="btn rounded-lg bg-slate-950 w-28 text-white">Get Started</button>
                <button class="btn rounded-lg bg-white border-black w-28">Learn More</button>
            </div>


            <div class="col-span-1 lg:mx-auto mx-auto  sm:mx-auto md:mx-auto">

                {{-- step one  --}}

                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000" class="step1 mt-5 flex">
                    <img src="{{ asset('img/home/step1.png') }}" alt="" class="w-[63px] h-[63px]">
                    <div class="letter mx-8 md:mx-12 sm:mx-8 lg:mx-12">
                        <h1 class="font-bold text-xl">Step one</h1>
                        <p>Visit our website and click on the 'Report Incident' button.</p>
                    </div>
                </div>

                {{-- step one  --}}

                {{-- vertical Line --}}

                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500" class="line mx-8 md:mx-8 sm:mx-8 lg:mx-8 mt-2">
                    <hr class="w-[2px] h-[50px] bg-slate-950">
                </div>
                {{-- Line --}}

                {{-- step two  --}}

                <div class="step1 mt-5 flex" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">
                    <img src="{{ asset('img/home/step2.png') }}" alt="" class="w-[63px] h-[63px]">
                    <div class="letter mx-8 md:mx-12 sm:mx-8 lg:mx-12">
                        <h1 class="font-bold text-xl">Step Two</h1>
                        <p>Fill out the incident report form with all the necessary details.</p>
                    </div>
                </div>

                {{-- step two  --}}

                {{-- vertical Line --}}

                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500" class="line mx-8 md:mx-8 sm:mx-8 lg:mx-8">
                    <hr class="w-[2px] h-[50px] bg-slate-950">
                </div>
                {{-- Line --}}

                {{-- step three  --}}

                <div class="step1 mt-5 flex" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">
                    <img src="{{ asset('img/home/step3.png') }}" alt="" class="w-[63px] h-[63px]">
                    <div class="letter mx-8 md:mx-12 sm:mx-8 lg:mx-12">
                        <h1 class="font-bold text-xl">Step three</h1>
                        <p>Submit the form and receive a confirmation of your report.</p>
                    </div>
                </div>

                {{-- step three  --}}

                {{-- vertical Line --}}

                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500" class="line mx-8 md:mx-8 sm:mx-8 lg:mx-8">
                    <hr class="w-[2px] h-[50px] bg-slate-950">
                </div>
                {{-- Line --}}

                {{-- step Four  --}}

                <div class="step1 mt-5 flex " data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">
                    <img src="{{ asset('img/home/step3.png') }}" alt="" class="w-[63px] h-[63px]">
                    <div class="letter mx-8 md:mx-12 sm:mx-8 lg:mx-12">
                        <h1 class="font-bold text-xl">Step Four</h1>
                        <p>Submit the form and receive a confirmation of your report.</p>
                    </div>
                </div>

                {{-- step Four  --}}

                {{-- vertical Line --}}

                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500" class="line mx-8 md:mx-8 sm:mx-8 lg:mx-8">
                    <hr class="w-[2px] h-[50px] bg-slate-950">
                </div>
                {{-- Line --}}

                {{-- Last Step  --}}

                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500" class="step1 mt-5 flex">
                    <img src="{{ asset('img/home/update1.png') }}" alt="" class="w-[63px] h-[63px]">
                    <div class="letter mx-8 md:mx-12 sm:mx-8 lg:mx-12">
                        <h1 class="font-bold text-xl">Last Step</h1>
                        <p>Submit the form and receive a confirmation of your report.</p>
                    </div>
                </div>

                {{-- Last Step  --}}
            </div>


        </div>

        {{-- ! End step of reporting --}}


        {{-- ? horizintol --}}

        <div class="line flex justify-center mb-16">
            <hr class="w-[75%] h-[2px] bg-slate-300 mb-16" />
        </div>



        {{-- * start email,phone, office --}}

        <div data-aos="zoom-in-up" data-aos-duration="1000" class="flex justify-center items-center mb-52 sm:mb-48">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">

                {{-- * email --}}
                <div class="group hover:scale-110 transition delay-75 cols-span-1 text-center mb-12">
                    <img src="{{ asset('img/home/email.png') }}"
                        class=" w-[60px] height-[60px] mx-[160px] sm:mx-[175px] mb-4" alt="">
                    <h1 class="font-bold text-3xl pb-6 group-hover:text-blue-500">Email</h1>
                    <p class="mb-8 sm:mb-4 group-hover:font-bold">Feel free to reach out to us with any questions <br>
                        or concerns.</p>
                    <p class="underline">lsok@paragoniu.edu.kh</p>
                </div>

                {{-- * phone --}}

                <div class=" group hover:scale-110 transition delay-75 cols-span-1 text-center mb-12 ">
                    <img src="{{ asset('img/home/phpne.png') }}"
                        class="w-[60px] height-[60px] mx-[160px] sm:mx-[175px] mb-4" alt="">
                    <h1 class="font-bold text-3xl pb-6 group-hover:text-blue-500">Phone</h1>
                    <p class="mb-14 sm:mb-4 group-hover:font-bold">Call us during business hours for immediate assistance.</p>
                    <p class="underline">+855 087610362</p>
                </div>

                {{-- * office --}}


                <div class="group hover:scale-110 transition delay-75 cols-span-1 text-center mb-12">
                    <img src="{{ asset('img/home/address.png') }}"
                        class="w-[60px] height-[60px] mx-[160px] sm:mx-[175px] mb-4" alt="">
                    <h1 class="font-bold text-3xl pb-6 group-hover:text-blue-500">Office</h1>
                    <p class="mb-14 sm:mb-4 group-hover:font-bold">Visit our office for in-person consultations.</p>
                    <p class="underline">Phnom penh, Cambodia</p>
                </div>


            </div>
        </div>

        {{-- ! end email,phone, office --}}
    </main>
@endsection
