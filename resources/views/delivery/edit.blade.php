<x-splade-modal>
    <x-splade-form action="{{ route('staf.delivery.update', $delivery) }}" :default="$delivery" method="put" class="grid gap-4 grid-auto-fit-md">
        <x-splade-select name="status" label="Order`s Status">
            <option value="accepted">Accepted</option>
            <option value="delivering">Delivering</option>
            <option value="delivered">Delivered</option>
        </x-splade-select>
        <x-splade-submit class="mt-[27px]" label="Update" />
    </x-splade-form>
</x-splade-modal>