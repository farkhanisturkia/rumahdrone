<x-splade-modal>
    <x-splade-form action="{{ route('admin.stok.enterstore', $stok) }}" class="grid gap-4 grid-auto-fit-md">
        <x-splade-input id="in" name="in" label="Entered Stok" required />
        <x-splade-submit class="mt-[27px]" label="Enter" />
    </x-splade-form>
</x-splade-modal>