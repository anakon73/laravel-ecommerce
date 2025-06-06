<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class Checkout extends Component
{
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $delivery_method = 'pickup';
    public string $payment_method = 'cod';

    public array $items = [];
    public float $total = 0;

    public function mount()
    {
        $this->items = session('cart', []);
        if (empty($this->items)) {
            return redirect()->route('catalog');
        }

        $this->total = collect($this->items)
            ->map(fn($item) => $item['price'] * $item['quantity'])
            ->sum();
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'phone' => 'required|string|min:8',
            'delivery_method' => 'required|in:pickup,post',
            'payment_method' => 'required|in:cod,online',
        ];
    }

    public function placeOrder()
    {
        $this->validate();

        $order = Order::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'delivery_method' => $this->delivery_method,
            'payment_method' => $this->payment_method,
            'total' => $this->total,
        ]);

        foreach ($this->items as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ]);

            Product::where('id', $productId)->decrement('stock', $item['quantity']);
        }

        session()->forget('cart');

        return redirect()->route('order.success', $order->id);
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
