<?php

namespace Database\Seeders;

use App\Models\Cleaner;
use Illuminate\Database\Seeder;

class CleanerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cleaner::factory(10)->create();
    }
}
