<?php

namespace Tests\Feature;

use App\Models\Produto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProdutoCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_lista_produtos(): void
    {
        Produto::create(['nome' => 'Notebook', 'preco' => 7000.50, 'quantidade' => 12]);

        $this->get('/produtos')
            ->assertOk()
            ->assertSee('Notebook');
    }

    public function test_create_exibe_formulario(): void
    {
        $this->get('/produtos/create')
            ->assertOk();
    }

    public function test_store_cadastra_produto(): void
    {
        $this->post('/produtos', [
            'nome' => 'Mouse',
            'preco' => 89.90,
            'quantidade' => 40,
        ])->assertRedirect('/produtos');

        $this->assertDatabaseHas('produtos', [
            'nome' => 'Mouse',
            'preco' => 89.90,
            'quantidade' => 40,
        ]);
    }

    public function test_store_valida_campos_obrigatorios(): void
    {
        $this->post('/produtos', [
            'nome' => '',
            'preco' => -5,
            'quantidade' => -1,
        ])->assertSessionHasErrors(['nome', 'preco', 'quantidade']);
    }

    public function test_update_altera_produto(): void
    {
        $produto = Produto::create(['nome' => 'Teclado', 'preco' => 249.00, 'quantidade' => 25]);

        $this->put("/produtos/{$produto->id}", [
            'nome' => 'Teclado Mecânico',
            'preco' => 399.00,
            'quantidade' => 15,
        ])->assertRedirect('/produtos');

        $this->assertDatabaseHas('produtos', [
            'id' => $produto->id,
            'nome' => 'Teclado Mecânico',
            'preco' => 399.00,
            'quantidade' => 15,
        ]);
    }

    public function test_destroy_exclui_produto(): void
    {
        $produto = Produto::create(['nome' => 'Monitor', 'preco' => 1299.99, 'quantidade' => 8]);

        $this->delete("/produtos/{$produto->id}")
            ->assertRedirect('/produtos');

        $this->assertDatabaseMissing('produtos', ['id' => $produto->id]);
    }
}