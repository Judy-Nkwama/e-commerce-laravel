@props(['product'])

@php
    $is_in_the_cart = false;
    if (auth()->user()) {
        dd($product);
        $cart_items = auth()
            ->user()
            ->sepet()
            ->get();
        $len = count($cart_items);
        for ($i = 0; $i < $len; $i++) {
            if ($cart_items[$i]->product_id == $product->id) {
                $is_in_the_cart = true;
                break;
            }
        }
    }
@endphp

<div class="col mx-2">
    <a href="products/{{ $product->id }}"
        class="card link-secondary rounded-4 shadow-sm overflow-hidden product-card text-decoration-none">
        <div class="card-img-wrapper overflow-hidden w-100">
            <img class="img-fluid object-fit-cover" src="{{ asset("storage/$product->bg_image_link") }}" />
        </div>

        <div class="card-body p-2 bg-white">
            <div class="fw-bold lh-sm card-title overflow-hidden">{{ $product->title }}</div class="fw-bold">
            <p class="card-text fs-7 lh-sm card-description overflow-hidden mb-1">{{ $product->description }}</p>

            <h5 class="fw-semibold">{{ $product->price }}₺</h5>

            <form method="POST" action="/sepet">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}" />
                <button type="submit" onclick="(e) => e.stopPropagation();"
                    class="btn btn-sm w-100 btn-{{ $is_in_the_cart ? 'danger' : 'success' }}-ligth rounded-3 my-2">
                    @if (!$is_in_the_cart)
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-cart-plus" viewBox="0 0 16 16">
                            <path
                                d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                            <path
                                d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                        </svg>
                        <span>Sepete ekle</span>
                    @else
                        <span>Sepetten Çıkar</span>
                    @endif
                </button>
            </form>
        </div>
    </a>
</div>
