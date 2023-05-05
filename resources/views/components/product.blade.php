@props(['product'])

<div class="col mx-2">
    <a href="products/{{ $product->id }}"
        class="card link-secondary  rounded-4 shadow-sm overflow-hidden text-decoration-none">
        <div class="card-img-wrapper rounded-top rounded-2 overflow-hidden border w-100">
            <img class="img-fluid object-fit-cover" src="{{ $product->bg_image_link }}" />
        </div>

        <div class="card-body p-2 bg-white">
            <div class="fw-bold lh-sm card-title overflow-hidden">{{ $product->title }} knasfl</div
                class="fw-bold">
            <p class="card-text fs-7 lh-sm card-description overflow-hidden mb-1">{{ $product->description }}</p>

            <h5 class="fw-semibold">{{ $product->price }}₺</h5>
            
            <div href="#" class="btn btn-sm w-100 btn-danger rounded-3 my-2">Sepete ekle</div>

        </div>
    </a>
</div>
