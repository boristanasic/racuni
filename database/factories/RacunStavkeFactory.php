<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\RacunStavke;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Racun;
use App\Models\Artikli;

class RacunStavkeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RacunStavke::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $artikal = Artikli::all()->random();
        return [
            'racun_id' => Racun::all()->random()->id,
            'artikal_id' => $artikal->id,
            'sifra_artikla' => $artikal->sifra_artikla,
            'naziv_artikla' => $artikal->naziv_artikla,
            'bar_code' => $artikal->bar_code,
            'jedinica_mere' => $artikal->jedinica_mere,
            'stopa_pdv' => $artikal->stopa_pdv,
            'iznos_pdv' => $artikal->iznos_pdv,
            'cena' => $this->faker->randomFloat(2,1,999999),
            'komada' => $this->faker->numberBetween(1,10),
            'ukupan_pdv' => $this->faker->randomFloat(2,1,999999),
            'ukupno_cena' => $this->faker->randomFloat(2,1,999999),
        ];
    }
}
