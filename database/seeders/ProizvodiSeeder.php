<?php

namespace Database\Seeders;

use App\Models\Proizvod;
use App\Models\VrstaCokolade;
use Illuminate\Database\Seeder;

class ProizvodSeeder extends Seeder
{
    public function run(): void
    {
        $vrste = VrstaCokolade::all();

        $proizvodi = [
            [
                'naziv' => 'Mlečna čokolada 100g',
                'opis' => 'Klasična mlečna čokolada u tabli od 100g',
                'cena' => 299.00,
                'vrsta_cokolade_id' => $vrste->where('naziv', 'Mlečna čokolada')->first()->id,
                'status' => 'active',
                'slika' => 'mlecna.jpg'
            ],
            [
                'naziv' => 'Tamna čokolada 85% 100g',
                'opis' => 'Tamna čokolada sa 85% kakaa, intenzivnog ukusa',
                'cena' => 399.00,
                'vrsta_cokolade_id' => $vrste->where('naziv', 'Extra tamna')->first()->id,
                'status' => 'active',
                'slika' => 'tamna.jpg'
            ],
            [
                'naziv' => 'Čokolada sa lešnikom 150g',
                'opis' => 'Mlečna čokolada sa celim lešnicima',
                'cena' => 349.00,
                'vrsta_cokolade_id' => $vrste->where('naziv', 'Mlečna čokolada')->first()->id,
                'status' => 'active',
                'slika' => 'lesnik.jpg'
            ],
            [
                'naziv' => 'Bela čokolada sa jagodom',
                'opis' => 'Bela čokolada sa sušenim jagodama',
                'cena' => 379.00,
                'vrsta_cokolade_id' => $vrste->where('naziv', 'Bela čokolada')->first()->id,
                'status' => 'active',
                'slika' => 'bela.jpg'
            ]
        ];

        foreach ($proizvodi as $proizvod) {
            Proizvod::create($proizvod);
        }
    }
}