<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <title>Analytics Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">

<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Dashboard</h1>
        <button onclick="document.documentElement.classList.toggle('dark')" class="bg-gray-200 dark:bg-gray-700 px-4 py-2 rounded">
            Toggle Theme
        </button>
    </div>

    <!-- Region Filter -->
    <form method="GET" class="mb-6">
        <label for="region" class="block text-sm font-medium mb-1">Filter by Region</label>
        <select name="region" id="region" onchange="this.form.submit()"
                class="w-full md:w-64 p-2 border rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
            <option value="">All Regions</option>
            @foreach ($regions as $reg)
                <option value="{{ $reg }}" {{ request('region') == $reg ? 'selected' : '' }}>
                    {{ $reg }}
                </option>
            @endforeach
        </select>
    </form>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow text-center">
            <h2 class="text-lg font-semibold">Total Sessions</h2>
            <p class="text-2xl font-bold mt-2">{{ $totalSessions }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow text-center">
            <h2 class="text-lg font-semibold">Avg. Bounce Rate (%)</h2>
            <p class="text-2xl font-bold mt-2">{{ $avgBounce }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow text-center">
            <h2 class="text-lg font-semibold">Top Day</h2>
            <p class="text-2xl font-bold mt-2">{{ $date }}</p>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow mb-8">
        <h2 class="text-xl font-semibold mb-4">Sessions Over Time</h2>
        <canvas id="chart" height="100"></canvas>
    </div>
</div>

<!-- Table Section -->
<div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow mt-8">
    <h2 class="text-xl font-semibold mb-4">Recent Application Stats</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border-collapse">
            <thead class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-100">
                <tr>
                    <th class="px-4 py-2">Region</th>
                    <th class="px-4 py-2">Sessions</th>
                    <th class="px-4 py-2">Bounce Rate (%)</th>
                    <th class="px-4 py-2">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                @foreach ($paginator as $row)
                    <tr>
                        <td class="px-4 py-2">{{ $row[0] ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $row[3] ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $row[6] ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $row[13] ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $paginator->links() }}
    </div>
</div>


 <!-- Return Link -->
    <div class="text-center mt-10">
        <a href="{{ url('/') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
            ← Return to Home
        </a>
    </div>
</div>

<script>
    const ctx = document.getElementById('chart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($dates) !!},
            datasets: [{
                label: 'Sessions',
                data: {!! json_encode($sessions) !!},
                borderColor: '#2563EB',
                backgroundColor: 'rgba(37, 99, 235, 0.2)',
                borderWidth: 2,
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: {
                    ticks: {
                        color: document.documentElement.classList.contains('dark') ? '#fff' : '#000'
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: document.documentElement.classList.contains('dark') ? '#fff' : '#000'
                    }
                }
            }
        }
    });
</script>

</body>
</html>
