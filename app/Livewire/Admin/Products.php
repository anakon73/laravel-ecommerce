<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Products extends Component
{
    use WithPagination, WithFileUploads;


    public $search = '';
    public $name, $price, $description, $stock, $image, $sku;
    public $productId = null;
    public $showForm = false;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
            'sku' => 'required|string|max:255|unique:products,sku',
        ];
    }

    public function render()
    {

        $products = Product::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', "%{$this->search}%")
                    ->orWhere('sku', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.products', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        $this->reset(['name', 'price', 'description', 'stock', 'image', 'productId', 'sku']);
        $this->showForm = true;
    }

    public function edit(Product $product)
    {
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->stock = $product->stock;
        $this->sku = $product->sku;
        $this->showForm = true;
    }

    public function store()
    {
        $validated = $this->validate();

        $data = [
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'stock' => $this->stock,
            'sku' => $this->sku,
        ];

        if ($this->image) {
            $data['image_path'] = $this->image->store('products', 'public');
        }

        Product::create($data);

        $this->reset(['showForm', 'name', 'price', 'description', 'stock', 'image']);
        session()->flash('message', 'Продукт створено!');
        $this->resetPage();
    }

    public function update()
    {
        $validated = $this->validate();

        $product = Product::findOrFail($this->productId);

        $data = [
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'stock' => $this->stock,
            'sku' => $this->sku,
        ];

        if ($this->image) {
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }

            $data['image_path'] = $this->image->store('products', 'public');
        }

        $product->update($data);

        $this->reset(['showForm', 'name', 'price', 'description', 'stock', 'image', 'productId']);
        session()->flash('message', 'Продукт оновлено!');
        $this->resetPage();
    }

    public function save()
    {
        $this->productId ? $this->update() : $this->store();
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }

        $product->delete();

        session()->flash('message', 'Продукт видалено!');
        $this->resetPage();
    }
}
