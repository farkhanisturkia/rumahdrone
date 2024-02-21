<x-splade-modal>
    <x-splade-form action="{{ route('admin.stok.update', $stok) }}" :default="$stok" method="put" class="grid gap-4 grid-auto-fit-md">
        <x-splade-select name="inventaris_id" label="Inventaris" required>
            @foreach ($inventaries as $inventaris)
                <option value="{{ $inventaris->id }}">{{ $inventaris->name }}</option>
            @endforeach
        </x-splade-select>
        <x-splade-input id="total" name="total" label="Stok Entered" required />
        <x-splade-input id="min" name="min" label="Minimum Stok" required />
        <x-splade-submit class="mt-[27px]" label="New Stok" />
    </x-splade-form>
</x-splade-modal>