@extends('layouts.front')

@section('title',$product->name)
 


@section('content')
<div id="multiple-one" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{url('/add-rating')}}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="modal-header">
                    <h4 class="modal-title" id="multiple-oneModalLabel">Rate {{$product ->name}}</h4>
                </div>
                <div class="modal-body">
                    <div class="rating-css">
                        <div class="star-icon">
                            @if ($user_rating)
                                @for ($i =1 ;$i <= $user_rating->stars_rated; $i++ )
                                    <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                    <label for="rating{{$i}}" class="fa fa-star"></label>
                                @endfor
                                @for ($j =  $user_rating->stars_rated + 1;$j<= 5;$j++)
                                    <input type="radio" value="{{$j}}" name="product_rating" checked id="rating{{$j}}">
                                    <label for="rating{{$j}}" class="fa fa-star"></label>
                                @endfor
                                
                            @else
                                <input type="radio" value="1" name="product_rating" checked id="rating1">
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" value="2" name="product_rating" id="rating2">
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" value="3" name="product_rating" id="rating3">
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" value="4" name="product_rating" id="rating4">
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" value="5" name="product_rating" id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="py-3 mb-4 shadow-sm border-top bg-secondary">
    <div class="container">
        <div class="mb-0">
            <a href="{{url('category')}}">Collections</a>/
            <a href="{{url('category/'.$product->category->slug)}}">{{$product->category->name}}</a>/
            <a href="{{url('category/'.$product->category->slug.'/'.$product->slug)}}">{{$product->name}}</a>
        </div>
    </div>
</div>
    <div class="container pb-5">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{asset('assets/uploads/products/'.$product->image)}}" alt="image here" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{$product->name}}
                          @if ($product->trending == '1')
                          <label for="">Trending</label>
                          @endif
                        </h2>
                        <hr>
                        <label class="me-3">Origin Price:<s>Rs{{$product->original_price}}</s></label>
                        <label class="me-3 fw-bold">Selling Price:<s>Rs{{$product->selling_price}}</s></label>
                      <div class="rating">
                         @php
                            $ratenum = number_format($rating_value);
                         @endphp
                          @for ($i =1 ;$i <= $ratenum; $i++ )
                            <i class="fa-solid fa-star checked"></i>
                          @endfor
                            @for ($j = $ratenum + 1;$j<= 5;$j++)
                                <i class="fa-solid fa-star"></i>
                            @endfor
                         @if ($ratings->count()>0)
                            <span>{{$ratings->count()}} Ratings</span>
                         @else
                            No Rating
                         @endif
                      </div>
                        <p class="mt-3">
                            {!!$product->small_description!!}
                        </p>
                        <hr>
                        @if ($product->qty > 0)
                            <label class="badge bg-success">In stock</label>
                        @else  
                            <label class="badge bg-danger">Out of stock</label>                 
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <input type="hidden" value="{{$product->id}}" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3 ">
                                    <button class="input-group decrement-btn">-</button>
                                    <input type="text" name="quantity " value="1" class="form-control qty-input" style="max-width: 4rem">
                                    <button class="input-group increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br>
                                @if ($product->qty > 0)
                                <button type="button" class="btn btn-primary me-3 float-start addToCart">Add to cart</button>
                                @else  
                                    <label class="badge bg-danger">Out of stock</label>                 
                                @endif
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h3>Description</h3>
                    <p class="mt-3">
                        {{ $product->description}}
                    </p>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="button-list">
                        <!-- Multiple modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#multiple-one">Rate as Product</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

