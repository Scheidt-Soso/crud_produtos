<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::latest()->get();

        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'preco' => ['required', 'numeric', 'min:0'],
            'quantidade' => ['required', 'integer', 'min:0'],
        ]);

        Produto::create($dados);

        return redirect()->route('produtos.index')->with('sucesso', 'Produto cadastrado com sucesso!');
    }

    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'preco' => ['required', 'numeric', 'min:0'],
            'quantidade' => ['required', 'integer', 'min:0'],
        ]);

        $produto->update($dados);

        return redirect()->route('produtos.index')->with('sucesso', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')->with('sucesso', 'Produto removido com sucesso!');
    }
}
