<div class="container">
    <h2 class="text-center text-danger mb-5">Öne Çıkan Ürünler</h2>
    <div class="row row-cols-2 row-cols-sm-4 row-cols-md-6 g-3">
        @if (count($products) > 0)
            @foreach ($products as $product)
                <x-product :product="$product" />
            @endforeach
        @else
            <p>Hiç bir ürün bulunmamakta</p>
        @endif
    </div>

    @include('partials._feacher')

</div>