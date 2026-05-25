<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-xl font-bold text-green-900">Lupa Kata Sandi</h1>
        <p class="mt-2 text-sm text-stone-500">
            Masukkan email Anda. Kami akan mengirimkan link untuk reset kata sandi.
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
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
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center !bg-green-700 hover:!bg-green-800 focus:!ring-green-600 !normal-case !tracking-normal !text-sm !rounded-lg !py-2.5">
            Kirim Link Reset
        </x-primary-button>

        <p class="text-center text-sm text-stone-600">
            <a href="{{ route('login') }}" class="font-medium text-green-700 hover:text-green-900">← Kembali ke halaman masuk</a>
        </p>
    </form>
</x-guest-layout>
