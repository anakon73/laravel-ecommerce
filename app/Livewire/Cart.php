<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Cart extends Component
{
    public array $items = [];

    public function mount()
    {
        $this->items = session()->get('cart', []);
    }

    protected $listeners = ['updateCartItem', 'removeItem'];

    public function updateCartItem($data)
    {
        $this->items[$data['productId']] = $data['item'];
        session()->put('cart', $this->items);
    }

    public function removeItem($productId)
    {
        unset($this->items[$productId]);
        session()->put('cart', $this->items);
    }

    public function getTotalProperty()
    {
        return collect($this->items)->sum(fn($item) => $item['price'] * $item['quantity']);
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
