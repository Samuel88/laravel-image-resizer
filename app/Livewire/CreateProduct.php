<?php

namespace App\Livewire;

use App\Livewire\Forms\ProductForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public ProductForm $form;

    public function save() {
        $this->form->store();
        session()->flash("status","Prodotto creato correttamente");
        return redirect()->route("products.index");
    }


    public function render()
    {
        return view('livewire.create-product');
    }
}
