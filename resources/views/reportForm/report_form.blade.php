@extends('master')
@section('content')
    <div class="main">
        <form action="{{ route('store.form') }}" method="post" id="report-form" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-center items-center">
                <div class=" w-[90%] md:w-[90%] lg:w-[50%] h-auto bg-[#F4F4F4 rounded-2xl   p-8 mt-20 mb-32 "
                    style="box-shadow: 5px -5px 20px 2px rgba(0,0,0,0.25);">
                    <h2 class="font-bold text-xl text-blue-600 mb-5">Report Incident</h2>
                    {{-- input 1 --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-7 mb-8">

                        <div class="mb-5">
                            <label for="first-name" class="block text-sm font-semibold leading-6 text-black">REPORTED
                                BY</label>
                            <div class="mt-2.5">
                                <input type="text" name="report_by" id="first-name" autocomplete="given-name" placeholder="Your Name"
                                    value="{{ old('report_by') }}"
                                    class="block w-full rounded-md border-0 px-3.5 py-3 text-gray-900 shadow-sm shadow-slate-500 ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
                            </div>
                            @error('report_by')
                                <div class="text-red-500 mt-2.5">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="first-name" class="block text-sm font-semibold leading-6 text-black">DATE OF
                                REPORT</label>


                            <input name="report_date" id="datepicker" value="{{ old('report_date') }}"
                                class="border-2 mt-2.5  w-full bg-white border-gray-300 rounded px-3 py-2.5" type="text"
                                placeholder="Select a date">

                            @error('report_date')
                                <div class="text-red-500 mt-2.5">{{ $message }}</div>
                            @enderror

                        </div>




                    </div>

                    {{-- input 1 --}}

                    {{-- incident information --}}

                    <div class="w-full h-8 bg-blue-600 text-white font-bold  text-center pt-0.5 mb-8">Incident Information
                    </div>

                    {{-- end of incident information --}}



                    {{-- input 2 --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-7 mb-16">

                        <div>

                            <label for="first-name" class="block text-sm font-semibold leading-6 text-black">INCIDENT
                                TYPE</label>

                                <select  name="incident_type" id="incident-type" class="select select-bordered w-full md:max-w-xs mt-2.5 bg-white text-gray-900 shadow-sm shadow-slate-500 ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6 rounded-md">
                                    <option disabled selected >What Crime?</option>
                                    <option value="cyber_fraud" {{ old('incident_type') == 'cyber_fraud' ? 'selected' : '' }}>Cyber Fraud</option>
                                    <option value="identity_theft" {{ old('incident_type') == 'identity_theft' ? 'selected' : '' }}>Identity Theft</option>
                                    <option value="vandalism" {{ old('incident_type') == 'vandalism' ? 'selected' : '' }}>Vandalism</option>
                                    <option value="shoplifting" {{ old('incident_type') == 'shoplifting' ? 'selected' : '' }}>Shoplifting</option>
                                    <option value="embezzlement" {{ old('incident_type') == 'embezzlement' ? 'selected' : '' }}>Embezzlement</option>
                                    <option value="drug_possession" {{ old('incident_type') == 'drug_possession' ? 'selected' : '' }}>Drug Possession</option>
                                    <option value="drunk_driving" {{ old('incident_type') == 'drunk_driving' ? 'selected' : '' }}>Drunk Driving</option>
                                    <option value="domestic_violence" {{ old('incident_type') == 'domestic_violence' ? 'selected' : '' }}>Domestic Violence</option>
                                    <option value="robbery" {{ old('incident_type') == 'robbery' ? 'selected' : '' }}>Robbery</option>
                                    <option value="art_theft" {{ old('incident_type') == 'art_theft' ? 'selected' : '' }}>Art Theft</option>
                                    <option value="other" {{ old('incident_type') == 'other' ? 'selected' : '' }}>Other (Specify)</option>
                                </select>

                            <div id="other_crime_input" style="display: none;" class="">
                                <label for="other_crime_description"
                                    class="block text-sm font-semibold leading-6 text-black">Describe the Crime:</label>
                                <input type="text" id="other_crime_description" name="other_crime_description"
                                    class="w-[90%]  h-10 px-2 text-gray-900  shadow-sm shadow-slate-500 ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
                            </div>
                            @error('incident_type')
                                <div class="text-red-500 mt-2.5">{{ $message }}</div>
                            @enderror


                        </div>

                        <div>
                            <label for="other_crime_description"
                                class="block text-sm font-semibold leading-6 text-black">DATE OF INCIDENT</label>
                            <input name="date_incident" id="datepicker" value="{{ old('date_incident') }}"
                                class="border-2 mt-2.5  w-full border-gray-300 rounded px-3 py-2.5 bg-white" type="text"
                                placeholder="Select a date">

                            @error('date_incident')
                                <div class="text-red-500 mt-2.5">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>

                    {{-- input 2 --}}


                    {{-- input 3 --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 mb-20">

                        <div class=" ">
                            <label for="province" class="block text-sm font-semibold leading-6 text-black">PROVINCE</label>
                            <div class="">
                                <select name="province" id="province" class="select select-bordered w-full md:max-w-xs lg:w-[95%] mt-2.5 bg-white text-gray-900 shadow-sm shadow-slate-500 ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6 rounded-md">
                                    <option value="">Select Province</option>
                                    <option value="Banteay_Meanchey" {{ old('province') == 'Banteay_Meanchey' ? 'selected' : '' }}>Banteay Meanchey</option>
                                    <option value="Battambang" {{ old('province') == 'Battambang' ? 'selected' : '' }}>Battambang</option>
                                    <option value="Kampong_Cham" {{ old('province') == 'Kampong_Cham' ? 'selected' : '' }}>Kampong Cham</option>
                                    <option value="Kampong_Chhnang" {{ old('province') == 'Kampong_Chhnang' ? 'selected' : '' }}>Kampong Chhnang</option>
                                    <option value="Kampong_Speu" {{ old('province') == 'Kampong_Speu' ? 'selected' : '' }}>Kampong Speu</option>
                                    <option value="Kampong_Thom" {{ old('province') == 'Kampong_Thom' ? 'selected' : '' }}>Kampong Thom</option>
                                    <option value="Kampot" {{ old('province') == 'Kampot' ? 'selected' : '' }}>Kampot</option>
                                    <option value="Kandal" {{ old('province') == 'Kandal' ? 'selected' : '' }}>Kandal</option>
                                    <option value="Koh_Kong" {{ old('province') == 'Koh_Kong' ? 'selected' : '' }}>Koh Kong</option>
                                    <option value="Kratie" {{ old('province') == 'Kratie' ? 'selected' : '' }}>Kratie</option>
                                    <option value="Mondulkiri" {{ old('province') == 'Mondulkiri' ? 'selected' : '' }}>Mondulkiri</option>
                                    <option value="Pailin" {{ old('province') == 'Pailin' ? 'selected' : '' }}>Pailin</option>
                                    <option value="Phnom_Penh" {{ old('province') == 'Phnom_Penh' ? 'selected' : '' }}>Phnom Penh</option>
                                    <option value="Preah_Vihear" {{ old('province') == 'Preah_Vihear' ? 'selected' : '' }}>Preah Vihear</option>
                                    <option value="Prey_Veng" {{ old('province') == 'Prey_Veng' ? 'selected' : '' }}>Prey Veng</option>
                                    <option value="Pursat" {{ old('province') == 'Pursat' ? 'selected' : '' }}>Pursat</option>
                                    <option value="Ratanakiri" {{ old('province') == 'Ratanakiri' ? 'selected' : '' }}>Ratanakiri</option>
                                    <option value="Siem_Reap" {{ old('province') == 'Siem_Reap' ? 'selected' : '' }}>Siem Reap</option>
                                    <option value="Sihanoukville" {{ old('province') == 'Sihanoukville' ? 'selected' : '' }}>Sihanoukville</option>
                                    <option value="Stung_Treng" {{ old('province') == 'Stung_Treng' ? 'selected' : '' }}>Stung Treng</option>
                                    <option value="Svay_Rieng" {{ old('province') == 'Svay_Rieng' ? 'selected' : '' }}>Svay Rieng</option>
                                    <option value="Takeo" {{ old('province') == 'Takeo' ? 'selected' : '' }}>Takeo</option>
                                    <option value="Tbong_Khmum" {{ old('province') == 'Tbong_Khmum' ? 'selected' : '' }}>Tbong Khmum</option>
                                </select>

                            </div>
                            @error('province')
                                <div class="text-red-500 mt-2.5">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="lg:ms-4">
                            <label for="first-name" class="block text-sm  font-semibold leading-6 text-black">LOCATION OF
                                INCIDENT</label>
                            <div class="mt-2.5">
                                <input type="text" name="incident_location" id="first-name" autocomplete="given-name" placeholder="Location of Incident" value="{{ old('incident_location') }}"
                                    class="block w-full  md:w-[95%] lg:w-full lg:ms-0 md:ms-3 rounded-md border-0 px-3.5 py-3 text-gray-900 shadow-sm shadow-slate-500 ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
                            </div>

                            @error('incident_location')
                                <div class="text-red-500 mt-2.5">{{ $message }}</div>
                            @enderror
                        </div>



                    </div>

                    {{-- input 3 --}}

                    <input type="hidden" id="latitude" name="lat">
                    <input type="hidden" id="longitude" name="long">


                    {{-- inpit incident description --}}

                    <div class="grid grid-cols-1 lg:grid-cols-1 mb-12">

                        <div class="mb-10">
                            <label for="first-name" class="block text-sm font-semibold leading-6 text-black">INCIDENT
                                DESCRIPTION</label>
                                @error('incident_description')
                                    <div class="text-red-500 mb-4 mt-2.5">{{ $message }}</div>
                                @enderror
                                <div class="mt-2.5">
                                    <textarea placeholder="Bio" rows="4" id="div_editor1" name="incident_description"
                                    class="textarea textarea-bordered textarea-sm w-full max-w-full rounded-md  text-gray-900 shadow-sm shadow-slate-500 ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400">
                                    {{old('incident_description')}}
                                </textarea>
                                </div>

                            </div>

                        {{-- input image  --}}


                        <div class=" flex items-center justify-center w-full mb-10">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800  hover:bg-gray-100  ">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)</p>
                                </div>
                                <input id="dropzone-file" name="report_image[]" type="file" class="hidden"
                                    multiple />

                                @error('report_image')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror

                            </label>
                        </div>

                        <div class="form-group" id="preview-images">
                            <!-- Preview images will be displayed here -->
                        </div>






                        <div id="map" style="height: 500px;" class="mb-12"></div>



                        <div id="style-selector" class="mapboxgl-ctrl mb-10">
                            <label for="map-style" class="block text-sm font-semibold leading-6 text-black">Select Theme</label>
                            <div>
                                <select name="map-style" id="map-style" class="select select-bordered w-full md:max-w-xs lg:w-[95%] mt-2.5 bg-white text-gray-900 shadow-sm shadow-slate-500 ring-1 ring-inset ring-slate-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6 rounded-md">
                                    <option value="mapbox://styles/mapbox/streets-v12">Streets</option>
                                    <option value="mapbox://styles/mapbox/outdoors-v12">Outdoors</option>
                                    <option value="mapbox://styles/mapbox/light-v11">Light</option>
                                    <option value="mapbox://styles/mapbox/dark-v11">Dark</option>
                                    <option value="mapbox://styles/mapbox/satellite-v9">Satellite</option>
                                    <option value="mapbox://styles/mapbox/satellite-streets-v12">Satellite Streets</option>
                                    <option value="mapbox://styles/mapbox/navigation-day-v1">Navigation Day</option>
                                    <option value="mapbox://styles/mapbox/navigation-night-v1">Navigation Night</option>
                                    <option value="mapbox://styles/mapbox/traffic-day-v2">Traffic Day</option>
                                    <option value="mapbox://styles/mapbox/traffic-night-v2">Traffic Night</option>
                                    <option value="mapbox://styles/mapbox/streets-relief-v2">Streets Relief</option>
                                    <option value="mapbox://styles/mapbox/navigation-preview-day-v4">Navigation Preview Day</option>
                                    <option value="mapbox://styles/mapbox/navigation-preview-night-v4">Navigation Preview Night</option>
                                    <option value="mapbox://styles/mapbox/streets-v12">Streets</option>
                                    <option value="3d">3D Style</option>
                                    <!-- Add more options as needed or custom styles -->
                                </select>
                            </div>
                            @error('map-style')
                                <div class="text-red-500 mt-2.5">{{ $message }}</div>
                            @enderror
                        </div>





                        <button id="btn-submit" type="submit"
                            class="btn bg-blue-500 py-2 px-16 mx-20 lg:mx-[190px] text-white" onclick="disableButton()">
                            Submit
                        </button>



                    </div>

                    {{-- inpit incident description --}}



                </div>



            </div>
        </form>
    </div>





    <script>
        function disableButton() {
            document.getElementById("btn-submit").disabled = true;
            document.getElementById("btn-submit").style.color = "black";
            document.getElementById("btn-submit").style.backgroundColor = "gray";
            document.getElementById("btn-submit").innerHTML = "Submitting...";
            document.getElementById("report-form").submit();
        }
    </script>




    {{-- date picker --}}
    <script>
        flatpickr("#datepicker", {
            // Configuration options for Flatpickr
            // You can customize the appearance and behavior here
            altInput: true,




        });
    </script>
    {{-- date picker --}}


    {{-- map script --}}
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoibGVhbmdzaXYiLCJhIjoiY2x3MG1kNHhlMDJoazJrcXQxOXd5ZWxreCJ9.nuX5dafVJ73pbiOWKd21hQ';

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, error, {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0
            });
        } else {
            alert('Geolocation is not supported by your browser.');
        }

        function success(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/outdoors-v12',
                center: [longitude, latitude],
                zoom: 14,
                pitch: 45,
                bearing: -17.6
            });

            map.dragRotate.enable();
            map.touchZoomRotate.enableRotation();

            map.addControl(new mapboxgl.NavigationControl());
            map.addControl(new mapboxgl.FullscreenControl());

            const geocoder = new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                mapboxgl: mapboxgl,
                zoom: 16,
                placeholder: 'Enter an address or place name',
                marker: false
            });

            map.addControl(geocoder, 'top-left');

            const marker = new mapboxgl.Marker({
                    draggable: true
                })
                .setLngLat([longitude, latitude])
                .addTo(map);

            // Set initial coordinates in hidden fields
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;

            geocoder.on('result', function(e) {
                const coords = e.result.geometry.coordinates;
                marker.setLngLat(coords);
                map.flyTo({
                    center: coords,
                    zoom: 16,
                    pitch: 45,
                    bearing: -17.6,
                    essential: true
                });
                updateLatLngInputs(coords.lat, coords.lng);
            });

            marker.on('dragend', (e) => {
                const lngLat = e.target.getLngLat();
                updateLatLngInputs(lngLat.lat, lngLat.lng);
            });

            map.on('click', (e) => {
                const lngLat = e.lngLat;
                marker.setLngLat(lngLat);
                updateLatLngInputs(lngLat.lat, lngLat.lng);
            });

            map.on('load', () => {
                const lngLat = marker.getLngLat();
                console.log('Initial latitude:', lngLat.lat);
                console.log('Initial longitude:', lngLat.lng);
            });

            const myLocationButton = new mapboxgl.GeolocateControl({
                positionOptions: {
                    enableHighAccuracy: true
                },
                trackUserLocation: true,
                showUserHeading: true
            });

            function setStyle(style) {
                map.setStyle(style);
            }

            function enable3D() {
                map.setStyle('mapbox://styles/mapbox/satellite-v9');

                map.on('style.load', () => {
                    map.addSource('mapbox-dem', {
                        'type': 'raster-dem',
                        'url': 'mapbox://mapbox.terrain-rgb',
                        'tileSize': 512,
                        'maxzoom': 14
                    });
                    map.setTerrain({ 'source': 'mapbox-dem', 'exaggeration': 1.5 });

                    map.addLayer({
                        'id': 'sky',
                        'type': 'sky',
                        'paint': {
                            'sky-type': 'atmosphere',
                            'sky-atmosphere-sun': [0.0, 0.0],
                            'sky-atmosphere-sun-intensity': 15
                        }
                    });

                    map.addLayer({
                        'id': '3d-buildings',
                        'source': 'composite',
                        'source-layer': 'building',
                        'filter': ['==', 'extrude', 'true'],
                        'type': 'fill-extrusion',
                        'minzoom': 15,
                        'paint': {
                            'fill-extrusion-color': '#aaa',
                            'fill-extrusion-height': [
                                'interpolate',
                                ['linear'],
                                ['zoom'],
                                15,
                                0,
                                15.05,
                                ['get', 'height']
                            ],
                            'fill-extrusion-base': [
                                'interpolate',
                                ['linear'],
                                ['zoom'],
                                15,
                                0,
                                15.05,
                                ['get', 'min_height']
                            ],
                            'fill-extrusion-opacity': 0.6
                        }
                    });
                });
            }

            const styleSelector = document.getElementById('map-style');
            styleSelector.addEventListener('change', function() {
                const selectedStyle = this.querySelector(':checked').value;
                if (selectedStyle === '3d') {
                    enable3D();
                } else {
                    setStyle(selectedStyle);
                }
            });

            map.addControl(myLocationButton);

            myLocationButton.on('geolocate', (e) => {
                const lngLat = e.coords.longitude;
                marker.setLngLat([lngLat, e.coords.latitude]);
                map.flyTo({
                    center: [lngLat, e.coords.latitude],
                    zoom: 14
                });
                updateLatLngInputs(e.coords.latitude, lngLat);
            });
        }

        function updateLatLngInputs(lat, lng) {
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
        }

        function error(err) {
            console.warn(`ERROR(${err.code}): ${err.message}`);
            alert('Unable to retrieve your location. Please ensure location services are enabled and try again.');
        }
    </script>




@endsection
