<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $hidden = ['pivot'];

    public function cleaners() {
        return $this->belongsToMany(Cleaner::class);
    }

}
