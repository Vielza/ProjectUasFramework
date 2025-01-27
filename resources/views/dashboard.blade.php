<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">
                {{ __('Toko Kuwe') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-pink-100 via-purple-50 to-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-lg rounded-lg p-8 text-gray-900 border border-purple-100">
                <h3 class="text-2xl font-semibold mb-4 bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">
                    Selamat datang di web Kami
                </h3>
                <p class="text-gray-600 text-lg">
                    Nikmati koleksi kue terbaik kami untuk segala kebutuhan Anda.
                </p>
            </div>
        </div>

        <!-- Cake Catalog Section -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-lg rounded-lg border border-purple-100">
                <div class="p-8">
                    <h3 class="text-2xl font-semibold mb-8 bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">
                        {{ __('Our Cake Collection') }}
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($cakes as $cake)
                            <div class="group bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-purple-50">
                                <div class="relative overflow-hidden">
                                    <img 
                                        src="{{ asset('images/' . $cake->image) }}" 
                                        alt="{{ $cake->name }}" 
                                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300"
                                    >
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </div>
                                <div class="p-6">
                                    <h4 class="font-semibold text-lg text-gray-800 mb-2">
                                        <a href="{{ route('cakes.show', $cake->id) }}" 
                                           class="bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent hover:from-pink-600 hover:to-purple-600 transition-all">
                                            {{ $cake->name }}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .backdrop-blur-sm {
            backdrop-filter: blur(8px);
        }
    </style>
</x-app-layout>