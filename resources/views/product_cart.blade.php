@extends('layouts/main')
@section('title', 'Shop - Product cart')
@section('contents')
<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ $product->image }}"
                    alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">CODE: {{ $product->code }}</div>
                <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                <div class="fs-5 mb-5">
                    <span class="text-decoration-line-through">{{ $product->price }}$</span>
                </div>
                <p class="lead">{{ $product->description }}</p>
                <form class="d-flex" action="{{route('add_to_cart', ['id'=>$product->id])}}" method="POST">
                    @csrf
                    <input class="form-control text-center me-3" name="quantity" id="inputQuantity" type="number" min="1" value="1"
                        style="max-width: 3rem" />
                    <button type="submit" class="btn btn-outline-dark flex-shrink-0" type="button">Add to cart</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection