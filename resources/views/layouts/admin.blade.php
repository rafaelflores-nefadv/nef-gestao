<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Painel Administrativo</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-slate-50 text-slate-900">
        <div class="min-h-screen flex flex-col md:flex-row">
            <aside class="w-full md:w-64 bg-slate-900 text-slate-100 md:min-h-screen md:fixed md:left-0 md:top-0 md:bottom-0 border-r border-white/10 shadow-lg shadow-black/20">
                <div class="flex flex-col h-full">
                    <div class="flex items-center justify-between px-6 py-5 border-b border-white/10">
                        <div>
                            <p class="text-lg font-bold tracking-tight text-white">{{ config('app.name') }}</p>
                            <p class="text-xs uppercase tracking-wider text-slate-400">Painel Administrativo</p>
                        </div>
                    </div>
                    <div class="flex-1 overflow-y-auto px-2 py-4">
                        <x-admin-menu
                            :user="Auth::user()"
                            :permissions="Auth::user()->permissions ?? []"
                            :isSuperAdmin="Auth::user()->is_super_admin ?? false"
                            :multiCompany="config('app.multi_company') ?? false"
                        />
                    </div>
                </div>
            </aside>

            <main class="flex-1 md:ml-64">
                <div class="flex flex-col min-h-screen">
                    <div class="w-full border-b border-white/10 bg-white/80 backdrop-blur-sm">
                        <div class="max-w-6xl mx-auto flex items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                            <div>
                                <div class="text-base font-semibold text-slate-700">{{ Auth::user()->name }}</div>
                                <div class="text-sm text-slate-500">{{ Auth::user()->email }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1 bg-slate-50">
                        <div class="max-w-6xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
                            @isset($header)
                                <header class="mb-6 rounded-2xl border border-slate-200 bg-white/80 px-5 py-4 shadow-sm shadow-slate-200">
                                    {{ $header }}
                                </header>
                            @endisset

                            <div class="bg-white/80 rounded-2xl border border-slate-200 p-6 shadow-sm shadow-slate-200">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        @stack('modals')
    </body>
</html>
