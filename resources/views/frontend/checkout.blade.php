@extends('layouts.front')

@section('title')
  Checkout
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm border-top bg-secondary">
    <div class="container">
        <div class="mb-0">
            <a href="{{url('/')}}">Home</a>/
            <a href="{{url('Checkout')}}">Checkout</a>
          
        </div>
    </div>
</div>
    <div class="container">
        <form action="{{url('place-order')}}" method="POST">
            {{ csrf_field() }}
          
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <div class="row checkout-form">
                              
                                <div class="col-md-6">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control name" value="{{Auth::user()->name}}"  placeholder="Enter Last Name" name="name">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control email" value="{{Auth::user()->email}}"  placeholder="Enter Email" name="email">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Phone Number</label>
                                    <input type="text" class="form-control phone" value="{{Auth::user()->phone}}"  placeholder="Enter Phone Number" name="phone">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Address </label>
                                    <input type="text" class="form-control address" value="{{Auth::user()->address}}"  placeholder="Enter Address" name="address">
                                </div>
                             
                                <div class="col-md-6">
                                    <label for="">City</label>
                                    <input type="text" class="form-control city" value="{{Auth::user()->city}}"  placeholder="Enter City" name="city">
                                </div>
                               
                                <div class="col-md-6">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control country" value="{{Auth::user()->country}}"  placeholder="Enter Country" name="country">
                                </div>
                                
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            Orders Detail
                            <hr>
                            @if ($cartItems ->count() > 0)
                                <table class="table table-striped">
                                    <tbody>
                                        <td>Name</td>
                                        <td>Quantity</td>
                                        <td>Price</td>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($cartItems as $item)
                                        <tr>
                                            <td>{{$item->products->name}}</td>
                                            <td>{{$item->prod_qty}}</td>
                                            <td>{{$item->products->selling_price}}</td>
                                        </tr>
                                        @php
    
                                        /** @var TYPE_NAME $item */
                                        $total += $item->products->selling_price * $item->prod_qty;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
    
                                <hr>
                                <h6>Total Price: {{$total}}</h6>    
                                <button type="submit" class="btn btn-primary cod">Place Osder | COD</button>
                                <div id="paypal-button-container"></div>
                            @else
                                <h4 class="text-center">No Product in Cart</h4>
                            @endif
                           
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
  
@endsection
@section('scripts')
<script src="https://www.paypal.com/sdk/js?client-id=AX5FBa_sfflqv8xfHzuuM4l83I1ae1m6p8reLpD3kv0ElzTAszh_NnDPRLwNS1g9KtRdQKOPFaWHCpSu&currency=USD"></script>
<script>

    paypal.Buttons({
      // Sets up the transaction when a payment button is clicked
      createOrder: (data, actions) => {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '{{$total}}' // Can also reference a variable or function
          
            }
          }]
        });
      },
      // Finalize the transaction after payer approval
      onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
          // Successful capture! For dev/demo purposes:
            var name = $('.name').val();
            var email = $('.email').val();
            var phone = $('.phone').val();
            var address =$('.address').val();
            var country = $('.country').val();
            var city = $('.city').val();
                $.ajaxSetup({
                            headers:{
                                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                            }
                        });
                $.ajax({
                    method:"POST",
                    url:"/place-order",
                    data:{
                        'name':name,
                        'email':email,
                        'phone':phone,
                        'country':country,
                        'city':city,
                        'address':address,
                        'payment_mode':'Paid by Paypal',
                        'payment_id':orderData.id,
                    },
                    success:function(response){
                        swal(response.status);
                        window.location.href ="/my-orders";
                    }
                });
        
        });
      }
    }).render('#paypal-button-container');
  </script>
@endsection