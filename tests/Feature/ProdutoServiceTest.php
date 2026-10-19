<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Produto;
use App\Services\ProdutoService;

class ProdutoServiceTest extends TestCase
{
    /**
     * A basic feature test example.
    */

    use RefreshDatabase;

    public function test_update_completo(): void
    {
        $produto = Produto::create([
            'nome' => 'Mouse',
            'preco' => 50,
            'quantidade' => 5,
        ]);

        $service = new ProdutoService();
        $service->update($produto, [
            'nome' => 'Teclado',
            'preco' => 80,
            'quantidade' => 10,
        ]);

        $this->assertDatabaseHas('produtos', [
            'id' => $produto->id,
            'nome' => 'Teclado',
            'preco' => 80,
            'quantidade' => 10,
        ]);
    }

    public function test_update_parcial(): void
    {
        $produto = Produto::create([
            'nome' => 'Mouse',
            'preco' => 50,
            'quantidade' => 5,
        ]);

        $service = new ProdutoService();
        $resultado = $service->update($produto, ['preco' => 60]);

        $this->assertEquals('Mouse', $resultado->nome);
        $this->assertEquals(5, $resultado->quantidade);
        $this->assertEquals(60, $resultado->preco);
    }
}