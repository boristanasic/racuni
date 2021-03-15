<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firma', function (Blueprint $table) {
            $table->id();
            $table->string('naziv_firme');
            $table->string('adresa_firme');
            $table->string('mesto');
            $table->string('zip_postal');
            $table->string('telefon');
            $table->string('mobilni');
            $table->string('email');
            $table->string('web_adresa');
            $table->string('pib');
            $table->string('maticni_broj');
            $table->string('registarski_broj');
            $table->string('sifra_delatnosti');
            $table->string('banka');
            $table->string('tekuci_racun');
            $table->string('kontakt_osoba');
            $table->string('pdv_obveznik');
            $table->bigInteger('user_id');
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
        Schema::dropIfExists('firma');
    }
}
