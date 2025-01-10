<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ShowProducts extends Component
{
    use WithPagination, WithoutUrlPagination;

    public function render()
    {
        $products = Product::paginate(2);
        return view('livewire.show-products', compact('products'));
    }
}
