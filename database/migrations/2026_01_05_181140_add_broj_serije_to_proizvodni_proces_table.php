<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('proizvodni_proces', function (Blueprint $table) {
            // Додај колону broj_serije
            $table->string('broj_serije', 50)->unique()->after('id');
        });
    }

    public function down()
    {
        Schema::table('proizvodni_proces', function (Blueprint $table) {
            $table->dropColumn('broj_serije');
        });
    }
};