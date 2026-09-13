@extends('layouts.app')

@section('titulo', 'Novo Produto')

@section('conteudo')
    <div class="card bg-white dark:bg-[#161615] shadow-[inset_0px_1px_0px_0px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_1px_0px_0px_#fffaed2d] rounded-lg p-6">
        <h1 class="text-lg font-medium mb-6">Novo Produto</h1>

        @if ($errors->any())
            <div class="mb-6 px-4 py-3 rounded-sm bg-red-500/10 border border-red-500/30">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produtos.store') }}" method="POST" class="form flex flex-col gap-4 max-w-md">
            @csrf

            <div>
                <label for="nome" class="block text-sm mb-1">Nome</label>
                <input
                    type="text"
                    id="nome"
                    name="nome"
                    value="{{ old('nome') }}"
                    required
                    class="w-full px-3 py-2 rounded-sm border border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#161615] focus:outline-none focus:border-[#f53003]"
                >
            </div>

            <div>
                <label for="preco" class="block text-sm mb-1">Preço (R$)</label>
                <input
                    type="number"
                    id="preco"
                    name="preco"
                    value="{{ old('preco') }}"
                    step="0.01"
                    min="0"
                    required
                    class="w-full px-3 py-2 rounded-sm border border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#161615] focus:outline-none focus:border-[#f53003]"
                >
            </div>

            <div>
                <label for="quantidade" class="block text-sm mb-1">Quantidade</label>
                <input
                    type="number"
                    id="quantidade"
                    name="quantidade"
                    value="{{ old('quantidade') }}"
                    min="0"
                    required
                    class="w-full px-3 py-2 rounded-sm border border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#161615] focus:outline-none focus:border-[#f53003]"
                >
            </div>

            <div class="form-actions flex items-center gap-3 mt-2">
                <button
                    type="submit"
                    class="btn px-5 py-1.5 bg-[#1b1b18] dark:bg-[#eeeeec] text-white dark:text-[#1C1C1A] rounded-sm text-sm hover:bg-black dark:hover:bg-white"
                >
                    Salvar
                </button>
                <a href="{{ route('produtos.index') }}" class="muted text-sm text-[#706f6c] dark:text-[#A1A09A] hover:underline">Cancelar</a>
            </div>
        </form>
    </div>
@endsection