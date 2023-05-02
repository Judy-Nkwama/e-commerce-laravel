@extends('layout/layout')

@section('content')

    <h1>{{ $header }}</h1>

    @if (count($products) > 0)
        @foreach ($products as $product)
            <a href="/products/{{ $product['id'] }}">
                <h3>{{ $product['title'] }}</h3>
            </a>
            <p>{{ $product['description'] }}</p>
        @endforeach
    @else
        <p>Hiç bir ürün bulunmamakta</p>
    @endif

@endsection
