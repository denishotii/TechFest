@extends('layouts.app')

@section('content')

<div class="h-screen w-screen bg-green-500">
    {{-- top --}}
    <div class="absolute top-[29px] font-semibold font-['Graphik'] text-[18px] left-0 w-full flex justify-center">
        <span class="w-auto px-[21px] py-[6px] text-[#000] bg-[#fff] rounded-[20px]">
            Tirana, Albania
        </span>
    </div>




    {{-- bottom --}}
    <div class="absolute bottom-[32px] -left-0 w-full flex justify-center">
        <span class="relative inset-y-0 left-[37px] text- flex items-center pl-3">
            <svg class="h-6 w-6 fill-[#a7a7a7]" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30"
                height="30" viewBox="0 0 30 30">
                <path
                    d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z">
                </path>
            </svg>
        </span>
        <input type="text" id="search" placeholder="Explore..."  class="bg-[#fff] text-[#a7a7a7] pl-[40px] rounded-[20px] w-full h-[40px] mr-[40px] focus:outline-none focus:ring-0 focus:border-[#e6e6e6] focus:text-[#737373]" />



    </div>
</div>

@endsection
