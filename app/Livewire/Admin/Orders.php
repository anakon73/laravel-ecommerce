<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;

    public string $status = '';
    public string $search = '';

    public function updateStatus()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Order::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%")
                    ->orWhere('phone', 'like', "%{$this->search}%");
            })
            ->latest();

        if ($this->status !== '') {
            $query->where('status', $this->status);
        }

        return view('livewire.admin.orders', [
            'orders' => $query->paginate(10),
        ]);
    }
}
