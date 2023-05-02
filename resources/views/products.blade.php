@extends('layout/layout')

@include('partials._carousel')
@include('partials._categories')

@section('content')
    <h1>{{ $header }}</h1>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @if (count($products) > 0)
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card shadow-sm overflow-hidden">
                            <div class="card-img-wrapper w-100">
                                <img class="img-fluid object-fit-cover" src="{{ $product->bg_image_link }}" />
                            </div>

                            <div class="card-body bg-white">
                                <h4>{{ $product->title }}</h4>
                                <p class="card-text card-description overflow-hidden border">{{ $product->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <button type="button"
                                            class="btn btn-sm btn-outline-secondary rounded-pill">Kadın</button>
                                        <button type="button"
                                            class="btn btn-sm btn-outline-secondary rounded-pill">Çocuk</button>
                                    </div>
                                    <h3 class="text-muted">507.99tl</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Hiç bir ürün bulunmamakta</p>
            @endif
        </div>
    </div>

    @include('partials._feacher')
    
@endsection

