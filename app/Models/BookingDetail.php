<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'city_id',
        'cleaner_id',
        'date_time',
        'no_of_hours',
        'booked_time',
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function cleaner() {
        return $this->belongsTo(Cleaner::class);
    }

    public function scopeBookedCleaners($query, $startTime, $endTime)
    {
        return $query->whereBetween('date_time', [$startTime, $endTime])
            ->orWhereBetween('booked_time', [$startTime, $endTime])
            ->orWhere(function ($query) use($startTime, $endTime) {
                return $query->where('date_time', '<=', $startTime)->where('booked_time', '>=', $endTime);
            })->with('cleaner');
    }

}
