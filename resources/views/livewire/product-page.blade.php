<div class="container mx-auto p-4">
    <div class="grid md:grid-cols-2 gap-8">
        <div>
            @if ($product->image_path)
                <img src="{{ asset('storage/' . $product->image_path) }}" class="w-full h-auto object-cover rounded">
            @endif
        </div>

        <div>
            <h2 class="text-2xl font-bold mb-2">{{ $product->name }}</h2>
            <p class="text-xl text-gray-700 mb-4">{{ number_format($product->price, 2) }} грн</p>
            <p class="mb-6">{{ $product->description }}</p>

            <div class="flex items-center gap-4 mb-4">
                <label for="quantity">Кількість:</label>
                <input type="number" min="1" wire:model="quantity" class="border rounded px-2 py-1 w-20">
            </div>

            <button wire:click="addToCart" class="bg-green-600 text-white px-4 py-2 rounded">
                Додати в кошик
            </button>

            @if (session()->has('message'))
                <div class="mt-4 text-green-700">{{ session('message') }}</div>
            @endif
        </div>
    </div>
</div>
