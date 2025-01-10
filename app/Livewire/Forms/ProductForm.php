<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Livewire\Attributes\Validate;
use Livewire\Form;


class ProductForm extends Form
{
    public ?Product $product;

    #[Validate('required')]
    public ?string $name;

    #[Validate('required|decimal:2')]
    public ?string $price;

    #[Validate('required|image')]
    public ?UploadedFile $image = null;

    public function setProduct(Product $product): void {
        $this->product = $product;
        $this->name = $product->name;
        $this->price = $product->price;
    }

    public function store() {
        $this->validate();
        $product = Product::create($this->pull(['name', 'price']));

        // https://github.com/livewire/livewire/discussions/2479
        $product
            ->addMedia($this->image)
            ->toMediaCollection('image');

    }

    public function update() {
        $this->validate();
        $this->product->update($this->pull());
    }
}
