@extends('layout')

@section('content')
    @if ($product != null)
        <h1>{{ $product['title'] }}</h1>
        <p>{{ $product['description'] }}</p>
    @else
        <p>404 Bu ürün bulunmamakta</p>
    @endif
@endsection
