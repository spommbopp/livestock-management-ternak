@extends('layouts.farm-auth')

@section('title', 'Daftar')

@section('heading', 'Daftar Akun Baru')

@section('subheading', 'Buat akun untuk mulai mengelola data ternak peternakan Anda.')

@section('banner')
    <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-center">
        <p class="text-sm text-green-800">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-semibold text-green-700 hover:text-green-900 underline-offset-2 hover:underline">
                Masuk di sini
            </a>
        </p>
    </div>
@endsection

@section('content')
    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="name" value="Nama Lengkap" class="text-stone-700" />
            <x-text-input
                id="name"
                class="mt-1.5 block w-full rounded-lg border-stone-300 focus:border-green-600 focus:ring-green-600"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
                placeholder="Contoh: Muhammad Rasya"
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" value="Email" class="text-stone-700" />
            <x-text-input
                id="email"
                class="mt-1.5 block w-full rounded-lg border-stone-300 focus:border-green-600 focus:ring-green-600"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
                placeholder="email@contoh.com"
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
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" value="Konfirmasi Kata Sandi" class="text-stone-700" />
            <x-text-input
                id="password_confirmation"
                class="mt-1.5 block w-full rounded-lg border-stone-300 focus:border-green-600 focus:ring-green-600"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center !bg-green-700 hover:!bg-green-800 focus:!ring-green-600 !normal-case !tracking-normal !text-sm !rounded-lg !py-2.5">
            Daftar Sekarang
        </x-primary-button>
    </form>
@endsection

@section('footer')
    <p class="text-sm text-stone-600">
        Sudah terdaftar?
        <a href="{{ route('login') }}" class="font-semibold text-green-700 hover:text-green-900 transition">
            Masuk ke akun →
        </a>
    </p>
@endsection
