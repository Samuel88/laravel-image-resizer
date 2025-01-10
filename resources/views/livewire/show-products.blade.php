<div>
    @foreach ($products as $product)
        <div class="product">
            <div class="name">{{ $product->name }}</div>
            @foreach ($product->getMedia('images') as $image)
                <img src="{{ $image->getUrl() }}" alt="" class="image">
            @endforeach
        </div>
    @endforeach
    {{ $products->links() }}
</div>