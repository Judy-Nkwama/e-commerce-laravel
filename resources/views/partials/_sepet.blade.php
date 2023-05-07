@php
    $nbr_of_items = 0;
    if (auth()->user()) {
        $sepet_items = auth()
            ->user()
            ->sepet()
            ->get();
        $nbr_of_items = count($sepet_items);
    }
@endphp
<div class="dropdown text-white">
    <a href="#" class="nav-link d-flex flex-column align-items-center text-white text-decoration-none"
        data-bs-toggle="dropdown" aria-expanded="false">
        <div class="position-relative">
            <svg xmlns="http://www.w3.org/2000/svg" class="bi d-block mx-auto mb-1" width="24" height="24"
                fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path
                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
            <div class="badge rounded-circle bg-white text-danger position-absolute" style="top: -10px; left: 16px;">
                {{ $nbr_of_items }}
            </div>
        </div>
        <span>Sepetim</span>
    </a>
    <ul class="dropdown-menu text-small shadow px-3">
        @if ($nbr_of_items > 0)
            @foreach ($sepet_items as $item)
                @php
                    $product = $item->product()->first();
                @endphp

                <li>
                    <div class="d-flex align-items-center flex-nowrap p-2">
                        <div class="adm-prod-sm-img-wrapper rounded shadow-sm border overflow-hidden">
                            <img src="{{ asset("storage/$product->bg_image_link") }}" alt=""
                                class="img-fluid w-100 h-100 object-fit-cover">
                        </div>
                        <div class="d-flex flex-column justify-content-center text-secondary px-3">
                            <span class="text-nowrap pe-1 overflow-hidden"
                                style="max-width: 150px; text-overflow: ellipsis;">{{ $product->title }}</span>
                            <span class="fw-bold">{{ $product->price }}₺</span>
                        </div>
                        <form method="POST" action="/sepet">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}" />
                            <button type="button" class="btn btn-sm btn-danger px-3">x</button>
                        </form>
                    </div>
                </li>
            @endforeach
            <li>
                <hr>
            </li>
            <li class="pb-2">
                <a href="/checkout" type="button" class="btn btn-sm btn-success px-3 w-100">Sepete git</a>
            </li>
        @else
            <li class="pb-2">
                <div class="text-center p-5 fw-bold text-danger">Sepetiniz boş :(</div>
            </li>
        @endif
    </ul>
</div>
