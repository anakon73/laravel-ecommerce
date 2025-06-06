<div class="flex items-center gap-4 border p-4 rounded">
    <img src="{{ asset('storage/' . $item['image']) }}" class="w-16 h-16 object-cover rounded">
    <div class="flex-1">
        <div class="font-bold">{{ $item['name'] }}</div>
        <div>{{ number_format($item['price'], 2) }} грн</div>
    </div>

    <div>
        <input type="number" min="1" wire:model.lazy="item.quantity" class="w-16 border rounded px-2 py-1">
        @if (session()->has('message'))
            <div class="text-red-500">{{ session('message') }}</div>
        @endif

    </div>

    <button wire:click="remove" class="text-red-600">Видалити</button>
</div>
