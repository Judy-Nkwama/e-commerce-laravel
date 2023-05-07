@props(['method', 'action', 'class', 'title', 'value'])

@php
    $_method = $method ?? 'POST'; 
@endphp

<form method="{{ $_method }}" action="{{ $action }}">
    @method($_method)
    @csrf
    <input type="hidden" name="product_id" value="{{ $value }}" />
    <button type="button" class="{{ $class }}">{{ $title }}</button>
</form>
