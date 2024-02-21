<x-splade-modal>
    <x-splade-form action="{{ route('admin.inventaris.update', $inventaries) }}" :default="$inventaries" method="put" class="grid gap-4 grid-auto-fit-md">
        <x-splade-input id="name" name="name" label="Name" required />
        <x-splade-submit class="mt-[27px]" label="Update" />
    </x-splade-form>
</x-splade-modal>