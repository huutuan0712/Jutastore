@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Users</h1>
        </div>
        <div class="card-body">
            <a href="{{url('add-category')}}">
                <button class="btn btn-primary">Add User</button>
            </a>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item )
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td>
                              <a href="{{url('view-users/'.$item->id)}}" class="btn btn-primary">View</a>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  
@endsection