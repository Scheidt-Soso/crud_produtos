<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('titulo', 'Produtos') - {{ config('app.name', 'Laravel') }}</title>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                body{background:#FDFDFC;color:#1b1b18;padding:1.5rem;min-height:100vh;font-family:ui-sans-serif,system-ui,sans-serif}
                header,main{max-width:56rem;margin:0 auto}
                header{margin-bottom:1.5rem;font-size:.875rem}
                nav{display:flex;align-items:center;justify-content:space-between;gap:1rem}
                .btn{display:inline-block;padding:.375rem 1.25rem;background:#1b1b18;color:#fff;border-radius:.25rem;text-decoration:none}
                .card{background:#fff;border-radius:.5rem;padding:1.5rem;box-shadow:inset 0 1px 0 0 rgba(26,26,0,.16)}
                .card h1{font-size:1.125rem;margin:0 0 1rem}
                .row{display:flex;align-items:center;justify-content:space-between;gap:1rem;padding:.75rem 0;border-bottom:1px solid #e3e3e0}
                .row:last-child{border-bottom:0}
                label{display:block;font-size:.875rem;margin-bottom:.25rem}
                input{width:100%;padding:.5rem .75rem;border:1px solid #e3e3e0;border-radius:.25rem;background:#fff}
                form{display:flex;flex-direction:column;gap:1rem;max-width:28rem}
                .form-actions{display:flex;align-items:center;gap:.75rem;margin-top:.5rem}
                .muted{color:#706f6c}
                a{color:inherit}
                .flash{padding:.75rem 1rem;border:1px solid rgba(34,197,94,.3);background:rgba(34,197,94,.1);border-radius:.25rem;margin-bottom:1.5rem}
            </style>
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] min-h-screen p-6 lg:p-8">
        <header class="w-full lg:max-w-4xl max-w-[335px] mx-auto text-sm mb-6">
            <nav class="flex items-center justify-between gap-4">
                <a
                    href="{{ route('produtos.index') }}"
                    class="inline-flex items-center gap-2 font-medium text-[#1b1b18] dark:text-[#EDEDEC]"
                >
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    Produtos
                </a>
                <a
                    href="{{ route('produtos.create') }}"
                    class="btn inline-block px-5 py-1.5 bg-[#1b1b18] dark:bg-[#eeeeec] text-white dark:text-[#1C1C1A] rounded-sm text-sm leading-normal hover:bg-black dark:hover:bg-white"
                >
                    + Novo Produto
                </a>
            </nav>
        </header>

        <main class="w-full lg:max-w-4xl max-w-[335px] mx-auto">
            @if (session('sucesso'))
                <div class="flash mb-6 px-4 py-3 rounded-sm bg-[#22c55e]/10 border border-[#22c55e]/30 text=[#1b1b18]">
                    {{ session('sucesso') }}
                </div>
            @endif

            @yield('conteudo')
        </main>
    </body>
</html>