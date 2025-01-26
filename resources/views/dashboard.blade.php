<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("ini halaman user") }}
                </div>
            </div>
        </div>

        <!-- Cake Catalog Section -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>{{ __("Our Cake Collection") }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($cakes as $cake)
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <h4 class="font-semibold text-lg">
                                    <a href="{{ route('cakes.show', $cake->id) }}" class="text-blue-500 hover:underline">{{ $cake->name }}</a>
                                </h4>
                                <img src="{{ asset('images/' . $cake->image) }}" alt="{{ $cake->name }}" class="w-full h-24 object-cover mt-2">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
