<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Dapur Buka');
        $response->assertSee('07.30');
        $response->assertSee('Antar Toko & COD', false);
        $response->assertDontSee('title="Halaman Beranda"', false);
        $response->assertDontSee('title="Buka Etalase Belanja"', false);
    }
}
