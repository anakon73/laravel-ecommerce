<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;

class OrderDetails extends Component
{
    public Order $order;

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function updateStatus(string $status)
    {
        $this->order->update(['status' => $status]);
        session()->flash('message', 'Статус оновлено!');
    }

    public function render()
    {
        return view('livewire.admin.order-details');
    }
}
