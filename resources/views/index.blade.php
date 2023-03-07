@extends('layouts/main')
@section('title', 'Shop - Home page')
@section('contents')
<!-- Header-->
<header class="bg-dark py-3">
    <div class="container">
        <img src="{{ asset('/img/header.jpg') }}" class="img-fluid">
    </div>
</header>
<!-- Catalog-->
<div class="container ">
    <div class="row">
        <!-- Filter-->
        <form class="filter-content col-sm-4" action="{{route('index')}}" method="GET">
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