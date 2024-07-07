@extends('master')
@section('content')

<div class="main">
    <form action="{{route('store.feedback')}}" method="post">
        @csrf
        <div class="flex justify-center items-center">
            <div class="w-full sm:w-[80%] md:w-[80%] lg:w-[60%] h-1/2 bg-[#f2f1f1] mx-8 md:mx-16 p-8 mt-20 mb-20 shadow-2xl sha rounded-xl " style="box-shadow: 5px -5px 20px 2px rgba(0,0,0,0.25);">
                <h2 class="font-bold text-4xl text-blue-600 mb-10">Feedback</h2>
                {{-- input 1 --}}

                <div class="grid grid-cols-1 lg:grid-cols-1 gap-x-7 mb-8 pe-5">

                    <div class="mb-5">
                        <label for="first-name" class="block text-sm font-semibold leading-6 text-black">REPORT NAME</label>

                        @if ($errors->has('feedback_by'))
                            <span class="text-red-500">{{ $errors->first('feedback_by') }}</span>

                        @endif

                        <div class="mt-2.5">
                            <input type="text" name="feedback_by" id="first-name" autocomplete="given-name" placeholder="Enter your Name" value="{{ old('feedback_by') }}"
                                class="block w-full md:w-[40%]  rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm shadow-slate-500 ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <label for="first-name" class="block text-sm font-semibold leading-6 text-black">FEEDBACK DESCRIPTION</label>

                        @if ($errors->has('feedback_description'))
                            <span class="text-red-500">{{ $errors->first('feedback_description') }}</span>

                        @endif

                        <div class="mt-2.5">
                            <input type="text" name="feedback_description" id="div_editor1" autocomplete="given-name" placeholder="Description of feedback" value="{{ old('feedback_description') }}"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm shadow-slate-500 ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
                        </div>
                    </div>


                </div>

                <button id="btn-submit" type="submit" class="btn bg-blue-500 py-2 px-16 mx-28 md:mx-48 lg:mx-52 xl:mx-80    text-white" onclick="disableButton()">
                    Submit
                </button>

                {{-- input 1 --}}




            </div>
        </div>
    </form>
</div>
@endsection
