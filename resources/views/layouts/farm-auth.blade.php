<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Autentikasi') — Peternakan Ternak</title>

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
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/15 ring-1 ring-white/20 group-hover:bg-white/25 transition">
                            <svg class="h-6 w-6 text-amber-200" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12 2c-1.5 2.5-4 3.5-4 7a4 4 0 008 0c0-3.5-2.5-4.5-4-7zm-6 14c0-2.5 2-4 6-4s6 1.5 6 4v2H6v-2z"/>
                            </svg>
                        </span>
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wider text-green-200/90">Sistem Manajemen</p>
                            <p class="text-lg font-bold text-white leading-tight">Peternakan Ternak</p>
                        </div>
                    </a>

                    <nav class="flex items-center gap-1 sm:gap-2">
                        <a href="{{ route('livestocks.index') }}"
                           class="hidden sm:inline text-sm font-medium text-green-100 hover:text-white px-3 py-1.5 rounded-lg hover:bg-white/10 transition">
                            Beranda
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="text-sm font-medium px-3 py-1.5 rounded-lg transition {{ request()->routeIs('register') ? 'bg-white/20 text-white' : 'text-green-100 hover:text-white hover:bg-white/10' }}">
                                Daftar
                            </a>
                        @endif
                        <a href="{{ route('login') }}"
                           class="text-sm font-medium px-4 py-1.5 rounded-lg transition shadow-sm {{ request()->routeIs('login') ? 'bg-white/20 text-white' : 'bg-amber-500/90 hover:bg-amber-400 text-green-950' }}">
                            Masuk
                        </a>
                    </nav>
                </div>
            </div>
        </header>

        <main class="flex-1 flex items-center justify-center px-4 py-10 sm:py-14">
            <div class="w-full max-w-md">
                <div class="text-center mb-6">
                    <p class="inline-flex items-center gap-1.5 text-sm font-medium text-green-700 bg-green-100/80 px-3 py-1 rounded-full mb-3">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Farming Ternak
                    </p>
                    <h1 class="text-2xl sm:text-3xl font-bold text-green-900">@yield('heading')</h1>
                    @hasSection('subheading')
                        <p class="mt-2 text-sm text-stone-600">@yield('subheading')</p>
                    @endif
                </div>

                @hasSection('banner')
                    <div class="mb-5">@yield('banner')</div>
                @endif

                <div class="bg-white rounded-2xl shadow-md border border-green-100/80 p-6 sm:p-8">
                    @yield('content')
                </div>

                @hasSection('footer')
                    <div class="mt-5 text-center">@yield('footer')</div>
                @endif
            </div>
        </main>

        <footer class="mt-auto border-t border-green-200/60 bg-white/40 backdrop-blur-sm">
            <div class="max-w-6xl mx-auto px-4 py-4 text-center text-sm text-stone-600">
                &copy; {{ date('Y') }} Peternakan Ternak — Kelola data hewan ternak Anda dengan mudah.
            </div>
        </footer>
    </div>
</body>
</html>
