<?php

namespace Database\Seeders;

use App\Models\ProizvodniProces;
use Illuminate\Database\Seeder;

class ProizvodniProcesiSeeder extends Seeder
{
    public function run()
    {
        $procesi = [
            [
                'broj_serije' => 'SER-2025-1001',
                'proizvod_id' => 1,
                'vrsta_cokolade_id' => 1,
                'datum_pocetka' => '2025-12-01',
                'datum_zavrsetka' => '2025-12-05',
                'status' => 'zavrseno',
                'kolicina_proizvedena' => 5000,
                'ukupna_cena' => 1750000.00,
            ],
            [
                'broj_serije' => 'SER-2025-1002',
                'proizvod_id' => 2,
                'vrsta_cokolade_id' => 2,
                'datum_pocetka' => '2025-12-10',
                'datum_zavrsetka' => '2025-12-15',
                'status' => 'zavrseno',
                'kolicina_proizvedena' => 3000,
                'ukupna_cena' => 1350000.00,
            ],
            [
                'broj_serije' => 'SER-2026-001',
                'proizvod_id' => 3,
                'vrsta_cokolade_id' => 3,
                'datum_pocetka' => '2026-01-03',
                'datum_zavrsetka' => null,
                'status' => 'u_toku',
                'kolicina_proizvedena' => 2000,
                'ukupna_cena' => null,
            ],
            [
                'broj_serije' => 'SER-2026-002',
                'proizvod_id' => 4,
                'vrsta_cokolade_id' => 4,
                'datum_pocetka' => '2026-01-07',
                'datum_zavrsetka' => null,
                'status' => 'planiran',
                'kolicina_proizvedena' => 1500,
                'ukupna_cena' => null,
            ],
        ];

        foreach ($procesi as $proces) {
            ProizvodniProces::create($proces);
        }
    }
}