    <div class="container mx-auto p-4">
        <div class="mb-4 flex gap-4">
            <button wire:click="sortBy('name')" class="px-2 py-1 border rounded">Сортувати по назві</button>
            <button wire:click="sortBy('price')" class="px-2 py-1 border rounded">Сортувати по ціні</button>
            <button wire:click="sortBy('stock')" class="px-2 py-1 border rounded">Сортувати по наявності</button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="border rounded p-4">
                    @if ($product->image_path)
                        <img src="{{ asset('storage/' . $product->image_path) }}"
                            class="h-48 object-cover w-full mb-2" />
                    @endif
                    <h3 class="font-bold">{{ $product->name }}</h3>
                    <p class="text-gray-700">{{ number_format($product->price, 2) }} грн</p>
                    <a href="{{ route('product.show', $product->id) }}"
                        class="text-blue-600 hover:underline">Детальніше</a>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
