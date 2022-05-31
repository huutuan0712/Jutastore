@extends('layouts.admin')

@section('content')
   <div class="container">
       <div class="row">
           <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>User Detail</h1>
                        <a href="{{url('users')}}" class="btn btn-primary">Black</a>
                    </div>
                    <div class="card-body">
                       <div class="row">
                            <div class="col-md-4 mt-3">
                                <label for="">Role</label>
                                <div class="p-2 border">{{ $users->role_as == '0' ? 'user':'Admin'}}</div>
                            </div>
                           <div class="col-md-4 mt-3">
                               <label for="">Name</label>
                               <div class="p-2 border">{{$users->name}}</div>
                           </div>
                           <div class="col-md-4 mt-3">
                            <label for="">Email</label>
                            <div class="p-2 border">{{$users->email}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Phone</label>
                            <div class="p-2 border">{{$users->phone}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Adress</label>
                            <div class="p-2 border">{{$users->address}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Country</label>
                            <div class="p-2 border">{{$users->country}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">City</label>
                            <div class="p-2 border">{{$users->city}}</div>
                        </div>
                       </div>
                    </div>
                </div>
           </div>
       </div>
   </div>
  
@endsection