@extends('layouts.admin')

@section('title')
   My Orders
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order View</h4>
                    <a href="{{url('orders')}}" class="btn btn-waring">Black</a>
                </div>
                <div class="card-body">
                   <div class="row">
                       <div class="col-md-6">
                            <label for="">Name</label>
                            <div class="border p-2">{{$orders->name}}</div>
                            <label for="">Email</label>
                            <div class="border p-2">{{$orders->email}}</div>
                            <label for="">Contract</label>
                            <div class="border p-2">{{$orders->phone}}</div>
                            <label for="">Shipping Address</label>
                            <div class="border p-2">
                                {{$orders->address}}
                                {{$orders->city}}
                                {{$orders->country}}
                            </div>
                            <label for="">City</label>
                            <div class="border p-2">{{$orders->city}}</div>
                       </div>
                       <div class="col-md-6">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tr>
                                    @foreach ($orders->orderItems as $item)
                                    <tr>
                                        <td>{{$item->products->name}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>
                                            <img src="{{asset('assets/uploads/products/nike3.webp'.$item->products->image)}}" width="50px" alt="Product Image">
                                        </td>
                                    <tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4>Grand Total: {{$orders->total_price}}</h4>
                            <div class="mt-5 x-2">
                                <label for="">Order Status</label>
                                <form action="{{url('update-order/'.$orders->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select class="form-select" name="order_status">
                                        <option {{$orders->status =='0'?'selected':''}} value="0">Pending</option>
                                        <option {{$orders->status =='1'?'selected':''}} value="1">Completed</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                                </form>
                            </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection