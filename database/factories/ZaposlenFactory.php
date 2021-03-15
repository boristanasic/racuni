<?php

namespace Database\Factories;

use App\Models\Firma;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\Zaposlen;

class ZaposlenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Zaposlen::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_name' => $this->faker->userName,
            'password' => Hash::make('12345'),
            'user_level' => $this->faker->numberBetween(1,5),
            'firma_id' => Firma::all()->random()->id,
        ];
    }
}
