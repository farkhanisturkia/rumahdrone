<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventaris Page') }}
        </h2>
    </x-slot>

    @if (Auth::user()->role == 'admin')
        <div class="pt-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <x-splade-form action="{{ route('admin.inventaris.store') }}" class="grid gap-4 grid-auto-fit-md">
                            <x-splade-input id="name" name="name" label="Name" required />
                            <x-splade-submit class="mt-[27px]" label="Store" />
                        </x-splade-form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-table class="mt-4" :for="$inventaries" pagination-scroll="preserve">
                        <x-splade-cell actions as="$inventaries">
                            <Link modal href="{{ route('admin.inventaris.edit', $inventaries) }}" class="me-3 px-3 py-2 bg-yellow-500 rounded text-white hover:bg-yellow-300 hover:text-black font-semibold"> Edit </Link>
                            <x-splade-form 
                                action="{{ route('admin.inventaris.destroy', $inventaries) }}"
                                method="delete"
                                confirm="Hapus Data Data"
                                confirm-text="Apa Kamu Yakin Untuk Menghapus Data?"
                                confirm-button="Ya"
                                cancel-button="Tidak">
                                <x-splade-button class="bg-red-500 rounded text-white hover:bg-red-300 hover:text-black"> Delete </x-splade-button>
                            </x-splade-form>
                        </x-splade-cell>
                    </x-splade-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
