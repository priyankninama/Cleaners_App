<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cleaner extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_no'
    ];
    protected $hidden = ['pivot'];

    public function cities() {
        return $this->belongsToMany(City::class);
    }

    public function bookingDetail($cityId) {
        $city = Cleaner::find($cityId);
        return $this->hasOne(BookingDetail::class, $city);
    }

}
