<div class="col-md-4 mt-5">
    <div class="card h-100">
        <!-- Product image-->
        <img class="card-img-top" src={{$product->image??"https://dummyimage.com/450x300/dee2e6/6c757d.jpg"}} alt="..."
        />
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">{{$product->name??'name'}}</h5>
                <!-- Product price-->
                {{$product->price??'price'}}$
            </div>
        </div>
        <!-- Product actions-->
        <form class="card-footer p-4 pt-0 border-top-0 bg-transparent " action="{{route('add_to_cart', ['id'=>$product->id])}}" method="POST">
            @csrf
            <div class="d-flex justify-content-center">
                <a class="btn btn-outline-primary mt-auto mr-2"
                    href="{{route('product_cart', [$category->name??'shop', $product->code??'shop'])}}">Options</a>
                <button type="submit" class="btn btn-outline-dark mt-auto">
                    <span id="boot-icon" class="bi bi-cart"></span>
                </button>
            </div>
        </form>
    </div>
</div>