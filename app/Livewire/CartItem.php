<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class CartItem extends Component
{
    public array $item;
    public int $productId;

    public function mount($item, $productId)
    {
        $this->item = $item;
        $this->productId = $productId;
    }

    public function updatedItem($value, $key)
    {
        if ($key === 'quantity') {
            $quantity = max(1, (int)$value);
            $product = Product::find($this->productId);

            if (! $product) {
                $this->dispatch('removeItem', $this->productId);
                return;
            }

            if ($quantity > $product->stock) {
                $quantity = $product->stock;
                session()->flash('message', 'Доступна кількість обмежена до ' . $product->stock);
            }

            $this->item['quantity'] = $quantity;
            $this->dispatch('updateCartItem', [
                'productId' => $this->productId,
                'item' => $this->item,
            ]);
        }
    }

    public function remove()
    {
        $this->dispatch('removeItem', $this->productId);
    }

    public function render()
    {
        return view('livewire.cart-item');
    }
}
