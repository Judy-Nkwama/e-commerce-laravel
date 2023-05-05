@props(['tagStr'])

@php
    $tags = explode(',', $tagStr);
@endphp

<div {{$attributes->merge(['class' => ''])}} class="my-5">
    @foreach ($tags as $tag)
        <a class="btn btn-outline-danger rounded-pill me-2" href="/products?tag={{ $tag }}" role="button">{{ $tag }}</a>
    @endforeach
</div>
