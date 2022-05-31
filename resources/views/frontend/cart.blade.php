@extends('layouts.front')

@section('title')
    My Cart
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm border-top bg-secondary">
    <div class="container">
        <div class="mb-0">
            <a href="{{url('/')}}">Home</a>/
            <a href="{{url('cart')}}">Cart</a>
          
        </div>
    </div>
</div>
    <div class="container">
        <div class="card shadow">
            @if ($cartItems->count() > 0)
            <div class="card-body">
                @php
                    $total=0;
                @endphp
                @foreach ($cartItems as $item)
                    <div class="row product_data">
                        <div class="col-md-2">
                            <img src="{{asset('assets/uploads/products/nike3.webp')}}" height="70px" width="70px" alt="image here">
                        </div>
                        <div class="col-md-3">
                            <h3>{{$item->products->name}}</h3>
                        </div>
                        <div class="col-md-2">
                            <h3>{{$item->products->selling_price}}</h3>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" value="{{$item->prod_id}}" class="prod_id">
                            @if ($item->products->qty >= $item->prod_id)
                                <label for="">Quantity</label>
                                <div class="input-group text-center mb-3 " style="width: 100px">
                                    <button class="input-group changeQuatity decrement-btn">-</button>
                                    <input type="text" name="quantity"  class="form-control qty-input" value="{{$item->prod_qty}}" >
                                    <button class="input-group changeQuatity increment-btn">+</button>
                                </div>
                                    @php
                                    $total += $item->products->selling_price * $item->prod_qty;
                                    @endphp
                            @else
                                <h6>Out of Stock</h6>
                        @endif
                        
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary delete">Remove</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card-footer">
                <h6>Total Price: {{$total}}</h6>
                <a href="{{url('checkout')}}">   <button class="btn btn-primary">Check Out</button></a>
            </div>
            @else
            <div class="card-body text-center">
                <h2>Your <i class="fa-solid fa-cart-shopping"></i> Cart is empty</h2>
                <a href="{{url('category')}}" class="btn btn-primary">Continue  Shopping</a>
            </div>
            @endif
           
        </div>
    </div>
@endsection