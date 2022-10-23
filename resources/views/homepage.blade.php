<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8' />
    <title>Getting started with the Mapbox Directions API</title>
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css' rel='stylesheet' />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }
        #instructions {
            position: absolute;
            margin: 20px;
            top: 0;
            bottom: 20%;
            padding: 20px;
            background-color: #fff;
            overflow-y: scroll;
            font-family: sans-serif;
            z-index: 10;
            border-radius: 16px;
            height: fit-content;
        }
        #instructions:empty{
            display: none;
        }

        ol li{
            filter: blur(5px);
        }
        ol li:nth-child(1) {
            filter: blur(0px);
        }
        ol li:nth-child(2) {
            filter: blur(0px);
        }
        ol li:nth-child(3) {
            filter: blur(0px);
        }
        .mapboxgl-ctrl-top-right{
            bottom: 100px;
            top: unset;
            left: 50%;
            width: 90%;
            transform: translateX(-50%);
        }
        .mapboxgl-ctrl-geocoder .suggestions{
            height: 80px;
            overflow: scroll;

        }
        /*.mapboxgl-ctrl-geocoder .suggestions{*/
        /*    top: -300%;*/
        /*}*/
        .mapboxgl-ctrl-bottom-left{
            display: none;
        }
    </style>
</head>
<body>
{{--<div class="absolute bottom-[32px] -left-0 w-full flex justify-center z-10">--}}
{{--    <span class="relative inset-y-0 left-[37px] text- flex items-center pl-3">--}}
{{--        <svg class="h-6 w-6 fill-[#a7a7a7]" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30"--}}
{{--             height="30" viewBox="0 0 30 30">--}}
{{--            <path--}}
{{--                d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z">--}}
{{--            </path>--}}
{{--        </svg>--}}
{{--    </span>--}}
{{--    <input type="text" id="search" placeholder="Explore..."  class="bg-[#fff] text-[#a7a7a7] pl-[40px] rounded-[20px] w-full h-[40px] mr-[40px] focus:outline-none focus:ring-0 focus:border-[#e6e6e6] focus:text-[#737373]" />--}}
{{--</div>--}}
<div id="instructions"></div>
<div id='map'></div>
<script src="{{asset('js/map.js')}}"></script>
</body>
</html>
