@extends('layouts.home')

@section('content')
    <!-- .block-slideshow -->
    @include('partials._hero')
    <!-- .block-slideshow / end -->

    <!-- .block-features -->
    @include('partials._features')
    <!-- .block-features / end -->

    <!-- .block-products-carousel -->
    {{-- <x-foryou /> --}}
    {{-- @include('components.foryou') --}}
    <!-- .block-products-carousel / end -->

    <!-- .block-banner -->
    {{-- @include('partials._banner') --}}
    <!-- .block-banner / end -->

    <!-- .block-products -->
    {{-- <x-bestsellers /> --}}
    <!-- .block-products / end -->

    <!-- .block-products-carousel -->
    {{-- <x-newArrivals /> --}}
    <!-- .block-products-carousel / end -->
@endsection
