@extends('user.layout.index')
@section('content')
<!-- menu_index -->
@include('user.layout.menu_index')
<!-- menu_index -->
 <!-- Brands Section Begin -->
 @include('user.layout.brands')
    <!-- Brands Section End -->
  <!-- Featured Section Begin -->
    @include('user.layout.products_featured')
    <!-- Featured Section End -->
@endsection