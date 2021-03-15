<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('racuni', function (Blueprint $table) {
            $table->id();
            $table->string('broj_fakture');
            $table->string('opis');
            $table->date('datum_izdavanja');
            $table->date('datum_valute');
            $table->double('ukupno_sa_pdv', 10, 2);
            $table->double('samo_pdv', 10, 2);
            $table->double('ukupno_iznos', 10, 2);
            $table->bigInteger('fakturu_pravio_id');
            $table->bigInteger('fakturu_izmenio_id');
            $table->bigInteger('klijent_id');
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
        Schema::dropIfExists('racun');
    }
}
