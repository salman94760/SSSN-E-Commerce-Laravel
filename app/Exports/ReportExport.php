
<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportExport implements FromCollection, WithHeadings
{
    protected $data;
    protected $type;

    public function __construct($data, $type)
    {
        $this->data = $data;
        $this->type = $type;
    }

    public function headings(): array
    {
        if ($this->type === 'products') {
            return [
                'ID', 'Product Name', 'Price', 'Created At'
            ];
        }

        if ($this->type === 'payments') {
            return [
                'Order Number', 'Payment Method',
                'Payment Status', 'Amount', 'Date'
            ];
        }

        return [
            'Order Number', 'Order Status',
            'Payment Status', 'Amount', 'Date'
        ];
    }

    public function collection()
    {
        return $this->data->map(function ($item) {

            if ($this->type === 'products') {
                return [
                    $item->id,
                    $item->name,
                    $item->price,
                    $item->created_at?->format('Y-m-d')
                ];
            }

            $amount = $item->total_amount
                - ($item->discount_amount ?? 0);

            if ($this->type === 'payments') {
                return [
                    $item->order_number,
                    $item->payment_method,
                    $item->payment_status,
                    $amount,
                    $item->created_at?->format('Y-m-d')
                ];
            }

            return [
                $item->order_number,
                $item->order_status,
                $item->payment_status,
                $amount,
                $item->created_at?->format('Y-m-d')
            ];
        });
    }
}
