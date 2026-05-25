@extends('layouts.farm')

@section('title', 'Daftar Ternak')

@section('content')
    {{-- Page header --}}
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
            <div>
                <p class="inline-flex items-center gap-1.5 text-sm font-medium text-green-700 bg-green-100/80 px-3 py-1 rounded-full mb-3">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Farming Ternak
                </p>
                <h1 class="text-3xl sm:text-4xl font-bold text-green-900 tracking-tight">
                    Daftar Ternak
                </h1>
                <p class="mt-2 text-stone-600 max-w-xl">
                    @auth
                        Kelola inventaris hewan ternak peternakan <span class="font-semibold text-green-800">{{ Auth::user()->name }}</span> — pantau nama, jenis, dan berat setiap ekor.
                    @else
                        Lihat daftar hewan ternak peternakan — login untuk menambah, mengubah, dan menghapus data.
                    @endauth
                </p>
            </div>

            <div class="flex gap-3">
                <div class="flex-1 sm:flex-none bg-white rounded-xl shadow-sm border border-green-100 px-5 py-4 text-center min-w-[120px]">
                    <p class="text-2xl font-bold text-green-800">{{ $livestocks->count() }}</p>
                    <p class="text-xs font-medium text-stone-500 uppercase tracking-wide mt-0.5">Total Ternak</p>
                </div>
                <div class="flex-1 sm:flex-none bg-white rounded-xl shadow-sm border border-amber-100 px-5 py-4 text-center min-w-[120px]">
                    <p class="text-2xl font-bold text-amber-700">{{ $livestocks->sum('weight') }}</p>
                    <p class="text-xs font-medium text-stone-500 uppercase tracking-wide mt-0.5">Total Berat (kg)</p>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-6 flex items-center gap-3 rounded-xl bg-green-50 border border-green-200 px-4 py-3 text-green-800" role="alert">
            <svg class="h-5 w-5 shrink-0 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <p class="text-sm font-medium">{{ session('success') }}</p>
        </div>
    @endif

    {{-- Data table --}}
    <section class="bg-white rounded-2xl shadow-md border border-green-100/80 overflow-hidden mb-8">
        <div class="px-6 py-4 border-b border-green-50 bg-gradient-to-r from-green-50 to-amber-50/50">
            <h2 class="text-lg font-semibold text-green-900 flex items-center gap-2">
                <svg class="h-5 w-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                </svg>
                Data Hewan Ternak
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-green-800 text-white text-sm uppercase tracking-wider">
                        <th class="px-6 py-3.5 font-semibold">Nama</th>
                        <th class="px-6 py-3.5 font-semibold">Jenis</th>
                        <th class="px-6 py-3.5 font-semibold text-right">Berat</th>
                        @auth
                            <th class="px-6 py-3.5 font-semibold text-center">Aksi</th>
                        @endauth
                    </tr>
                </thead>
                <tbody class="divide-y divide-green-50">
                    @forelse($livestocks as $animal)
                        <tr class="hover:bg-green-50/60 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-amber-800">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2c-1.5 2.5-4 3.5-4 7a4 4 0 008 0c0-3.5-2.5-4.5-4-7z"/>
                                        </svg>
                                    </span>
                                    <span class="font-medium text-stone-800 capitalize">{{ $animal->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-sm font-medium text-green-800 capitalize">
                                    {{ $animal->type }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right font-semibold text-stone-700">
                                {{ $animal->weight }} <span class="text-stone-400 font-normal text-sm">kg</span>
                            </td>
                            @auth
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a
                                            href="{{ route('livestocks.edit', $animal) }}"
                                            class="inline-flex items-center gap-1 rounded-lg bg-amber-100 px-3 py-1.5 text-xs font-semibold text-amber-900 hover:bg-amber-200 transition"
                                        >
                                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                            Ubah
                                        </a>
                                        <form
                                            action="{{ route('livestocks.destroy', $animal) }}"
                                            method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data ternak ini?')"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="inline-flex items-center gap-1 rounded-lg bg-red-100 px-3 py-1.5 text-xs font-semibold text-red-700 hover:bg-red-200 transition"
                                            >
                                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            @endauth
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ auth()->check() ? 4 : 3 }}" class="px-6 py-12 text-center">
                                <svg class="mx-auto h-12 w-12 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-2.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                </svg>
                                <p class="mt-3 text-stone-500 font-medium">Belum ada data ternak</p>
                                <p class="text-sm text-stone-400 mt-1">Login dan tambahkan hewan pertama Anda.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    {{-- Add form --}}
    @auth
        <section class="bg-white rounded-2xl shadow-md border border-amber-100/80 overflow-hidden">
            <div class="px-6 py-4 border-b border-amber-50 bg-gradient-to-r from-amber-50 to-green-50/50">
                <h2 class="text-lg font-semibold text-green-900 flex items-center gap-2">
                    <svg class="h-5 w-5 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Tambah Data Ternak
                </h2>
                <p class="text-sm text-stone-500 mt-0.5">Isi formulir di bawah untuk menambah hewan baru ke daftar.</p>
            </div>

            <form action="{{ route('livestocks.store') }}" method="POST" class="p-6">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-stone-700 mb-1.5">Nama Hewan</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Contoh: Sapi, Kambing"
                            required
                            class="w-full rounded-lg border-stone-300 shadow-sm focus:border-green-600 focus:ring-green-600 text-stone-800 placeholder:text-stone-400"
                        >
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="type" class="block text-sm font-medium text-stone-700 mb-1.5">Jenis / Ras</label>
                        <input
                            type="text"
                            id="type"
                            name="type"
                            value="{{ old('type') }}"
                            placeholder="Contoh: Limosin, Peranakan"
                            required
                            class="w-full rounded-lg border-stone-300 shadow-sm focus:border-green-600 focus:ring-green-600 text-stone-800 placeholder:text-stone-400"
                        >
                        @error('type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="weight" class="block text-sm font-medium text-stone-700 mb-1.5">Berat (kg)</label>
                        <input
                            type="number"
                            id="weight"
                            name="weight"
                            value="{{ old('weight') }}"
                            placeholder="Contoh: 300"
                            min="1"
                            required
                            class="w-full rounded-lg border-stone-300 shadow-sm focus:border-green-600 focus:ring-green-600 text-stone-800 placeholder:text-stone-400"
                        >
                        @error('weight')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 rounded-lg bg-green-700 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 transition"
                    >
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Data
                    </button>
                </div>
            </form>
        </section>
    @else
        <section class="bg-white/80 backdrop-blur rounded-2xl border border-green-200 px-6 py-8 text-center">
            <div class="mx-auto max-w-md">
                <span class="inline-flex h-14 w-14 items-center justify-center rounded-full bg-green-100 text-green-700 mb-4">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </span>
                <h3 class="text-lg font-semibold text-green-900">Akses Terbatas</h3>
                <p class="mt-2 text-stone-600 text-sm">
                    Belum punya akun? Daftar terlebih dahulu, lalu masuk untuk menambah dan mengelola data ternak.
                </p>
                <div class="mt-5 flex flex-col sm:flex-row items-center justify-center gap-3">
                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="inline-flex items-center gap-2 rounded-lg bg-amber-500 px-5 py-2.5 text-sm font-semibold text-green-950 hover:bg-amber-400 transition shadow-sm w-full sm:w-auto justify-center"
                        >
                            Daftar Akun
                        </a>
                    @endif
                    <a
                        href="{{ route('login') }}"
                        class="inline-flex items-center gap-2 rounded-lg bg-green-700 px-5 py-2.5 text-sm font-semibold text-white hover:bg-green-800 transition shadow-sm w-full sm:w-auto justify-center"
                    >
                        Masuk
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    @endauth
@endsection
