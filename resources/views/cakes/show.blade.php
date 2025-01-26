<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cake Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-2xl mb-6 text-center">{{ $cake->name }}</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                        <!-- Gambar dengan ukuran diperkecil -->
                        <div class="max-w-sm mx-auto">
                            <img src="{{ asset('images/' . $cake->image) }}" 
                                 alt="{{ $cake->name }}" 
                                 class="w-full h-auto object-cover rounded-lg shadow-md">
                        </div>
                        
                        <div>
                            <h4 class="font-semibold text-lg mb-4">Recipe:</h4>
                            <p class="text-gray-700 leading-relaxed">{!! nl2br(e($cake->recipe)) !!}</p>
                        </div>
                    </div>
                    
                    <div class="mt-8 flex justify-center space-x-4">
                        <form action="{{ route('cakes.like', $cake->id) }}" method="POST" class="flex-grow max-w-xs">
                            @csrf
                            <button type="submit" class="w-full flex justify-center items-center gap-2 px-4 py-3 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 24 24">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path>
                                </svg>
                                Like ({{ $likes }})
                            </button>
                        </form>
                        
                        <form action="{{ route('cakes.dislike', $cake->id) }}" method="POST" class="flex-grow max-w-xs">
                            @csrf
                            <button type="submit" class="w-full flex justify-center items-center gap-2 px-4 py-3 bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 24 24">
                                    <path d="M12 2.65l1.45 1.32C18.6 8.64 22 11.72 22 15.5c0 3.08-2.42 5.5-5.5 5.5-1.74 0-3.41-.81-4.5-2.09C10.91 20.19 9.24 21 7.5 21 4.42 21 2 18.58 2 15.5c0-3.78 3.4-6.86 8.55-11.54L12 2.65z"></path>
                                </svg>
                                Dislike ({{ $dislikes }})
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>