@extends('layouts.farm')

@section('title', 'Ubah Data Ternak')

@section('content')
    <div class="mb-8">
        <a href="{{ route('livestocks.index') }}" class="inline-flex items-center gap-1 text-sm font-medium text-green-700 hover:text-green-900 mb-4 transition">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali ke Daftar Ternak
        </a>
        <h1 class="text-3xl font-bold text-green-900 tracking-tight">Ubah Data Ternak</h1>
        <p class="mt-2 text-stone-600">Perbarui informasi hewan ternak yang dipilih.</p>
    </div>

    <section class="bg-white rounded-2xl shadow-md border border-green-100/80 overflow-hidden max-w-2xl">
        <div class="px-6 py-4 border-b border-green-50 bg-gradient-to-r from-green-50 to-amber-50/50">
            <h2 class="text-lg font-semibold text-green-900 capitalize">{{ $livestock->name }}</h2>
        </div>

        <form action="{{ route('livestocks.update', $livestock) }}" method="POST" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-stone-700 mb-1.5">Nama Hewan</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $livestock->name) }}"
                    required
                    class="w-full rounded-lg border-stone-300 shadow-sm focus:border-green-600 focus:ring-green-600"
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
                    value="{{ old('type', $livestock->type) }}"
                    required
                    class="w-full rounded-lg border-stone-300 shadow-sm focus:border-green-600 focus:ring-green-600"
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
                    value="{{ old('weight', $livestock->weight) }}"
                    min="1"
                    required
                    class="w-full rounded-lg border-stone-300 shadow-sm focus:border-green-600 focus:ring-green-600"
                >
                @error('weight')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-wrap gap-3 pt-2">
                <button
                    type="submit"
                    class="inline-flex items-center gap-2 rounded-lg bg-green-700 px-6 py-2.5 text-sm font-semibold text-white hover:bg-green-800 transition"
                >
                    Simpan Perubahan
                </button>
                <a
                    href="{{ route('livestocks.index') }}"
                    class="inline-flex items-center rounded-lg border border-stone-300 px-6 py-2.5 text-sm font-medium text-stone-700 hover:bg-stone-50 transition"
                >
                    Batal
                </a>
            </div>
        </form>
    </section>
@endsection
