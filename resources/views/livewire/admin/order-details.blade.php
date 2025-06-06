<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Замовлення №{{ $order->id }}</h2>

    <p><strong>Ім’я:</strong> {{ $order->name }}</p>
    <p><strong>Email:</strong> {{ $order->email }}</p>
    <p><strong>Телефон:</strong> {{ $order->phone }}</p>
    <p><strong>Доставка:</strong> {{ $order->delivery_method }}</p>
    <p><strong>Оплата:</strong> {{ $order->payment_method }}</p>
    <p><strong>Сума:</strong> {{ number_format($order->total, 2) }} грн</p>

    <div class="my-4">
        <strong>Статус:</strong> {{ $order->status }}
        <div class="mt-2">
            <select wire:model="order.status" wire:change="updateStatus($event.target.value)" class="border p-2 rounded">
                <option value="new">Новий</option>
                <option value="processing">Обробляється</option>
                <option value="completed">Завершено</option>
            </select>
        </div>
        @if (session()->has('message'))
            <div class="text-green-600 mt-2">{{ session('message') }}</div>
        @endif
    </div>

    <h3 class="text-lg font-semibold mt-6">Товари</h3>
    <ul class="list-disc pl-6">
        @foreach ($order->items as $item)
            <li>{{ $item->name }} × {{ $item->quantity }} — {{ number_format($item->price, 2) }} грн</li>
        @endforeach
    </ul>
</div>
