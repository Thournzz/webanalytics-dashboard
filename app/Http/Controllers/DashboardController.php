<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class DashboardController extends Controller
{
    public function show(Request $request)
    {
        $csvPath = storage_path('app/web_analytics_clean.csv');

        if (!file_exists($csvPath)) {
            abort(404, 'CSV file not found.');
        }

        $rows = array_map('str_getcsv', file($csvPath));
        $rows = array_filter($rows, fn($row) => count($row) > 13);

        // Region filtering
        $region = $request->query('region', '');
        if ($region) {
            $rows = array_filter($rows, fn($row) => $row[0] === $region);
        }

        // All regions for dropdown
        $regions = array_values(array_unique(array_column($rows, 0)));
        sort($regions);

        // Top day (most sessions, col 3)
        usort($rows, fn($a, $b) => (float)$b[3] <=> (float)$a[3]);
        $topDay = $rows[0] ?? [];
        $date = $topDay[13] ?? 'N/A';

        // Line chart: dates + sessions
        $dates = array_column($rows, 13);
        $sessions = array_map(fn($r) => (int) $r[3], $rows);

        // KPIs
        $totalSessions = array_sum($sessions);
        $bounceRates = array_map(fn($r) => (float) $r[6], $rows);
        $avgBounce = count($bounceRates) ? round(array_sum($bounceRates) / count($bounceRates), 2) : 0;

        // Pagination
        $perPage = 10;
        $page = $request->input('page', 1);
        $sliced = array_slice($rows, ($page - 1) * $perPage, $perPage);
        $paginator = new LengthAwarePaginator($sliced, count($rows), $perPage, $page, [
            'path' => url('/dashboard'),
            'query' => $request->query(),
        ]);

        return view('dashboard', compact(
    'totalSessions',
    'avgBounce',
    'date',
    'dates',
    'sessions',
    'regions',
    'paginator',
    'region'
        ));
    }
}
