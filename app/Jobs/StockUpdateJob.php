<?php

namespace App\Jobs;

use App\Mail\ProductStockUpdate;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class StockUpdateJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Product $product,
        public string $email
    ) {
    }

    public function handle(): void
    {
        Mail::to($this->email)
            ->send(
                new ProductStockUpdate($this->product)
            );
    }
}