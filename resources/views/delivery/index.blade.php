<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-form action="{{ route('staf.delivery.store') }}" class="grid gap-4 grid-auto-fit-lg">
                        <x-splade-input id="order_number" name="order_number" label="Order`s Number" required />
                        <x-splade-input id="date" type="date" name="date" label="Date" required />
                        <x-splade-select name="inventaris_id" label="Product`s Name">
                            @foreach ($inventaris as $inventaris)
                                <option value="{{$inventaris->id}}">{{$inventaris->name}}</option>
                            @endforeach
                        </x-splade-select>
                        <x-splade-input id="order_total" name="order_total" label="Order`s Total" required />
                        <x-splade-input id="address" name="address" label="Address" required />
                        <x-splade-select name="status" label="Order`s Status">
                            <option value="accepted">Accepted</option>
                            <option value="delivering">Delivering</option>
                            <option value="delivered">Delivered</option>
                        </x-splade-select>
                        <x-splade-submit class="mt-[27px]" label="Store" />
                    </x-splade-form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-table class="mt-4" :for="$delivery" pagination-scroll="preserve">
                        <x-splade-cell actions as="$delivery">
                            <Link modal href="{{ route('staf.delivery.edit', $delivery)}}" class="me-3 px-3 py-2 bg-yellow-500 rounded text-white hover:bg-yellow-300 hover:text-black font-semibold"> Status Edit </Link>
                        </x-splade-cell>
                    </x-splade-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
