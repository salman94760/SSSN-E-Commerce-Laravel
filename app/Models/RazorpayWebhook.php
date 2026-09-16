<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RazorpayWebhook extends Model
{
    protected $fillable = [
        'event',
        'razorpay_event_id',
        'payload',
    ];

    protected $casts = [
        'payload' => 'array',
    ];
}