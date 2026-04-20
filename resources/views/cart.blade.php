@extends('layouts.app-front')

@section('content')
 <div class="container-fluid py-3">
    <h1 class="display-5 fw-bold">{{ $main_section_title }}</h1>
    @include('layouts.cart-navigation')
  @endsection
