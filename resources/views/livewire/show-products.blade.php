<div>
    @foreach ($products as $product)
        <div class="product">
            <div class="name">{{ $product->name }}</div>
            <img src="{{ $product->getFirstMediaUrl('image') }}" alt="" class="image">
        </div>
    @endforeach
</div>