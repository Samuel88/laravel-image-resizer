<?php

namespace App\Livewire;

use App\Livewire\Forms\ProductForm;
use App\Models\Product;
use Livewire\Component;

class UpdateProduct extends Component
{
    public ProductForm $form;

    public function mount(Product $product) {
        $this->form->setProduct($product);
    }
    public function save() {
        $this->form->update();
        session()->flash("status","Prodotto aggiornato con successo");
        $this->redirect(route("products.index"));
    }
    public function render()
    {
        return view('livewire.update-product');
    }
}
