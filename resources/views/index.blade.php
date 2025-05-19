<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web Analytics Insight Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100">

<div class="max-w-3xl mx-auto px-4 py-8 space-y-10">

    <!-- Header -->
    <header class="text-center space-y-4">
        <h1 class="text-4xl font-bold">📊 Web Analytics Insight Portal</h1>
        <p class="text-sm text-gray-600 dark:text-gray-300">
            Monitor your application traffic, session dynamics, and bounce rates with ease — all from a CSV-powered, fully responsive dashboard.
        </p>
        <a href="/dashboard" class="inline-block mt-4 bg-blue-600 text-white py-2 px-6 rounded hover:bg-blue-700 transition">
            Go to Dashboard →
        </a>
    </header>

    <!-- Features -->
    <section class="space-y-6">
        <h2 class="text-2xl font-semibold text-center">✨ Core Features</h2>
        <div class="space-y-4">
            @foreach([
                ['📈', 'Session Tracking', 'Visualize daily or monthly usage trends and user behavior.'],
                ['🌎', 'Region Insights', 'Segment data by global zones and optimize regional performance.'],
                ['📉', 'Bounce Rates', 'Measure user retention and page effectiveness.'],
                ['📂', 'CSV-Based', 'No database required — runs entirely on static data.'],
                ['⚡', 'Instant Load', 'Fast page loads without backend query delays.'],
                ['🛠️', 'Tech Stack', 'Built with Laravel 12, Tailwind CSS, and Chart.js.']
            ] as [$emoji, $title, $desc])
            <div class="bg-white dark:bg-gray-800 p-4 rounded shadow">
                <h3 class="text-lg font-semibold">{{ $emoji }} {{ $title }}</h3>
                <p class="text-sm text-gray-700 dark:text-gray-300">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Use Cases -->
    <section class="bg-white dark:bg-gray-800 p-6 rounded shadow space-y-3">
        <h2 class="text-xl font-bold">💼 Use Cases</h2>
        <ul class="list-disc list-inside space-y-1 text-sm">
            <li>Reporting and visualization for non-technical teams.</li>
            <li>Portable dashboards with zero dependencies.</li>
            <li>Performance summaries during stand-ups and reviews.</li>
            <li>Internal KPI monitoring across multiple regions.</li>
            <li>Freelancer analytics preview for client delivery.</li>
        </ul>
    </section>

    <!-- FAQ -->
    <section class="bg-white dark:bg-gray-800 p-6 rounded shadow space-y-4">
        <h2 class="text-xl font-bold">❓ Frequently Asked</h2>
        <div class="space-y-2 text-sm">
            <p><strong>Do I need a database?</strong> Nope. This app uses just a local CSV file.</p>
            <p><strong>Is it mobile-optimized?</strong> Yes! Designed from the ground up for mobile users.</p>
            <p><strong>How secure is it?</strong> There’s no input or login data — it’s entirely static and secure by design.</p>
            <p><strong>Can I export metrics?</strong> Yes, just modify the backend to export filtered CSV.</p>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="bg-white dark:bg-gray-800 p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">💬 Testimonials</h2>
        <div class="space-y-4 text-sm">
            <blockquote class="border-l-4 border-blue-500 pl-4 italic text-gray-700 dark:text-gray-300">
                "This saved our product team weeks of dev time. We love the simplicity!" — Product Manager
            </blockquote>
            <blockquote class="border-l-4 border-blue-500 pl-4 italic text-gray-700 dark:text-gray-300">
                "Perfect for lightweight analytics tracking during dev sprints." — QA Engineer
            </blockquote>
            <blockquote class="border-l-4 border-blue-500 pl-4 italic text-gray-700 dark:text-gray-300">
                "The fact that it works off CSV and still looks this clean is impressive." — DevOps Engineer
            </blockquote>
        </div>
    </section>

    <!-- Contact -->
    <section class="bg-white dark:bg-gray-800 p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-2">📮 Contact Us</h2>
        <p class="text-sm text-gray-700 dark:text-gray-300">
            Want to collaborate or integrate? Reach out via email at <a href="mailto:support@analyticsapp.com" class="text-blue-600 dark:text-blue-400 underline">support@analyticsapp.com</a>.
        </p>
    </section>

    <!-- Footer -->
    <footer class="text-center text-xs text-gray-500 dark:text-gray-400 pt-8">
        &copy; {{ date('Y') }} Web Analytics Dashboard. Built with ❤️ in Laravel.
    </footer>
</div>

</body>
</html>
