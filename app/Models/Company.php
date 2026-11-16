<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Company extends Model
{
    protected $fillable = [
    'company_name',
    'company_email',
    'phone',
    'website',
    'address',
    'logo',
    'facebook',
    'instagram',
    'youtube',
    'whatsapp',
    'user_id',
    'dot_number',
    'mc_number',
    'ein_number',
    'status',
    'city',
    'state',
    'zipcode',
    'country',
];

public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
