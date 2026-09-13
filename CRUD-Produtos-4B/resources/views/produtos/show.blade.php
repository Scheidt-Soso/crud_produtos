@extends('layouts.app')

@section('titulo', $produto->nome)

@section('conteudo')
    <div class="card bg-white dark:bg-[#161615] shadow-[inset_0px_1px_0px_0px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_1px_0px_0px_#fffaed2d] rounded-lg p-6">
        <h1 class="text-lg font-medium mb-4">{{ $produto->nome }}</h1>

        <dl class="flex flex-col gap-2 text-sm">
            <div class="flex justify-between max-w-xs">
                <dt class="text-[#706f6c] dark:text-[#A1A09A]">Preço</dt>
                <dd class="font-medium">R$ {{ number_format($produto->preco, 2, ',', '.') }}</dd>
            </div>
            <div class="flex justify-between max-w-xs">
                <dt class="text-[#706f6c] dark:text-[#A1A09A]">Quantidade</dt>
                <dd class="font-medium">{{ $produto->quantidade }} un</dd>
            </div>
            <div class="flex justify-between max-w-xs">
                <dt class="text-[#706f6c] dark:text-[#A1A09A]">Cadastrado em</dt>
                <dd class="font-medium">{{ $produto->created_at?->format('d/m/Y H:i') ?? '-' }}</dd>
            </div>
        </dl>

        <div class="flex items-center gap-4 mt-6 text-sm">
            <a href="{{ route('produtos.edit', $produto) }}" class="btn px-5 py-1.5 bg-[#1b1b18] dark:bg-[#eeeeec] text-white dark:text-[#1C1C1A] rounded-sm hover:bg-black dark:hover:bg-white">
                Editar
            </a>
            <a href="{{ route('produtos.index') }}" class="muted text-[#706f6c] dark:text-[#A1A09A] hover:underline">Voltar</a>
        </div>
    </div>
@endsection