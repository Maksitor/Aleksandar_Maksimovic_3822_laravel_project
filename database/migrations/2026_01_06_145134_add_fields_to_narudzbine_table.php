<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('narudzbinas', function (Blueprint $table) {
            // Dodaj proizvod_id ako ne postoji, prvo nullable
            if (!Schema::hasColumn('narudzbinas', 'proizvod_id')) {
                $table->unsignedBigInteger('proizvod_id')->nullable()->after('telefon');
            }

            // Dodaj kolicina ako ne postoji
            if (!Schema::hasColumn('narudzbinas', 'kolicina')) {
                $table->integer('kolicina')->default(1)->after('proizvod_id');
            }

            // Dodaj napomena ako ne postoji
            if (!Schema::hasColumn('narudzbinas', 'napomena')) {
                $table->text('napomena')->nullable()->after('adresa');
            }
        });

        // **Napomena:** Foreign key dodajemo naknadno, kada su svi proizvod_id validni
        // Ovo se radi ili u posebnoj migraciji ili nakon UPDATE SQL komande:
        // UPDATE narudzbinas SET proizvod_id = 1 WHERE proizvod_id IS NULL OR proizvod_id = 0;
        // Zatim: 
        // Schema::table('narudzbinas', function(Blueprint $table) {
        //     $table->foreign('proizvod_id')->references('id')->on('proizvods')->onDelete('cascade');
        // });
    }

    public function down(): void
    {
        Schema::table('narudzbinas', function (Blueprint $table) {
            // Ukloni kolone
            $columns = ['proizvod_id', 'kolicina', 'napomena'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('narudzbinas', $column)) {
                    // Prvo ukloni foreign key ako postoji
                    if ($column === 'proizvod_id') {
                        $table->dropForeign([$column]);
                    }
                    $table->dropColumn($column);
                }
            }
        });
    }
};
