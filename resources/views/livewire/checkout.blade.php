<div class="max-w-xl mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Оформлення замовлення</h2>

    <form wire:submit.prevent="placeOrder" class="space-y-4">
        <input type="text" wire:model.defer="name" placeholder="Ім’я" class="w-full border p-2 rounded" />
        @error('name')
            <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror

        <input type="email" wire:model.defer="email" placeholder="Email" class="w-full border p-2 rounded" />
        @error('email')
            <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror

        <input type="text" wire:model.defer="phone" placeholder="Телефон" class="w-full border p-2 rounded" />
        @error('phone')
            <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror

        <div>
            <label class="block font-medium mb-1">Спосіб доставки:</label>
            <select wire:model.defer="delivery_method" class="w-full border p-2 rounded">
                <option value="pickup">Самовивіз</option>
                <option value="post">Надіслати поштою</option>
            </select>
        </div>

        <div>
            <label class="block font-medium mb-1">Оплата:</label>
            <select wire:model.defer="payment_method" class="w-full border p-2 rounded">
                <option value="cod">Накладений платіж</option>
                <option value="online">Онлайн оплата</option>
            </select>
        </div>

        <div class="text-lg font-semibold mt-4">
            Сума до оплати: {{ number_format($total, 2) }} грн
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
            Оформити замовлення
        </button>
    </form>
</div>
