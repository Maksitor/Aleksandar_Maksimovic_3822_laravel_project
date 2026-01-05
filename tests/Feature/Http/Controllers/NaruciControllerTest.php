<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NaruciControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function web_behaves_as_expected()
    {
        // Користи исправну руту (naruci.create уместо narucis.web)
        $response = $this->get('/naruci');
        
        $response->assertStatus(200);
        // Додај и ове асерције ако желиш
        // $response->assertViewIs('naruci.create');
        // $response->assertSee('Naručivanje');
    }
}