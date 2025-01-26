<!-- resources/views/admin/add-data.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Cake') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.store-data') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Name') }}</label>
                            <input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                        </div>
                        <div class="mt-4">
                            <label for="image" class="block font-medium text-sm text-gray-700">{{ __('Image') }}</label>
                            <input id="image" class="block mt-1 w-full" type="file" name="image" required />
                        </div>
                        <div class="mt-4">
                            <label for="recipe" class="block font-medium text-sm text-gray-700">{{ __('Recipe') }}</label>
                            <textarea id="recipe" class="block mt-1 w-full" name="recipe" required></textarea>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Add Cake') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>