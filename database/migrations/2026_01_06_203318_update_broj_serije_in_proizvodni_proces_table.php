<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('proizvodni_proces', function (Blueprint $table) {
            // Kolona broj_serije sada mora biti unique
            $table->string('broj_serije', 50)->unique()->change();
        });
    }

    public function down(): void
    {
        Schema::table('proizvodni_proces', function (Blueprint $table) {
            // Vraća na prethodno stanje, može biti bez unique
            $table->string('broj_serije', 50)->change();
        });
    }
};
