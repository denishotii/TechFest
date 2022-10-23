@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="{{ route('routes.store') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Route Name') }}:
                        </label>

                        <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"
                            name="routename"  required autocomplete="name" autofocus>

                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                <div id="points" class="mb-3">
                    <div class="flex flex-wrap">
                        <label for="startPoint" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Start Point') }}:
                        </label>

                        <input id="startpoint" type="text"
                            class="form-input w-full" name="points[]" required>
                    </div>

                    <div class="flex flex-wrap">
                        <label for="startPoint" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Point 1') }}:
                        </label>

                        <input id="startpoint" type="text"
                            class="form-input w-full" name="points[]" required>
                    </div>

                </div>
                    <span id="newPoint"  class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    + Add new point
                    </span>   

                    <div class="flex flex-wrap">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Description') }}:
                        </label>

                        <textarea name="description"
                        class="mt-1  w-full border-2 border-gray-400 bg-transparent rounded text-base p-2 focus:outline-none focus:ring-0 focus:border-[#ef4444]"
                        placeholder='Description here...' required></textarea>

                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Submit') }}
                        </button>
                        </p>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>

<script>
    var index = 2;

    $(document).on('click', '#newPoint', function(e){
        e.preventDefault();
        field(index)
        index++;
        console.log(index);
    })

    function field(i){
        var more_fields = `
                    <div class="flex flex-wrap">
                        <label for="startPoint" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Point `+i+`') }}:
                        </label>

                        <input id="startpoint" type="text"
                            class="form-input w-full" name="points[]">
                    </div>
                `;
        $("#points").append(more_fields);
        
    }
</script>

@endsection

