<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stok Page') }}
        </h2>
    </x-slot>

    @if (Auth::user()->role == 'admin')
        
        <div class="pt-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <x-splade-form action="{{ route('admin.stok.store') }}" class="grid gap-4 grid-auto-fit-md">
                            <x-splade-select name="inventaris_id" label="Inventaris" required>
                                @foreach ($inventaries as $inventaris)
                                    <option value="{{ $inventaris->id }}">{{ $inventaris->name }}</option>
                                @endforeach
                            </x-splade-select>
                            <x-splade-input id="total" name="total" label="Stok Entered" required />
                            <x-splade-input id="min" name="min" label="Minimum Stok" required />
                            <x-splade-submit class="mt-[27px]" label="New Stok" />
                        </x-splade-form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- {{ route('admin.stok.edit', $stok) }} --}}
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($datas as $data)
                        @if ($data->total <= $data->min && $data->total >= 1)
                            <p class="text-yellow-500 font-bold"> !!! Stok of {{$data->inventaris->name }} is minimum !!!</p>
                        @elseif ($data->total <= 0)
                            <p class="text-red-500 font-bold"> !!! Stok of {{$data->inventaris->name }} is gone !!!</p>
                        @endif
                    @endforeach
                    <x-splade-table class="mt-4" :for="$stok" pagination-scroll="preserve">
                        <x-splade-cell actions as="$stok">
                            <Link modal href="{{ route('admin.stok.enter', $stok) }}" class="me-3 px-3 py-2 bg-green-500 rounded text-white hover:bg-green-300 hover:text-black font-semibold"> + stok </Link>
                            <Link modal href="{{ route('admin.stok.release', $stok) }}" class="me-3 px-3 py-2 bg-orange-500 rounded text-white hover:bg-orange-300 hover:text-black font-semibold"> - stok </Link>
                            <Link modal href="{{ route('admin.stok.edit', $stok) }}" class="me-3 px-3 py-2 bg-yellow-500 rounded text-white hover:bg-yellow-300 hover:text-black font-semibold"> Edit </Link>
                            <x-splade-form 
                                action="{{ route('admin.stok.destroy', $stok) }}"
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
