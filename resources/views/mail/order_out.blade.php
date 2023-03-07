<div class="col-lg-12 col-md-12 col-12">
    <h3 class="display-5 mb-2 text-center">Your Order</h3>
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
                        <div class="col-md-9 text-left mt-sm-2">
                            <h4>{{$product->name}}</h4>
                        </div>
                    </div>
                </td>
                <td data-th="Price" style="font-size: 1.2rem">${{$product->price}}</td>
                <td data-th="Quantity">
                    <div class="text-right d-flex justify-content-center">
                     {{$product->qty}}
                    </div>
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