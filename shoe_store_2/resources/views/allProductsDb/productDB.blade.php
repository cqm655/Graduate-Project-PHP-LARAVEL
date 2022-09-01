@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('app.css')}}">
@if(session('deleted'))

<div class="alert alert-dismissible alert-danger">
    <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
    <h4 class="alert-heading">Deleted!</h4>
    <p class="mb-0">Product deleted successfully</p>
</div>
@endif
<div class="col-lg-12" id="addProduct">
    <h3>Products</h3>
    
    <div id="pagination_data" style="padding: 15px;">
        @include("allProductsDb.productPagination",['product' => $product])
    </div>
</div>






@endsection