<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchProducts extends Component
{
    public string $query = '';

    public function render()
    {
        $products = Product::query()
            ->when(
                $this->query !== '',
                fn($q) =>
                $q->where(
                    fn($q) =>
                    $q->where('name', 'like', "%{$this->query}%")
                        ->orWhere('sku', 'like', "%{$this->query}%")
                )
            )
            ->paginate(10);

        return view('livewire.search-products', compact('products'));
    }
}
