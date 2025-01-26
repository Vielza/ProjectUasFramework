<!-- resources/views/admin/cake-data.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cake Data') }}
        </h2>

        <!-- Navigation Link for Adding Data -->
        <div class="mt-4">
            <a href="{{ route('admin.add-data') }}" class="btn btn-primary">Add Data</a>
        </div>
    </x-slot>

    <head>
        <!-- Include Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Data Kue") }}
                </div>
                <!-- Table Container -->
                <div class="p-6">
                    <table class="table table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th class="py-2 text-center">Name</th>
                                <th class="py-2 text-center">Image</th>
                                <th class="py-2 text-center">Recipe</th>
                                <th class="py-2 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cakes as $cake)
                                <tr>
                                    <td class="text-center align-middle">{{ $cake->name }}</td>
                                    <td class="text-center align-middle">
                                        <img src="{{ asset('images/' . $cake->image) }}" alt="{{ $cake->name }}" class="w-16 h-16 object-cover rounded">
                                    </td>
                                    <td class="align-middle text-left">{!! nl2br(e($cake->recipe)) !!}</td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#editModal" data-id="{{ $cake->id }}" data-name="{{ $cake->name }}" data-recipe="{{ $cake->recipe }}" data-image="{{ $cake->image }}">Edit</button>
                                        <form action="{{ route('admin.delete-cake', $cake->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Chart Container -->
                <div class="p-6">
                    <canvas id="likesDislikesChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('likesDislikesChart').getContext('2d');
        var likesDislikesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Likes', 'Dislikes'],
                datasets: [{
                    label: 'Count',
                    data: [{{ $likes }}, {{ $dislikes }}],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>