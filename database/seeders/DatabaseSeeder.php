<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Racun;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         User::factory(10)->create();
//         Artikli::factory(20)->create();
//         Firma::factory(5)->create();
            Racun::factory(50)->create();

//        $this->call(UserFactory::class);
    }
}
