@extends('layouts.app-front')

@section('content')
 <div class="container-fluid py-3">
    @include('layouts.cart-navigation')
    <h1 class="display-5 fw-bold">{{ $cart_section_title }}</h1>
    @foreach ($categories as $category)
        <a href="{{ asset('/cart/category/details/' . (string) $category->id) }}">{{ $category->name }}</a>
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
    @endforeach
    <script src="{{ asset('js/custom/cart-categories.js') }}" defer="defer"></script>
@endsection
