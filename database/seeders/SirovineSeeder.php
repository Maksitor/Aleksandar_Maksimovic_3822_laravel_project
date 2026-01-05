<?php

namespace Database\Seeders;

use App\Models\Sirovina;
use Illuminate\Database\Seeder;

class SirovinaSeeder extends Seeder
{
    public function run(): void
    {
        $sirovine = [
            [
                'naziv' => 'Kakao zrna',
                'kolicina_na_stanju' => 150.50,
                'jedinica_mere' => 'kg',
                'min_kolicina' => 100.00,
                'cena_po_jedinici' => 12.50,
                'status' => 'dostupno'
            ],
            [
                'naziv' => 'Šećer',
                'kolicina_na_stanju' => 300.00,
                'jedinica_mere' => 'kg',
                'min_kolicina' => 50.00,
                'cena_po_jedinici' => 0.80,
                'status' => 'dostupno'
            ],
            [
                'naziv' => 'Mleko u prahu',
                'kolicina_na_stanju' => 80.25,
                'jedinica_mere' => 'kg',
                'min_kolicina' => 30.00,
                'cena_po_jedinici' => 2.30,
                'status' => 'dostupno'
            ],
            [
                'naziv' => 'Lešnici',
                'kolicina_na_stanju' => 45.00,
                'jedinica_mere' => 'kg',
                'min_kolicina' => 20.00,
                'cena_po_jedinici' => 8.50,
                'status' => 'kriticno'
            ],
            [
                'naziv' => 'Vanila',
                'kolicina_na_stanju' => 2.50,
                'jedinica_mere' => 'kg',
                'min_kolicina' => 1.00,
                'cena_po_jedinici' => 45.00,
                'status' => 'nedostupno'
            ]
        ];

        foreach ($sirovine as $sirovina) {
            Sirovina::create($sirovina);
        }
    }
}