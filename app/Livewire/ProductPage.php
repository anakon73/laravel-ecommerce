<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductPage extends Component
{
    public Product $product;
    public int $quantity = 1;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function addToCart()
    {
        $cart = session()->get('cart', []);

        $cart[$this->product->id] = [
            'product_id' => $this->product->id,
            'name' => $this->product->name,
            'price' => $this->product->price,
            'quantity' => $this->quantity,
            'image' => $this->product->image_path,
        ];

        session()->put('cart', $cart);
        session()->flash('message', 'Товар додано в кошик!');
    }

    public function render()
    {
        return view('livewire.product-page');
    }
}
