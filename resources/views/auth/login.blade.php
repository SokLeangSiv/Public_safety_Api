{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>Laravel</title>
    
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
        <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js'></script>
        <link rel='stylesheet'
            href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css'
            type='text/css' />
    
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Styles -->
    
        {{-- dasiuy ui  --}}
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    
        @vite('resources/css/app.css')
    
        {{-- mapbox --}}
    
        <link href="https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.css" rel="stylesheet">
        <script src="https://unpkg.com/@mapbox/mapbox-gl-language"></script>
    
        
    
    
    
        {{-- date picker --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    
    
        {{-- date picker --}}
    
    
        {{-- rich text editor --}}
        <link rel="stylesheet" href="/richtexteditor/rte_theme_default.css" />
        <script type="text/javascript" src="/richtexteditor/rte.js"></script>
        <script type="text/javascript" src='/richtexteditor/plugins/all_plugins.js'></script>
        {{-- rich text editor --}}
    
        {{-- AOS --}}
    
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    
    
    </head>
<body>
    <div class="mx-auto max-w-screen-xl p-4 md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
          <h2 class="text-title-md2 font-bold text-black dark:text-white">
            Sign In
          </h2>

          <nav>
            <ol class="flex items-center gap-2">
              <li>
                <a class="font-medium" href="index.html">Dashboard /</a>
              </li>
              <li class="font-medium text-primary">Sign In</li>
            </ol>
          </nav>
        </div>
        <!-- Breadcrumb End -->

        <!-- ====== Forms Section Start -->
        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
          <div class="flex flex-wrap items-center">
            <div class="hidden w-full xl:block xl:w-1/2">
              <div class="px-26 py-17.5 text-center">
                <a class="mb-5.5 inline-block" href="index.html">
                  <img class="hidden dark:block" src="img/logo.png" alt="Logo">
                  <img class="dark:hidden" src="src/images/logo/logo-dark.svg" alt="Logo">
                </a>

                <p class="font-medium 2xl:px-20">
                  Welcome to Department of Public Safety
                </p>

                
              </div>
            </div>
            <div class="w-full border-stroke dark:border-strokedark xl:w-1/2 xl:border-l-2">
              <div class="w-full p-4 sm:p-12.5 xl:p-17.5">
                <span class="mb-1.5 block font-medium">Start for free</span>
                <h2 class="mb-9 text-2xl font-bold text-black dark:text-white sm:text-title-xl2">
                  Sign In to TailAdmin
                </h2>

                <form method="post" action="{{route('login')}}">
                    @csrf
                  <div class="mb-4">
                    <label class="mb-2.5 block font-medium text-black dark:text-white">Email</label>
                    <div class="relative">
                      <input type="email" name="email" placeholder="Enter your email" class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">

                      <span class="absolute right-4 top-4">
                        <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g opacity="0.5">
                            <path d="M19.2516 3.30005H2.75156C1.58281 3.30005 0.585938 4.26255 0.585938 5.46567V16.6032C0.585938 17.7719 1.54844 18.7688 2.75156 18.7688H19.2516C20.4203 18.7688 21.4172 17.8063 21.4172 16.6032V5.4313C21.4172 4.26255 20.4203 3.30005 19.2516 3.30005ZM19.2516 4.84692C19.2859 4.84692 19.3203 4.84692 19.3547 4.84692L11.0016 10.2094L2.64844 4.84692C2.68281 4.84692 2.71719 4.84692 2.75156 4.84692H19.2516ZM19.2516 17.1532H2.75156C2.40781 17.1532 2.13281 16.8782 2.13281 16.5344V6.35942L10.1766 11.5157C10.4172 11.6875 10.6922 11.7563 10.9672 11.7563C11.2422 11.7563 11.5172 11.6875 11.7578 11.5157L19.8016 6.35942V16.5688C19.8703 16.9125 19.5953 17.1532 19.2516 17.1532Z" fill=""></path>
                          </g>
                        </svg>
                      </span>
                    </div>
                  </div>

                  <div class="mb-6">
                    <label class="mb-2.5 block font-medium text-black dark:text-white">Re-type Password</label>
                    <div class="relative">
                      <input type="password" name="password" placeholder="6+ Characters, 1 Capital letter" class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">

                      <span class="absolute right-4 top-4">
                        <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g opacity="0.5">
                            <path d="M16.1547 6.80626V5.91251C16.1547 3.16251 14.0922 0.825009 11.4797 0.618759C10.0359 0.481259 8.59219 0.996884 7.52656 1.95938C6.46094 2.92188 5.84219 4.29688 5.84219 5.70626V6.80626C3.84844 7.18438 2.33594 8.93751 2.33594 11.0688V17.2906C2.33594 19.5594 4.19219 21.3813 6.42656 21.3813H15.5016C17.7703 21.3813 19.6266 19.525 19.6266 17.2563V11C19.6609 8.93751 18.1484 7.21876 16.1547 6.80626ZM8.55781 3.09376C9.31406 2.40626 10.3109 2.06251 11.3422 2.16563C13.1641 2.33751 14.6078 3.98751 14.6078 5.91251V6.70313H7.38906V5.67188C7.38906 4.70938 7.80156 3.78126 8.55781 3.09376ZM18.1141 17.2906C18.1141 18.7 16.9453 19.8688 15.5359 19.8688H6.46094C5.05156 19.8688 3.91719 18.7344 3.91719 17.325V11.0688C3.91719 9.52189 5.15469 8.28438 6.70156 8.28438H15.2953C16.8422 8.28438 18.1141 9.52188 18.1141 11V17.2906Z" fill=""></path>
                            <path d="M10.9977 11.8594C10.5852 11.8594 10.207 12.2031 10.207 12.65V16.2594C10.207 16.6719 10.5508 17.05 10.9977 17.05C11.4102 17.05 11.7883 16.7063 11.7883 16.2594V12.6156C11.7883 12.2031 11.4102 11.8594 10.9977 11.8594Z" fill=""></path>
                          </g>
                        </svg>
                      </span>
                    </div>
                  </div>

                  <div class="mb-5">
                    <input type="submit" value="Sign In" class="w-full cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90">
                  </div>

                  

                  <div class="mt-6 text-center">
                    <p class="font-medium">
                      Don’t have any account?
                      <a href="{{route('register')}}" class="text-primary">Sign Up</a>
                    </p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- ====== Forms Section End -->
      </div>
</body>
</html>