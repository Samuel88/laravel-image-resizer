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

    #[Validate([
        'images_tmp' => 'required',
        'images_tmp.*' => 'image'
    ])]
    public array $images_tmp = [];

    public array $images = [];

    public function setProduct(Product $product): void {
        $this->product = $product;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->images = $product->getMedia('images')->all();
    }

    public function store() {
        $this->validate();
        $product = Product::create($this->pull(['name', 'price']));
        foreach ($this->images_tmp as $image) {
            $product
                ->addMedia($image)
                ->toMediaCollection('images');
        }
        /*
        // https://rappasoft.com/blog/creating-a-filepond-component-using-blade-livewire-alpinejs-then-validating-storing-with-spatie-media-library
        collect($this->images)->each(fn($image) =>
            $post->addMedia($image->getRealPath())->toMediaCollection('images')
        );
        */

        // https://medium.com/@laravelprotips/discover-hidden-gems-in-laravel-spatie-media-library-c4578aa0909e
    }

    public function update() {
        $this->validate();
        $this->product->update($this->pull(['name', 'price']));
        $this->product->clearMediaCollection('images');
        foreach ($this->images_tmp as $image) {
            $this->product
                ->addMedia($image)
                ->toMediaCollection('images');
        }
    }
}
