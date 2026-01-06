<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('proizvodni_proces', function (Blueprint $table) {
            $table->decimal('ukupna_cena', 10, 2)->nullable()->after('kolicina_proizvoda');
        });
    }

    public function down()
    {
        Schema::table('proizvodni_proces', function (Blueprint $table) {
            $table->dropColumn('ukupna_cena');
        });
    }
};
