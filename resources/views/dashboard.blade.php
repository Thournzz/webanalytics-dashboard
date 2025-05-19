<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <title>Analytics Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition duration-300">

<div class="max-w-2xl mx-auto p-4 space-y-6">

    <!-- Header -->
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">📊 Dashboard</h1>
        <button onclick="document.documentElement.classList.toggle('dark')" class="text-sm bg-gray-200 dark:bg-gray-700 px-3 py-1 rounded">
            Toggle Theme
        </button>
    </div>

    <!-- Region Filter -->
    <form method="GET">
        <label for="region" class="block text-sm font-semibold mb-1">🌍 Filter by Region</label>
        <select name="region" id="region" onchange="this.form.submit()"
                class="w-full p-2 rounded border bg-white dark:bg-gray-800">
            <option value="">All Regions</option>
            @foreach ($regions as $reg)
                <option value="{{ $reg }}" {{ request('region') == $reg ? 'selected' : '' }}>{{ $reg }}</option>
            @endforeach
        </select>
    </form>

    <!-- KPI Cards -->
    <div class="space-y-4">
        <div class="bg-white dark:bg-gray-800 rounded p-4 shadow">
            <h2 class="text-sm font-medium">📈 Total Sessions</h2>
            <p class="text-xl font-bold">{{ $totalSessions }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded p-4 shadow">
            <h2 class="text-sm font-medium">🚪 Avg. Bounce Rate (%)</h2>
            <p class="text-xl font-bold">{{ $avgBounce }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded p-4 shadow">
            <h2 class="text-sm font-medium">📅 Top Day</h2>
            <p class="text-xl font-bold">{{ $date }}</p>
        </div>
    </div>

    <!-- Chart Toggle -->
    <div class="bg-white dark:bg-gray-800 p-4 rounded shadow">
        <div class="flex justify-between items-center">
            <h2 class="text-sm font-semibold">📊 Sessions Over Time</h2>
            <button onclick="document.getElementById('chartWrap').classList.toggle('hidden')" class="text-xs text-blue-500 underline">
                Toggle View
            </button>
        </div>
        <div id="chartWrap" class="mt-4">
            <canvas id="chart" height="120"></canvas>
        </div>
    </div>

    <!-- Table Section (Mobile-first) -->
    <div class="bg-white dark:bg-gray-800 p-4 rounded shadow">
        <h2 class="text-sm font-semibold mb-3">🗂️ Recent Stats</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="px-2 py-1">Region</th>
                        <th class="px-2 py-1">Sessions</th>
                        <th class="px-2 py-1">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                    @foreach ($paginator as $row)
                        <tr>
                            <td class="px-2 py-1">{{ $row[0] ?? 'N/A' }}</td>
                            <td class="px-2 py-1">{{ $row[3] ?? 'N/A' }}</td>
                            <td class="px-2 py-1">{{ $row[13] ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3 text-center">
            {{ $paginator->links() }}
        </div>
    </div>

    <!-- Return Home -->
    <div class="text-center">
        <a href="{{ url('/') }}" class="inline-block text-sm bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
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
            plugins: { legend: { display: false } },
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
