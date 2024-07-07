<!DOCTYPE html>
<html data-theme="cupcake" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- geo location --}}
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet'
    href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css'
    type='text/css' />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css" type="text/css">

    {{-- geo location --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    @vite('resources/css/app.css')
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://unpkg.com/@mapbox/mapbox-gl-language"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="/richtexteditor/rte_theme_default.css" />
    <script type="text/javascript" src="/richtexteditor/rte.js"></script>
    <script type="text/javascript" src='/richtexteditor/plugins/all_plugins.js'></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>

    @include('layout.navbar')
    <hr class="w-full h-[2px] mb-1 bg-slate-300" />
    @yield('content')
    @include('layout.footer')

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelector('.swap input[type="checkbox"]').addEventListener('change', function() {
                document.documentElement.classList.toggle('dark');
                if (document.documentElement.classList.contains('dark')) {
                    localStorage.theme = 'dark';
                } else {
                    localStorage.theme = 'cupcake';
                }
            });

            // On page load, set the theme to what was previously selected
            if (localStorage.theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else if (localStorage.theme === 'cupcake') {
                document.documentElement.classList.remove('dark');
            }
        });
    </script>

    <script>
        var editor1 = new RichTextEditor("#div_editor1");
        editor1.setWidth("500px");
        editor1.setHeight("300px");
    </script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script>
        const selectElement = document.querySelector('select');
        const otherCrimeInput = document.getElementById('other_crime_input');
        const otherCrimeDescription = document.getElementById('other_crime_description');

        selectElement.addEventListener('change', (event) => {
            if (event.target.value === 'other') {
                otherCrimeInput.style.display = 'block';
                otherCrimeDescription.focus(); // Set focus on input field
            } else {
                otherCrimeInput.style.display = 'none';
                otherCrimeDescription.value = ''; // Clear the input field
            }
        });
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script>
        $(document).ready(function (e) {
            $('#dropzone-file').change(function(){
                $('#preview-images').html(''); // Clear previous images
                let files = this.files;
                if (files.length > 0) {
                    $.each(files, function(index, file) {
                        let reader = new FileReader();
                        reader.onload = function(e) {
                            $('#preview-images').append('<img src="' + e.target.result + '" class="img-fluid mb-3" style="max-height: 300px; margin-right: 10px;">'); // Adjust max-height here
                        }
                        reader.readAsDataURL(file);
                    });
                }
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (Session::has('success'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ Session::get('success') }}")
        </script>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error("{{ $error }}")
            </script>
        @endforeach
    @endif

</body>

</html>
