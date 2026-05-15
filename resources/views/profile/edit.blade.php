@extends('layouts.farm')

@section('title', 'Profil')

@section('content')
    <div class="mb-8">
        <p class="inline-flex items-center gap-1.5 text-sm font-medium text-green-700 bg-green-100/80 px-3 py-1 rounded-full mb-3">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            Farming Ternak
        </p>
        <h1 class="text-3xl sm:text-4xl font-bold text-green-900 tracking-tight">
            Profil Akun
        </h1>
        <p class="mt-2 text-stone-600 max-w-xl">
            Kelola informasi akun dan keamanan login peternakan
            <span class="font-semibold text-green-800">{{ Auth::user()->name }}</span>.
        </p>
    </div>

    <div class="space-y-6 max-w-3xl">
        <section class="bg-white rounded-2xl shadow-md border border-green-100/80 overflow-hidden">
            <div class="px-6 py-4 border-b border-green-50 bg-gradient-to-r from-green-50 to-amber-50/50">
                <h2 class="text-lg font-semibold text-green-900 flex items-center gap-2">
                    <svg class="h-5 w-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Informasi Profil
                </h2>
            </div>
            <div class="p-6">
                @include('profile.partials.update-profile-information-form')
            </div>
        </section>

        <section class="bg-white rounded-2xl shadow-md border border-amber-100/80 overflow-hidden">
            <div class="px-6 py-4 border-b border-amber-50 bg-gradient-to-r from-amber-50 to-green-50/50">
                <h2 class="text-lg font-semibold text-green-900 flex items-center gap-2">
                    <svg class="h-5 w-5 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    Ubah Kata Sandi
                </h2>
            </div>
            <div class="p-6">
                @include('profile.partials.update-password-form')
            </div>
        </section>

        <section class="bg-white rounded-2xl shadow-md border border-red-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-red-50 bg-gradient-to-r from-red-50 to-stone-50">
                <h2 class="text-lg font-semibold text-red-900 flex items-center gap-2">
                    <svg class="h-5 w-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Hapus Akun
                </h2>
            </div>
            <div class="p-6">
                @include('profile.partials.delete-user-form')
            </div>
        </section>
    </div>
@endsection
