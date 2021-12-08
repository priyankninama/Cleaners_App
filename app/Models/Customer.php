<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_no',
    ];

    public function bookingDetail() {
        return $this->hasMany(BookingDetail::class);
    }

}
