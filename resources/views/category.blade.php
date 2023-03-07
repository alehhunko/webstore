@extends('layouts/main')
@section('title', 'Shop - page catergory- '. $category->name)
@section('contents')
<!-- Header-->
<header class="bg-dark py-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <img src="{{ asset('/img/category_1.jpg') }}" class="img-fluid">
            </div>
            <div class="col-md-5">
                <img src="{{ asset('/img/category_2.webp') }}" class="img-fluid">
            </div>
        </div>
    </div>
</header>
<!-- Catalog-->
<div class="container ">
    <h2 class="display-4 text-uppercase text-center mt-5">{{$category->code}}</h2>
    <div class="row">
        <!-- Filter-->
        <form class="filter-content col-sm-4" action="{{route('category', ['category'=>$category->name])}}" method="GET">
            @include('layouts/filter')
        </form>
        <!-- Product-->
        <div class="col-sm-8">
            <div class="container ">
                <div class="row ">
                    @foreach ($products as $product)
                        @foreach ($categories as $category)
                            @if ($product->category_id===$category->id)
                            @include('layouts/product', [compact('product'), $category->name])
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection