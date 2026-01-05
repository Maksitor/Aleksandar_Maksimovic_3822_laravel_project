<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('narudzbine', function (Blueprint $table) {
            $table->id();
            $table->string('ime_kupca');
            $table->string('email');
            $table->string('telefon');
            $table->string('adresa');
            $table->text('napomena')->nullable();
            $table->string('broj_narudzbine')->unique();
            $table->foreignId('proizvod_id')->constrained('proizvodi')->onDelete('cascade');
            $table->integer('kolicina');
            $table->decimal('ukupna_cena', 10, 2);
            $table->string('status')->default('kreirana');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('narudzbine');
    }
};