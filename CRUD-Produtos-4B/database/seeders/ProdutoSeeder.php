<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produto::insert([
            ['nome' => 'Notebook', 'preco' => 7000.50, 'quantidade' => 12, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Mouse', 'preco' => 89.90, 'quantidade' => 40, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Teclado', 'preco' => 249.00, 'quantidade' => 25, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Monitor 24"', 'preco' => 1299.99, 'quantidade' => 8, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
