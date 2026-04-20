@extends('layouts.app-front')

@section('content')
 <div class="container-fluid py-3">
    @include('layouts.cart-navigation')
    <h1 class="display-5 fw-bold">{{ $cart_section_title }}</h1>
    @foreach ($products as $product)
        <a href="{{ asset('/cart/product/details/' . (string) $product->id) }}">{{ $product->name }}</a><br />
        @if ($product->hasFullDescription())
            <span class="short_description_{{ $product->id }}" ">
                {!! $product->getShortDescription() !!}
                <a href="javascript:void(0);" class="more_description" id="{{ $product->id }}">more &gt;&gt;</a>
            </span>
            <span class="full_description_{{ $product->id }} hidden" id="{{ $product->id }}">
                <a href="javascript:void(0);" class="less_description" id="{{ $product->id }}">less &lt;&lt;</a>
                {!! $product->description !!}
            </span>
        @else
            {!! $product->description !!}
        @endif
        <br />
        <br />
    @endforeach
    <script src="{{ asset('js/custom/cart-products.js') }}" defer="defer"></script>
@endsection
