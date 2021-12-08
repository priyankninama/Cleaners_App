<?php

namespace Database\Seeders;

use App\Models\BookingDetail;
use Illuminate\Database\Seeder;

class BookinDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookingDetail::factory(10)->create();
    }
}
