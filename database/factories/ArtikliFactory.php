<?php

namespace Database\Factories;

use App\Models\Artikli;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtikliFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Artikli::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sifra_artikla' => $this->faker->numberBetween(00000,99999),
            'naziv_artikla' => $this->faker->name,
            'bar_code' => $this->faker->numberBetween(0000000,9999999),
            'jedinica_mere' => $this->faker->randomElement(['kom','lit','gr','kg','sat']),
            'stopa_pdv' => $this->faker->randomElement(['0,10,20']),
            'iznos_pdv' => $this->faker->randomFloat(2,1,999999),
            'cena' => $this->faker->randomFloat(2,1,999999),
        ];
    }
}
