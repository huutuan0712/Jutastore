@extends('layouts.front')

@section('title')
    Products
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm border-top bg-secondary">
    <div class="container">
        <h6 class="mb-0">Collections/{{$category->name}}</h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>{{$category->name}}</h2>
            <div class="col-md-3 mb-3">
                @foreach ($products as $product )
                 <div class="card ">
                    <a href="{{url('category/'.$category->slug.'/'.$product->slug)}}" class="nav-link card-img">
                        <img src="{{asset('assets/uploads/products/'.$product->image)}}" alt="image here">
                        <div class="card-body">
                            <h5>{{$product->name}}</h5>
                            <span class="float-start">{{$product->selling_price}}</span>
                            <span class="float-end"><s>{{$product->original_price}}</s></span>
                        </div>
                    </a>
                 </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection