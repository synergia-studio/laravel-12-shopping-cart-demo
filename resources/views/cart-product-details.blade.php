@extends('layouts.app-front')

@section('content')
 <div class="container-fluid py-3">
    @include('layouts.cart-navigation')
    <h1 class="display-5 fw-bold">{{ $cart_section_title }}</h1>
        <strong>Category '{{ $category->name }}'</strong>
        <br />
        @if ($category->hasFullDescription())
            <span class="short_description_{{ $category->id }}" ">
                {!! $category->getShortDescription() !!}
                <a href="javascript:void(0);" class="more_description" id="{{ $category->id }}">more &gt;&gt;</a>
            </span>
            <span class="full_description_{{ $category->id }} hidden" id="{{ $category->id }}">
                <a href="javascript:void(0);" class="less_description" id="{{ $category->id }}">less &lt;&lt;</a>
                {!! $category->description !!}
            </span>
        @else
            {!! $category->description !!}
        @endif
        <br />
        <br />
        <strong>Product details are listed below:</strong>
        <br />
        <br />
        <strong>Product '{{ $product->name }}'</strong>
        <br />
        <br />
        {!! $product->description !!}
        <br />
        <br />

        @if (Auth::check())
            logeed in
        @else
            Please <a href="/login/">Login</a> in order to continue with adding this product to cart.
        @endif
    <script src="{{ asset('js/custom/cart-products.js') }}" defer="defer"></script>
@endsection
