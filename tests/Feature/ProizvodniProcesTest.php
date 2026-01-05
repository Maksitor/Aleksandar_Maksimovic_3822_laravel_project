<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Proizvod;
use App\Models\VrstaCokolade;
use App\Models\ProizvodniProces;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProizvodniProcesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_moze_da_kreira_proizvodni_proces()
    {
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $proizvod = Proizvod::factory()->create();
        $vrsta = VrstaCokolade::factory()->create();

        // ИСПРАВИ статус: 'planirano' -> 'planiran' (јер у миграцији имаш 'planiran')
        $response = $this->actingAs($admin)->post('/admin/proizvodni-procesi', [
            'broj_serije' => 'SER-001',
            'proizvod_id' => $proizvod->id,
            'vrsta_cokolade_id' => $vrsta->id,
            'datum_pocetka' => now()->toDateString(),
            'datum_zavrsetka' => now()->addDays(7)->toDateString(), 
            'kolicina_proizvedena' => 100,
            'ukupna_cena' => 5000, 
            'status' => 'planiran' // ПРОМЕНИ: 'planirano' -> 'planiran'
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('proizvodni_procesi', [
            'broj_serije' => 'SER-001'
        ]);
    }
}