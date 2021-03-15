<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Klijent;

class KlijentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Klijent::factory(50)->create();
    }
}
