<?php

namespace Database\Factories;

use App\Models\Firma;
use App\Models\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FirmaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Firma::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naziv_firme' => $this->faker->company,
        'adresa_firme' =>$this->faker->address,
        'mesto' => $this->faker->city,
        'zip_postal' => $this->faker->postcode,
        'telefon' => $this->faker->phoneNumber,
        'mobilni' => $this->faker->phoneNumber,
        'email' => $this->faker->companyEmail,
        'web_adresa' => $this->faker->url,
        'pib' => $this->faker->numberBetween(10000001, 99999999),
        'maticni_broj' => $this->faker->numberBetween(10000001, 99999999),
        'registarski_broj' => $this->faker->numberBetween(10000001, 99999999),
        'sifra_delatnosti' => $this->faker->numberBetween(10000, 99999),
        'banka' => $this->faker->company,
        'tekuci_racun' => $this->faker->bankAccountNumber,
        'kontakt_osoba' => $this->faker->name . ' ' . $this->faker->lastName,
        'pdv_obveznik' => $this->faker->numberBetween(0,1),
        'user_id' => User::factory(),
        ];
    }
}
