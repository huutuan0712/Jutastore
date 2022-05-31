@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Category Page</h1>
        </div>
        <div class="card-body">
            <a href="{{url('add-category')}}">
                <button class="btn btn-primary">Add Category</button>
            </a>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Image</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item )
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->description}}</td>
                            <td>
                              <img src="{{asset('assets/uploads/category/'.$item->image)}}" alt="imgae here" class="cate-image"> 
                            </td>
                            <td>
                              <a href="{{url('edit-prod/'.$item->id)}}" class="btn btn-primary">Edit</a>
                              <a href="{{url('delete-category/'.$item->id)}}" class="btn btn-primary">Delete</a>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  
@endsection