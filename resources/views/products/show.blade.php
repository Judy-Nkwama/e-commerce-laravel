<x-layout>
    @if ($product != null)
        <div class="container mt-5 pt-4 pb-5">
            <div class="row">
                <div class="col-md-6 pe-5">
                    <div class="rounded-4 shadow h-100 border overflow-hidden">
                        <img src="{{ asset("storage/$product->bg_image_link") }}" alt="{{ $product->title }}" class="img-fluid w-100 h-100 object-fit-cover">
                    </div>
                </div>
                <div class="col-md-6 text-secondary">
                    <h1>{{ $product->title }}</h1>
                    <h2>{{ $product->price }}₺</h2>
                    <p>{{ $product->description }}</p>

                    <x-tags class="my-5" tagStr="{{ $product->tags_string }}" />

                    <form action="{{-- route('cart.add', $product->id) --}}" method="POST">
                        @csrf
                        <div class="d-flex">
                            <button type="submit" class="btn btn-danger flex-grow-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                    <path
                                        d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                                <span>Sepete Ekle</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if ($product->similar_products !== null && count($product->similar_products) > 0)
            @php
                $products = $product->similar_products;
            @endphp
            <h2 class="text-center text-danger my-5 pb-5">Benzer Ürünler</h2>
            <x-products-wrapper>
                @foreach ($products as $product)
                    <x-product :product="$product" />
                @endforeach
            </x-products-wrapper>
        @endif
    @else
        <p>404 Bu ürün bulunmamakta</p>
    @endif

    @include('partials._categories')
</x-layout>
