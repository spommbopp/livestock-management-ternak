<section class="space-y-4">
    <p class="text-sm text-stone-500">
        Setelah akun dihapus, semua data dan sumber daya akan dihapus permanen. Pastikan Anda telah menyimpan data penting sebelum melanjutkan.
    </p>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="!bg-red-600 hover:!bg-red-700 focus:!ring-red-500 !normal-case !tracking-normal !text-sm !rounded-lg !px-5 !py-2.5"
    >
        Hapus Akun
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-semibold text-red-900">
                Yakin ingin menghapus akun?
            </h2>

            <p class="mt-2 text-sm text-stone-500">
                Setelah akun dihapus, semua data akan dihapus permanen. Masukkan kata sandi untuk konfirmasi.
            </p>

            <div class="mt-5">
                <x-input-label for="password" value="Kata Sandi" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full sm:w-3/4 rounded-lg border-stone-300 focus:border-red-500 focus:ring-red-500"
                    placeholder="Kata sandi"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex flex-wrap justify-end gap-3">
                <x-secondary-button
                    type="button"
                    x-on:click="$dispatch('close-modal', 'confirm-user-deletion')"
                    class="!border-stone-300 !text-stone-700 hover:!bg-stone-50 !normal-case !tracking-normal !text-sm !rounded-lg"
                >
                    Batal
                </x-secondary-button>

                <x-danger-button class="!bg-red-600 hover:!bg-red-700 !normal-case !tracking-normal !text-sm !rounded-lg">
                    Hapus Akun
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
