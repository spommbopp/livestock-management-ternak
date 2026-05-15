<section>
    <p class="text-sm text-stone-500 mb-6">
        Gunakan kata sandi yang kuat dan unik untuk menjaga keamanan akun Anda.
    </p>

    <form method="post" action="{{ route('password.update') }}" class="space-y-5">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" value="Kata Sandi Saat Ini" class="text-stone-700" />
            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-1.5 block w-full rounded-lg border-stone-300 focus:border-green-600 focus:ring-green-600"
                autocomplete="current-password"
            />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" value="Kata Sandi Baru" class="text-stone-700" />
            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-1.5 block w-full rounded-lg border-stone-300 focus:border-green-600 focus:ring-green-600"
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" value="Konfirmasi Kata Sandi" class="text-stone-700" />
            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-1.5 block w-full rounded-lg border-stone-300 focus:border-green-600 focus:ring-green-600"
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 pt-2">
            <x-primary-button class="!bg-green-700 hover:!bg-green-800 focus:!ring-green-600 !normal-case !tracking-normal !text-sm !rounded-lg !px-5 !py-2.5">
                Simpan
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-medium text-green-700"
                >Tersimpan.</p>
            @endif
        </div>
    </form>
</section>
