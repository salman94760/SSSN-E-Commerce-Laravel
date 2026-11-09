
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ ucfirst($type) }} Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #5d4936; font-size: 11px; }
        h1 { color: #6b5540; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: #eee3d3; text-align: left; }
        th, td { padding: 9px; border: 1px solid #e8dccb; }
        tr:nth-child(even) { background: #f8f5ef; }
    </style>
</head>
<body>
    <h1>{{ ucfirst($type) }} Report</h1>
    <p>Generated: {{ now()->format('d M Y, h:i A') }}</p>

    <table>
        <thead>
            <tr>
                @if($type === 'products')
                    <th>ID</th><th>Product</th><th>Price (INR)</th><th>Date</th>
                @else
                    <th>Order Number</th>
                    <th>{{ $type === 'payments' ? 'Payment Method' : 'Order Status' }}</th>
                    <th>Payment Status</th>
                    <th>Amount (INR)</th>
                    <th>Date</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($data as $item)
                <tr>
                    @if($type === 'products')
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($item->price, 2) }}</td>
                    @else
                        <td>{{ $item->order_number }}</td>
                        <td>{{ $type === 'payments' ? $item->payment_method : $item->order_status }}</td>
                        <td>{{ $item->payment_status }}</td>
                        <td>{{ number_format($item->total_amount - ($item->discount_amount ?? 0), 2) }}</td>
                    @endif
                    <td>{{ $item->created_at?->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No data found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
