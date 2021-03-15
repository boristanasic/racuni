<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Racun;

class RacuniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Racun::factory(100)->create();
    }
}
