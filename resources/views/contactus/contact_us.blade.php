@extends('master')
@section('content')

<div class="main">
    <form action="{{route('store.contact')}}" method="post">
        @csrf
        <div class="flex justify-center items-center">
            <div class="w-full sm:w-[60%] md:w-[60%] lg:w-[30%] h-1/2 bg-[#f2f1f1] mx-8 md:mx-16 p-8 mt-20 mb-20 shadow-2xl sha rounded-xl " style="box-shadow: 5px -5px 20px 2px rgba(0,0,0,0.25);">
                <h2 class="font-bold text-4xl text-blue-600 mb-10">Contact Us</h2>
                {{-- input 1 --}}

                <div class="grid grid-cols-1 lg:grid-cols-1 gap-x-7 mb-8 pe-5">



                    <div class="mb-5">
                        <label for="first-name" class="block text-sm font-semibold leading-6 text-black">NAME OF REPORTER</label>

                        @if ($errors->has('name'))
                            <span class="text-red-500">{{ $errors->first('name') }}</span>

                        @endif

                        <div class="mt-2.5">
                            <input type="text" name="name" id="first-name" autocomplete="given-name" placeholder="Enter your email"
                                class="block w-full  rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm shadow-slate-500 ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="first-name" class="block text-sm font-semibold leading-6 text-black">EMAIL OF REPORTER</label>

                        @if ($errors->has('email'))
                            <span class="text-red-500">{{ $errors->first('email') }}</span>


                        @endif

                        <div class="mt-2.5">
                            <input type="email" name="email" id="first-name" autocomplete="given-name" placeholder="Enter your email"
                                class="block w-full  rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm shadow-slate-500 ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
                        </div>
                    </div>



                    <div class="mb-5">
                        <label for="first-name" class="block text-sm font-semibold leading-6 text-black">PHONE NUMBER</label>

                        @if ($errors->has('phone'))
                            <span class="text-red-500">{{ $errors->first('phone') }}</span>

                        @endif

                        <div class="mt-2.5">
                            <input type="text" name="phone"  autocomplete="given-name" placeholder="Phone number"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm shadow-slate-500 ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
                        </div>
                    </div>


                    <div class="mb-5">
                        <label for="first-name" class="block text-sm font-semibold leading-6 text-black">SUBJECT OF REPORTER</label>

                        @if ($errors->has('subject'))
                            <span class="text-red-500">{{ $errors->first('subject') }}</span>
                        @endif

                        <div class="mt-2.5">
                            <input type="text" name="subject" id="first-name" autocomplete="given-name" placeholder="Subject of reporter"
                                class="block w-full  rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm shadow-slate-500 ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
                        </div>
                    </div>


                </div>

                <button id="btn-submit" type="submit" class="btn bg-blue-500 py-2 px-16 mx-24 md:mx-30  lg:mx-16 xl:mx-24 text-white" onclick="disableButton()">
                    Submit
                </button>

                {{-- input 1 --}}




            </div>
        </div>
    </form>
</div>
@endsection
