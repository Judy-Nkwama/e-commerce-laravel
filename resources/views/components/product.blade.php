@props(['product'])

<div class="col">
    <a href="products/{{ $product->id }}" class="card shadow-sm overflow-hidden text-decoration-none">
        <div class="card-img-wrapper rounded rounded-2 overflow-hidden border w-100">
            <img class="img-fluid object-fit-cover" src="{{ $product->bg_image_link }}" />
        </div>

        <div class="card-body bg-white">
            <h5>{{ $product->title }}</h5>
            <p class="card-text fs-6 card-description overflow-hidden border">{{ $product->description }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill">Kadın</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill">Çocuk</button>
                </div>
                <h3 class="text-muted">507.99tl</h3>
            </div>
        </div>
    </a>
</div>
