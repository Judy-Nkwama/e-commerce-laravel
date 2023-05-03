<x-layout>
    @if ($product != null)
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ $product->bg_image_link }}" alt="{{ $product->title }}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h1>{{ $product->title }}</h1>
                    <h2>400tl ${{-- $product->price --}}</h2>
                    <p>{{ $product->description }}</p>

                    <x-tags class="my-5" tagStr="{{ $product->tags_string }}" />

                    <form action="{{-- route('cart.add', $product->id) --}}" method="POST">
                        @csrf
                        <div class="d-flex">
                            <div class="btn-group me-md-4" role="group" aria-label="Basic outlined">
                                <button type="button" class="btn btn-outline-primary px-3">-</button>
                                <div class="d-flex align-items-center border border-primary w-100 px-4"><span>1</span>
                                </div>
                                <button type="button" class="btn btn-outline-primary px-3">+</button>
                            </div>
                            <button type="submit" class="btn btn-primary flex-grow-1">Add to Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <p>404 Bu ürün bulunmamakta</p>
    @endif

    @include('partials._categories')
</x-layout>
