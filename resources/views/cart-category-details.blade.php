@extends('layouts.app-front')

@section('content')
 <div class="container-fluid py-3">
    @include('layouts.cart-navigation')
    <h1 class="display-5 fw-bold">{{ $cart_section_title }}</h1>
        <strong>{{ $category->name }}'</strong>
        category has {{ $category->productsCount() }} products.
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
        @if (count($products) > 0)
          <strong>Producta are listed below:</strong>
        @else
            <strong>Category does not have products to list.</strong>
            <a href="{{ asset('/cart/categories/') }}">Click here<a/> to get list of available categories.
        @endif
        <br />
        <br />
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
    <script src="{{ asset('js/custom/cart-categories.js') }}" defer="defer"></script>
@endsection
