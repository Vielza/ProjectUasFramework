<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .chart-container {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .chart-title {
            color: #1f2937;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-pink-100 via-purple-50 to-blue-50 overflow-hidden shadow-lg sm:rounded-lg p-6">
                <div class="chart-container">
                    <h3 class="chart-title">{{ __("Likes and Dislikes Distribution") }}</h3>
                    <div class="flex justify-center">
                        <div class="w-1/2">
                            <canvas id="likesDislikesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart.js Logic
        const ctx = document.getElementById('likesDislikesChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Likes', 'Dislikes'],
                datasets: [{
                    data: [{{ \App\Models\Like::where('like', true)->count() ?? 0 }}, {{ \App\Models\Like::where('like', false)->count() ?? 0 }}],
                    backgroundColor: [
                        'rgba(251, 207, 232, 1)', // pink-200
                        'rgba(165, 180, 252, 1)'  // indigo-300
                    ],
                    borderColor: [
                        'rgba(249, 168, 212, 1)', // pink-300
                        'rgba(129, 140, 248, 1)'  // indigo-400
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: {
                                family: 'system-ui',
                                size: 14
                            },
                            padding: 20
                        }
                    },
                },
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart'
                }
            }
        });
    </script>
</x-admin-layout>