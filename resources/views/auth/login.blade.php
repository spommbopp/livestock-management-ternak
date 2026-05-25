@extends('layouts.farm-auth')

@section('title', 'Masuk')

@section('heading', 'Masuk ke Akun')

@section('subheading', 'Gunakan email dan kata sandi yang sudah terdaftar.')

@section('banner')
    <div class="rounded-xl border border-amber-200 bg-amber-50 px-4 py-4 text-center">
        <p class="text-sm font-medium text-amber-900">
            Belum punya akun?
        </p>
        <p class="mt-1 text-xs text-amber-800/90">
            Daftar terlebih dahulu untuk bisa menambah dan mengelola data ternak.
        </p>
        <a href="{{ route('register') }}"
           class="mt-3 inline-flex w-full items-center justify-center gap-2 rounded-lg bg-green-700 px-4 py-2.5 text-sm font-semibold text-white hover:bg-green-800 transition shadow-sm">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
            </svg>
            Daftar Akun Baru
        </a>
    </div>
@endsection

@section('content')
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" value="Email" class="text-stone-700" />
            <x-text-input
                id="email"
                class="mt-1.5 block w-full rounded-lg border-stone-300 focus:border-green-600 focus:ring-green-600"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" value="Kata Sandi" class="text-stone-700" />
            <x-text-input
                id="password"
                class="mt-1.5 block w-full rounded-lg border-stone-300 focus:border-green-600 focus:ring-green-600"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-stone-300 text-green-600 shadow-sm focus:ring-green-600"
                    name="remember"
                >
                <span class="ms-2 text-sm text-stone-600">Ingat saya</span>
            </label>
        </div>

        <x-primary-button class="w-full justify-center !bg-green-700 hover:!bg-green-800 focus:!ring-green-600 !normal-case !tracking-normal !text-sm !rounded-lg !py-2.5">
            Masuk
        </x-primary-button>

        @if (Route::has('password.request'))
            <p class="text-center">
                <a href="{{ route('password.request') }}" class="text-sm text-stone-500 hover:text-green-700 transition">
                    Lupa kata sandi?
                </a>
            </p>
        @endif
    </form>
@endsection

@section('footer')
    <p class="text-sm text-stone-600">
        Akun belum terdaftar?
        <a href="{{ route('register') }}" class="font-semibold text-green-700 hover:text-green-900 transition">
            Daftar di sini →
        </a>
    </p>
@endsection
