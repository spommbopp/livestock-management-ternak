<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Peternakan Ternak') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-stone-800">
    <div class="min-h-screen flex flex-col bg-gradient-to-br from-emerald-50 via-amber-50/40 to-green-100">
        <header class="bg-gradient-to-r from-green-800 to-green-900 shadow-lg">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <a href="{{ route('livestocks.index') }}" class="flex items-center gap-3 group">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/15 ring-1 ring-white/20">
                            <svg class="h-6 w-6 text-amber-200" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2c-1.5 2.5-4 3.5-4 7a4 4 0 008 0c0-3.5-2.5-4.5-4-7zm-6 14c0-2.5 2-4 6-4s6 1.5 6 4v2H6v-2z"/>
                            </svg>
                        </span>
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wider text-green-200/90">Sistem Manajemen</p>
                            <p class="text-lg font-bold text-white">Peternakan Ternak</p>
                        </div>
                    </a>
                    <nav class="flex items-center gap-2">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm font-medium text-green-100 hover:text-white px-3 py-1.5 rounded-lg hover:bg-white/10">Daftar</a>
                        @endif
                        <a href="{{ route('login') }}" class="text-sm font-medium bg-amber-500/90 hover:bg-amber-400 text-green-950 px-4 py-1.5 rounded-lg shadow-sm">Masuk</a>
                    </nav>
                </div>
            </div>
        </header>

        <main class="flex-1 flex items-center justify-center px-4 py-10">
            <div class="w-full max-w-md bg-white rounded-2xl shadow-md border border-green-100/80 p-6 sm:p-8">
                {{ $slot }}
            </div>
        </main>

        <footer class="border-t border-green-200/60 bg-white/40 py-4 text-center text-sm text-stone-600">
            &copy; {{ date('Y') }} Peternakan Ternak
        </footer>
    </div>
</body>
</html>
