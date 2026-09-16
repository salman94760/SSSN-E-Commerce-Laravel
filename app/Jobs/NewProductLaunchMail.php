<?php

namespace App\Jobs;

use App\Mail\NewProductAdded;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class NewProductLaunchMail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Product $product)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        User::whereNotNull('email')->where('role','customer')
        ->chunk(10, function($users){
            foreach($users as $user){
                Mail::to($user->email)->send(new NewProductAdded($this->product));
            }
        });
    }
}
