<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Замовлення</h2>

    <select wire:change="updateStatus" wire:model="status" class="mb-4 border p-2 rounded">
        <option value="">Усі</option>
        <option value="new">Нові</option>
        <option value="processing">В обробці</option>
        <option value="completed">Завершені</option>
    </select>

    <div class="mb-4">
        <input type="text" wire:model.live="search" placeholder="Пошук за ім’ям, email або номером телефону"
            class="w-full border rounded px-3 py-2 mb-4" />
    </div>

    @if ($orders->isEmpty())
        <div class="text-center text-gray-500">
            <p>Замовлень не знайдено</p>
        </div>
    @else
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="text-start">ID</th>
                    <th class="text-start">Ім’я</th>
                    <th class="text-start">Статус</th>
                    <th class="text-start">Сума</th>
                    <th class="text-start">Дата</th>
                    <th class="text-start"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="border-t">
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ number_format($order->total, 2) }} грн</td>
                        <td>{{ $order->created_at->format('d.m.Y') }}</td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="text-blue-600">Деталі</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>
