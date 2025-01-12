<?php

namespace App\Livewire;

use App\Livewire\Forms\ProductForm;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UpdateProduct extends Component
{
    use WithFileUploads;

    public ProductForm $form;

    public function mount(Product $product) {
        $this->form->setProduct($product);
    }

    public function removeProductImage(Media $media) {
        $media->delete();
        $this->form->getProductImages();
        //dd($this->form->product->getMedia('images')->all());
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
