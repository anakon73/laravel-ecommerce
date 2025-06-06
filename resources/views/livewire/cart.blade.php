<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Кошик</h2>

    @if (empty($items))
        <p>Кошик порожній.</p>
    @else
        <div class="space-y-4">
            @foreach ($items as $id => $item)
                <livewire:cart-item :item="$item" :productId="$id" :key="$id" />
            @endforeach
        </div>

        <div class="mt-6 text-xl">
            Загальна сума: <strong>{{ number_format($this->total, 2) }} грн</strong>
        </div>

        <div class="mt-4">
            <a href="{{ route('checkout') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Оформити
                замовлення</a>
        </div>
    @endif
</div>
