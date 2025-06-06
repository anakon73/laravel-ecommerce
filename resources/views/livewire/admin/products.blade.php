    <x-slot name="header">
        <h2 class="text-xl font-semibold">Товари</h2>
    </x-slot>

    <div class="p-4">
        @if (session()->has('message'))
            <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
                {{ session('message') }}
            </div>
        @endif

        <button wire:click="create" class="bg-blue-600 text-white px-4 py-2 rounded mb-4">
            + Додати товар
        </button>

        <div class="mb-4">
            <input type="text" wire:model.live="search" placeholder="Пошук за назвою або артикулом"
                class="w-full border rounded px-3 py-2 mb-4" />
        </div>

        @if ($showForm)
            <div class="mb-4 bg-gray-100 p-4 rounded">
                <form wire:submit.prevent="save">
                    <div>
                        <input type="text" wire:model.defer="name" placeholder="Назва товару" class="w-full mb-2" />
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <input type="text" wire:model.defer="sku" placeholder="Артикул" class="w-full mb-2" />
                        @error('sku')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <input type="number" wire:model.defer="price" placeholder="Ціна" class="w-full mb-2" />
                        @error('price')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <textarea wire:model.defer="description" placeholder="Опис" class="w-full mb-2"></textarea>
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <input type="number" wire:model.defer="stock" placeholder="Кількість на складі"
                            class="w-full mb-2" />
                        @error('stock')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <input type="file" wire:model="image" class="mb-2" />
                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Зберегти</button>
                </form>
            </div>
        @endif

        <table class="w-full border">
            <thead>
                <tr>
                    <th class="text-start">Назва</th>
                    <th class="text-start">Артикул</th>
                    <th class="text-start">Ціна</th>
                    <th class="text-start">Склад</th>
                    <th class="text-start">Зображення</th>
                    <th class="text-start">Дії</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="border-t">
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->sku }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            @if ($product->image_path)
                                <img src="{{ asset('storage/' . $product->image_path) }}" class="h-12">
                            @endif
                        </td>
                        <td>
                            <button wire:click="edit({{ $product->id }})"
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Редагувати</button>
                            <button wire:click="delete({{ $product->id }})"
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-2">Видалити</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->links() }}
    </div>
