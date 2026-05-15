@extends('layouts.farm')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8">
        <p class="inline-flex items-center gap-1.5 text-sm font-medium text-green-700 bg-green-100/80 px-3 py-1 rounded-full mb-3">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            Farming Ternak
        </p>
        <h1 class="text-3xl sm:text-4xl font-bold text-green-900 tracking-tight">
            Dashboard
        </h1>
        <p class="mt-2 text-stone-600 max-w-xl">
            Selamat datang, <span class="font-semibold text-green-800">{{ Auth::user()->name }}</span>!
            Pantau ringkasan peternakan Anda dari sini.
        </p>
    </div>

    {{-- Stat cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-green-100 px-6 py-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-stone-500 uppercase tracking-wide">Total Ternak</p>
                    <p class="mt-1 text-3xl font-bold text-green-800">{{ $livestocks->count() }}</p>
                </div>
                <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-700">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2c-1.5 2.5-4 3.5-4 7a4 4 0 008 0c0-3.5-2.5-4.5-4-7z"/>
                    </svg>
                </span>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-amber-100 px-6 py-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-stone-500 uppercase tracking-wide">Total Berat</p>
                    <p class="mt-1 text-3xl font-bold text-amber-700">{{ $livestocks->sum('weight') }} <span class="text-lg font-semibold text-stone-400">kg</span></p>
                </div>
                <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 text-amber-700">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                    </svg>
                </span>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-stone-200 px-6 py-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-stone-500 uppercase tracking-wide">Jenis Unik</p>
                    <p class="mt-1 text-3xl font-bold text-stone-700">{{ $livestocks->pluck('type')->unique()->count() }}</p>
                </div>
                <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-stone-100 text-stone-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </span>
            </div>
        </div>
    </div>

    {{-- Quick actions --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <a href="{{ route('livestocks.index') }}"
           class="group bg-white rounded-2xl shadow-md border border-green-100 p-6 hover:border-green-300 hover:shadow-lg transition">
            <div class="flex items-start gap-4">
                <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-green-700 text-white group-hover:bg-green-800 transition">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                    </svg>
                </span>
                <div class="flex-1">
                    <h2 class="text-lg font-semibold text-green-900 group-hover:text-green-700 transition">Kelola Daftar Ternak</h2>
                    <p class="mt-1 text-sm text-stone-500">Lihat, tambah, dan kelola data hewan ternak peternakan.</p>
                    <span class="mt-3 inline-flex items-center gap-1 text-sm font-medium text-green-700">
                        Buka halaman
                        <svg class="h-4 w-4 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </span>
                </div>
            </div>
        </a>

        <a href="{{ route('profile.edit') }}"
           class="group bg-white rounded-2xl shadow-md border border-amber-100 p-6 hover:border-amber-300 hover:shadow-lg transition">
            <div class="flex items-start gap-4">
                <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-amber-600 text-white group-hover:bg-amber-700 transition">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </span>
                <div class="flex-1">
                    <h2 class="text-lg font-semibold text-green-900 group-hover:text-green-700 transition">Pengaturan Profil</h2>
                    <p class="mt-1 text-sm text-stone-500">Perbarui nama, email, dan kata sandi akun Anda.</p>
                    <span class="mt-3 inline-flex items-center gap-1 text-sm font-medium text-amber-700">
                        Edit profil
                        <svg class="h-4 w-4 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </span>
                </div>
            </div>
        </a>
    </div>

    {{-- Recent livestock --}}
    <section class="bg-white rounded-2xl shadow-md border border-green-100/80 overflow-hidden">
        <div class="px-6 py-4 border-b border-green-50 bg-gradient-to-r from-green-50 to-amber-50/50 flex items-center justify-between">
            <h2 class="text-lg font-semibold text-green-900">Ternak Terbaru</h2>
            <a href="{{ route('livestocks.index') }}" class="text-sm font-medium text-green-700 hover:text-green-900 transition">
                Lihat semua →
            </a>
        </div>

        @if ($livestocks->isNotEmpty())
            <ul class="divide-y divide-green-50">
                @foreach ($livestocks->take(5) as $animal)
                    <li class="flex items-center justify-between px-6 py-4 hover:bg-green-50/60 transition-colors">
                        <div class="flex items-center gap-3">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-amber-800">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2c-1.5 2.5-4 3.5-4 7a4 4 0 008 0c0-3.5-2.5-4.5-4-7z"/>
                                </svg>
                            </span>
                            <div>
                                <p class="font-medium text-stone-800 capitalize">{{ $animal->name }}</p>
                                <p class="text-sm text-stone-500 capitalize">{{ $animal->type }}</p>
                            </div>
                        </div>
                        <span class="text-sm font-semibold text-stone-600">{{ $animal->weight }} kg</span>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="px-6 py-12 text-center">
                <svg class="mx-auto h-12 w-12 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-2.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                </svg>
                <p class="mt-3 text-stone-500 font-medium">Belum ada data ternak</p>
                <a href="{{ route('livestocks.index') }}" class="mt-4 inline-flex items-center gap-2 rounded-lg bg-green-700 px-5 py-2 text-sm font-semibold text-white hover:bg-green-800 transition">
                    Tambah Ternak Pertama
                </a>
            </div>
        @endif
    </section>
@endsection
