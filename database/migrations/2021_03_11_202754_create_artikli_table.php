<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikli', function (Blueprint $table) {
            $table->id();
            $table->string('sifra_artikla');
            $table->string('naziv_artikla');
            $table->string('bar_code');
            $table->string('jedinica_mere');
            $table->string('stopa_pdv');
            $table->string('iznos_pdv');
            $table->double('cena', 10,2);
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
        Schema::dropIfExists('artikli');
    }
}
