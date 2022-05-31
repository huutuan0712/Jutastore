@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Product Page</h1>
        </div>
        <div class="card-body">
            <a href="{{url('add-product')}}">
                <button class="btn btn-primary">Add Product</button>
            </a>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Category</td>
                        <td>Name</td>
                        <td>Selling Price</td>
                        <td>Image</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                     @foreach ($product as $item )
                         <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->selling_price}}</td>
                            <td>
                              <img src="{{asset('assets/uploads/products/'.$item->image)}}" alt="imgae here" class="cate-image"> 
                            </td>
                            <td>
                              <a href="{{url('edit-product/'.$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                              <a href="{{url('delete-product/'.$item->id)}}" class="btn btn-primary btn-sm">Delete</a>
                            </td>
                            
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
  
@endsection