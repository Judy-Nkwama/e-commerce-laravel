<x-layout>

    @include('partials._carousel')
    @include('partials._categories')

    <div class="container">
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 g-3">
            @if (count($products) > 0)
                @foreach ($products as $product)
                    <x-product :product="$product" />
                @endforeach
            @else
                <p>Hiç bir ürün bulunmamakta</p>
            @endif
        </div>
    </div>

    @include('partials._feacher')

</x-layout>
