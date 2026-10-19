<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProdutoTest extends TestCase
{
    /**
     * A basic feature test example.
    */
    use RefreshDatabase;

    public function test_preco_negativo(): void
    {
        $response = $this->postJson('/api/produtos', [
            'nome' => 'Mouse',
            'preco' => -10,
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('preco');
        $this->assertDatabaseCount('produtos', 0);
    }
}