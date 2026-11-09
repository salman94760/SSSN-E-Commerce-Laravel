<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ReportController extends Controller
{




    public function index(Request $request)
    {
        $type = $request->query('type', 'orders');

        abort_unless(
            in_array($type, ['products', 'orders', 'payments']),
            404
        );

        $query = $this->reportQuery($type, $request);

        $reports = $query->latest()->paginate(10)
            ->withQueryString();

        $totalProducts = Product::count();
        $totalOrders = Order::count();

        // $totalRevenue = Order::where('payment_status', 'Paid')
        //     ->selectRaw(
        //         'COALESCE(SUM(total_amount - COALESCE(discount_amount, 0)), 0) as revenue'
        //     )
        //     ->value('revenue');

        $totalRevenue = 0;

        $paidPayments = Order::where('payment_status', 'Paid')->count();

        return view('dashboard.reports.index', compact(
            'reports',
            'type',
            'totalProducts',
            'totalOrders',
            'totalRevenue',
            'paidPayments'
        ));
    }

    public function export(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:products,orders,payments',
            'format' => 'required|in:pdf,excel,csv',
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date|after_or_equal:from_date',
        ]);

        $type = $validated['type'];
        $format = $validated['format'];

        $data = $this->reportQuery($type, $request)->get();

        $filename = $type . '-report-' . now()->format('Y-m-d');

        if ($format === 'pdf') {
            return Pdf::loadView('dashboard.reports.pdf', [
                'data' => $data,
                'type' => $type
            ])
            ->setPaper('a4', 'landscape')
            ->download($filename . '.pdf');
        }

        $export = new ReportExport($data, $type);

        if ($format === 'csv') {
            return Excel::download(
                $export,
                $filename . '.csv',
                \Maatwebsite\Excel\Excel::CSV
            );
        }

        return Excel::download(
            $export,
            $filename . '.xlsx',
            \Maatwebsite\Excel\Excel::XLSX
        );
    }

    private function reportQuery($type, Request $request)
    {
        $query = $type === 'products'
            ? Product::query()
            : Order::query();

        $request->validate([
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date|after_or_equal:from_date',
        ]);

        if ($request->filled('from_date')) {
            $query->whereDate(
                'created_at', '>=', $request->from_date
            );
        }

        if ($request->filled('to_date')) {
            $query->whereDate(
                'created_at', '<=', $request->to_date
            );
        }

        return $query;
    }










}



