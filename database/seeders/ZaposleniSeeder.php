<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Zaposlen;

class ZaposleniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zaposlen::factory(50)->create();
    }
}
