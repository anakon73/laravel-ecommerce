<div class="max-w-4xl mx-auto p-4">
    <input type="text" wire:model.live="query" placeholder="Пошук за назвою або артикулом"
        class="w-full border rounded px-3 py-2 mb-4" />

    @if ($products->isEmpty())
        <p class="text-gray-500">Нічого не знайдено.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($products as $product)
                <div class="border rounded p-4">
                    <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                    <p class="text-sm text-gray-600">Артикул: {{ $product->sku }}</p>
                    <p class="text-sm mt-2">{{ Str::limit($product->description, 100) }}</p>
                    <p class="mt-2 font-bold">₴ {{ number_format($product->price, 2) }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $products->links() }}
        </div>
    @endif
</div>
