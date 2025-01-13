<div class="max-w-4xl mx-auto">
    <div class="products flex flex-wrap">
        @foreach ($products as $product)
            <div class="product w-full p-4 bg-black text-white rounded-lg flex flex-wrap">
                <h3 class="name w-1/4">{{ $product->name }}</h3>
                <div class="product-images w-3/4 flex flex-wrap">
                    @foreach ($product->getMedia('images') as $image)
                        <img src="{{ $image->getUrl() }}" alt="" class="image w-1/2">
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <div class="products-paginate">
        {{ $products->links() }}
    </div>
</div>