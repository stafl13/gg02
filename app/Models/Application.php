<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id',
        'address',
        'phone',
        'test_drive_date',
        'test_drive_time',
        'license_series',
        'license_number',
        'license_date',
        'car_brand',
        'car_model',
        'payment_type',
        'status',
        'reject_reason'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}