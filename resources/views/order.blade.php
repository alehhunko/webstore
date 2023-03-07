@extends('layouts/main')
@section('title', 'Shop - Order confirmation')
@section('contents')
<section class="pt-5 pb-5">
    <div class="container mb-5">
        <div class="row w-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    @if(Session::has('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="text-center mt-4">
                        <h1 class="h2">Order Confirmation</h1>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <form action="{{route('order_user')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control form-control-lg" type="text" name="name"
                                            placeholder="Enter your name" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Mail</label>
                                        <input class="form-control form-control-lg" type="text" name="mail"
                                            placeholder="Enter your mail" value="{{ old('mail') }}">
                                    </div>
                                    @if ($errors->any())
                                    <div class="alert alert-danger">Error</div>
                                    @endif
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Сonfirm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection