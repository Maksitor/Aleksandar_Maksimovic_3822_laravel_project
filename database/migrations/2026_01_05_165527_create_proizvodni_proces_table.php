<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('proizvodni_proces', function (Blueprint $table) {
            $table->id();
            $table->string('broj_serije', 50)->unique(); // ОБАВЕЗНО ДОДАЈ
            $table->foreignId('proizvod_id')->constrained('proizvodi')->onDelete('cascade');
            $table->foreignId('vrsta_cokolade_id')->constrained('vrste_cokolade')->onDelete('cascade');
            $table->date('datum_pocetka');
            $table->date('datum_zavrsetka')->nullable();
            $table->enum('status', ['planiran', 'u_toku', 'zavrseno'])->default('planiran');
            $table->integer('kolicina_proizvedena');
            $table->decimal('ukupna_cena', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proizvodni_proces');
    }
};