@extends('layouts.app')

@section('titulo', 'Lista de Produtos')

@section('conteudo')
    <div class="card bg-white dark:bg-[#161615] shadow-[inset_0px_1px_0px_0px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_1px_0px_0px_#fffaed2d] rounded-lg p-6">
        <h1 class="text-lg font-medium mb-4">Lista de Produtos</h1>

        @forelse ($produtos as $produto)
            <div class="row flex items-center justify-between gap-4 py-3 border-b border-[#e3e3e0] dark:border-[#3E3E3A] last:border-0">
                <div>
                    <p class="font-medium">{{ $produto->nome }}</p>
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                        R$ {{ number_format($produto->preco, 2, ',', '.') }} &middot; {{ $produto->quantidade }} un
                    </p>
                </div>
                <div class="flex items-center gap-3 text-sm">
                    <a href="{{ route('produtos.show', $produto) }}" class="text-[#f53003] dark:text-[#FF4433] hover:underline">Ver</a>
                    <a href="{{ route('produtos.edit', $produto) }}" class="muted text-[#706f6c] dark:text-[#A1A09A] hover:underline">Editar</a>
                    <form action="{{ route('produtos.destroy', $produto) }}" method="POST" onsubmit="return confirm('Excluir este produto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 dark:text-[#FF4433] hover:underline">Excluir</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="muted text-[#706f6c] dark:text-[#A1A09A]">Nenhum produto cadastrado.</p>
        @endforelse
    </div>
@endsection