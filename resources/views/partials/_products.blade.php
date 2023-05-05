<div class="container">
    <h2 class="text-center text-danger mb-5">Öne Çıkan Ürünler</h2>
    <x-products-wrapper>
        @if (count($products) > 0)
            @foreach ($products as $product)
                <x-product :product="$product" />
            @endforeach
        @else
            <p>Hiç bir ürün bulunmamakta</p>
        @endif
    </x-products-wrapper>

    @include('partials._feacher')

</div>