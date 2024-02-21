<x-splade-modal>
    <x-splade-form action="{{ route('admin.stok.releasestore', $stok) }}" class="grid gap-4 grid-auto-fit-md">
        <x-splade-input id="out" name="out" label="Released Stok" required />
        <x-splade-submit class="mt-[27px]" label="Enter" />
    </x-splade-form>
</x-splade-modal>