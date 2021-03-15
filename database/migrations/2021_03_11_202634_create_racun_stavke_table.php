<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacunStavkeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('racun_stavke', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('racun_id');
            $table->bigInteger('artikal_id');
            $table->string('sifra_artikla');
            $table->string('naziv_artikla');
            $table->string('bar_code');
            $table->string('jedinica_mere');
            $table->string('stopa_pdv');
            $table->string('iznos_pdv');
            $table->double('cena', 10,2);
            $table->integer('komada');
            $table->double('ukupan_pdv', 10,2);
            $table->double('ukupno_cena', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('racun_stavke');
    }
}
