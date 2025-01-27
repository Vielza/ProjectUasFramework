<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Cake Data') }}
            </h2>
            <a href="{{ route('admin.add-data') }}" class="px-4 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white rounded-md hover:from-pink-600 hover:to-purple-600 transition-all duration-300 shadow-md">
                Add Data
            </a>
        </div>
    </x-slot>

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table {
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }
        .table thead {
            background: linear-gradient(to right, #fbcfe8, #a5b4fc);
        }
        .table th {
            color: #1f2937;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.875rem;
            padding: 1rem;
            border: none;
        }
        .table td {
            padding: 1rem;
            vertical-align: middle;
        }
        .btn-custom-edit {
            background: linear-gradient(to right, #fcd34d, #f59e0b);
            border: none;
            color: white;
            margin-right: 0.5rem;
        }
        .btn-custom-delete {
            background: linear-gradient(to right, #ef4444, #dc2626);
            border: none;
            color: white;
        }
        .modal-header {
            background: linear-gradient(to right, #fbcfe8, #a5b4fc);
            color: #1f2937;
            border: none;
        }
        .modal-content {
            border-radius: 8px;
            overflow: hidden;
        }
        .form-control {
            border-radius: 6px;
            border: 1px solid #e5e7eb;
            padding: 0.5rem;
        }
        .form-control:focus {
            border-color: #a5b4fc;
            box-shadow: 0 0 0 2px rgba(165, 180, 252, 0.2);
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-pink-100 via-purple-50 to-blue-50 overflow-hidden shadow-lg sm:rounded-lg p-6">
                <div class="overflow-x-auto">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Recipe</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cakes as $cake)
                                <tr>
                                    <td class="text-center">{{ $cake->name }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('images/' . $cake->image) }}" 
                                             alt="{{ $cake->name }}" 
                                             class="w-16 h-16 object-cover rounded-lg mx-auto shadow-sm">
                                    </td>
                                    <td class="text-left">{!! nl2br(e($cake->recipe)) !!}</td>
                                    <td class="text-center">
                                        <button class="btn btn-custom-edit px-4 py-2 rounded-md shadow-sm hover:opacity-90 transition-opacity"
                                                data-toggle="modal" 
                                                data-target="#editModal{{ $cake->id }}">
                                            Edit
                                        </button>
                                        <form action="{{ route('admin.delete-cake', $cake->id) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-custom-delete px-4 py-2 rounded-md shadow-sm hover:opacity-90 transition-opacity">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $cake->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content shadow-lg">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-semibold">Edit Cake</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('admin.update-cake', $cake->id) }}" 
                                                  method="POST" 
                                                  enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-body p-4">
                                                    <div class="form-group mb-4">
                                                        <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                                                        <input type="text" 
                                                               class="form-control" 
                                                               name="name" 
                                                               value="{{ $cake->name }}" 
                                                               required>
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                                                        <input type="file" 
                                                               class="form-control" 
                                                               name="image">
                                                        <img src="{{ asset('images/' . $cake->image) }}" 
                                                             alt="{{ $cake->name }}" 
                                                             class="mt-2 w-16 h-16 object-cover rounded-lg">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="block text-sm font-medium text-gray-700 mb-2">Recipe</label>
                                                        <textarea class="form-control" 
                                                                  name="recipe" 
                                                                  rows="4" 
                                                                  required>{{ $cake->recipe }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer bg-gray-50">
                                                    <button type="button" 
                                                            class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition-colors" 
                                                            data-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" 
                                                            class="px-4 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white rounded-md hover:from-pink-600 hover:to-purple-600 transition-all">
                                                        Save changes
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</x-admin-layout>