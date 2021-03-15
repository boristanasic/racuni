<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RacunStavke;

class RacuniStavkeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RacunStavke::factory(300)->create();
    }
}
