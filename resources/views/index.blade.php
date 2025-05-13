<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Analytics Insight Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 1rem;
            background: #f9fafb;
            color: #1f2937;
        }
        .container {
            max-width: 800px;
            margin: auto;
        }
        header {
            text-align: center;
            margin-bottom: 2rem;
        }
        h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        p.subtitle {
            color: #4b5563;
            font-size: 1rem;
        }
        .button {
            display: inline-block;
            padding: 1rem 2rem;
            background-color: #2563eb;
            color: white;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: bold;
            margin-top: 1rem;
            text-align: center;
        }

        section {
            background: white;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
        }

        section h2 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: #111827;
        }

        ul {
            list-style: none;
            padding-left: 0;
        }

        li {
            padding-left: 1rem;
            margin-bottom: 0.5rem;
            position: relative;
        }

        li::before {
            content: "📊";
            position: absolute;
            left: 0;
        }

        @media (min-width: 640px) {
            .button {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Web Analytics Insight Portal</h1>
            <p class="subtitle">
                Visualize performance metrics from application data — sessions, bounce rate, and regional breakdowns.
                Fully responsive and built with mobile-first principles.
            </p>
            <a href="/dashboard" class="button">View Dashboard →</a>
        </header>

        <section>
            <h2>📌 What You Can Monitor</h2>
            <ul>
                <li><strong>Session Trends</strong> — Monthly and daily volumes across all channels.</li>
                <li><strong>Bounce Rate</strong> — See how visitor engagement changes.</li>
                <li><strong>Region Analysis</strong> — Segment sessions by zone (A–Z or custom).</li>
                <li><strong>Date Breakdown</strong> — See traffic patterns by `Session Date`.</li>
                <li><strong>Data Summaries</strong> — Top days, averages, and exportable metrics.</li>
                <li><strong>CSV-Powered</strong> — No database needed, powered by CSV.</li>
            </ul>
        </section>

        <section>
            <h2>🧠 Use Case Scenarios</h2>
            <ul>
                <li>Instant visibility into engagement and traffic stats.</li>
                <li>Export-ready charts and summaries for compliance or review.</li>
                <li>No cloud/database dependency — all runs from CSV.</li>
                <li>Fully mobile-compatible — accessible on phone, tablet, desktop.</li>
            </ul>
        </section>

        <section>
            <h2>🛠️ How It’s Built</h2>
            <ul>
                <li><strong>Frontend:</strong> Tailwind CSS layout, Chart.js charts</li>
                <li><strong>Backend:</strong> Laravel controller parsing local CSV data</li>
                <li><strong>Performance:</strong> Pagination + region filtering for scale</li>
            </ul>
        </section>
    </div>
</body>
</html>
