@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Update Product</h4>
        </div>
        <div class="card-body">
           <form action="{{url('update-product/'.$product->id)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" >
                            <label for="">Category</label>
                                <option value="">{{$product->category->name}}</option>
                          </select>
                    </div>
                    <div class="col-md-6 mb-3 ">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$product->name}}" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{$product->slug}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Small Description</label>
                        <textarea name="small_description" class="form-control" value="{{$product->small_description}}" rows="3"></textarea>
                        
                   </div>
                   <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description"class="form-control" value="{{$product->description}}"  rows="3"></textarea>
                        
                   </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" name="original_price" value="{{$product->original_price}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" name="selling_price" value="{{$product->selling_price}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="qty" value="{{$product->qty}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" class="form-control" name="tax" value="{{$product->tax}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox"   name="status" value="{{$product->status === "1" ? 'checked':''}}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox"  name="trending" value="{{$product->trending === "1" ? 'checked':''}}}">
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{$product->meta_title}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords"class="form-control" value="{{$product->meta_keywords}}" rows="3"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description"class="form-control" value="{{$product->meta_description}}" rows="3"></textarea>
                    </div>
                    @if ($product->image)
                    <img src="{{url('assets/uploads/category/'.$product->image)}}" >
                @endif
                    <div class="col-md-12 mb-3">
                       <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                       <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
           </form>
        </div>
    </div>
@endsection
