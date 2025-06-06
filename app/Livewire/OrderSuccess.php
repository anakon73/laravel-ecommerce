<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderSuccess extends Component
{
  public Order $order;

  public function mount($order)
  {
    $this->order = $order;
  }

  public function render()
  {
    return view('livewire.order-success');
  }
}
