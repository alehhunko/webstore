@extends('layouts/main')
@section('title', 'Shop - Shopping cart')
@section('contents')
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row w-100">
            <div class="col-lg-12 col-md-12 col-12">
                <h3 class="display-5 mb-2 text-center">Shopping Cart</h3>
                <table id="shoppingCart" class="table table-condensed table-responsive">
                    <thead>
                        <tr>
                            <th style="width:62%">Product</th>
                            <th style="width:10%">Price</th>
                            <th style="width:13%">Quantity</th>
                            <th style="width:15%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($session_products as $product)
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-md-3 text-left">
                                        <img src={{ $product->options->image }} alt=""
                                        class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                    </div>
                                    <div class="col-md-9 text-left mt-sm-2">
                                        <h4>{{$product->name}}</h4>
                                        <p class="font-weight-light">Code:{{ $product->options->code }}</p>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price" style="font-size: 1.2rem">${{$product->price}}</td>
                            <td data-th="Quantity" >
                                <form class="text-right d-flex justify-content-center" action="{{route('update_cart', ['rowId'=>$product->rowId])}}" method="POST">
                                    @csrf
                                <input class="form-control form-control text-center mr-2" type="number" name="quantity"
                                    value="{{$product->qty}}">
                                <button type="submit" class="btn btn-outline-dark">
                                    <i class="bi bi-arrow-repeat"></i>
                                </button>
                                </form>
                            </td>
                            <td class="actions" data-th="">
                                <form class="text-right" action="{{route('remove_from_cart', [$product->rowId])}}"
                                    method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-dark">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="float-right text-right">
                    <h4>Subtotal:</h4>
                    <h1>${{$session_total}}</h1>
                </div>
            </div>
        </div>
        <div class="row mt-4 d-flex align-items-center">
            <div class="col-sm-12 order-md-2 text-right">
                <a href="{{route('order')}}" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">Order</a>
            </div>
        </div>
    </div>
</section>
@endsection