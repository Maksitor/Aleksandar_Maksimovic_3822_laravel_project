<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Sirovina;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SirovineTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function stranica_stanja_sirovina_je_dostupna()
    {
        Sirovina::factory()->count(3)->create();

        // Користи исправну јавну руту
        $response = $this->get('/sirovine/stanje'); // ПРОМЕНИ овде

        $response->assertStatus(200);
        $response->assertSee('Stanje sirovina'); // Провери да ли овај текст стварно постоји у view-у
    }
}