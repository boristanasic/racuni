<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Klijent;
use App\Models\Racun;

class RacunFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Racun::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'broj_fakture' => $this->faker->numberBetween(1,10000),
            'opis' => $this->faker->text(50),
            'datum_izdavanja' => $this->faker->date('Y-m-d'),
            'datum_valute' => $this->faker->date('Y-m-d'),
            'ukupno_sa_pdv' => $this->faker->numberBetween(1,10000),
            'samo_pdv' => $this->faker->numberBetween(1,10000),
            'ukupno_iznos' => $this->faker->numberBetween(1,10000),
            'fakturu_pravio_id' => $this->faker->numberBetween(1,10),
            'fakturu_izmenio_id' => $this->faker->numberBetween(1,10),
            'klijent_id' => Klijent::all()->random()->id,
        ];
    }
}
