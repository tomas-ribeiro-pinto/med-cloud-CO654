<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Select Hospital') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 mb-2 flex flex-wrap justify-center items-center">
                @foreach($hospitals as $hospital)
                    <a href="{{request()->fullUrl() . '/' . $hospital->id}}"
                       class="flex flex-1 justify-center items-center bg-purple-800 rounded-xl h-56 w-36 p-4 m-4">
                        <div class="flex-col">
                            <p class="text-2xl font-bold text-white">{{$hospital->name}}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
