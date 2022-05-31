@extends('layouts.front')

@section('title')
    Welcome JutaStore
@endsection

@section('content')
   <div class="py-5">
       <div class="container">
           <div class="row">
               <h2>Featured Products</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                        @foreach ($featured_products as $product )
                            <div class="item">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="{{asset('assets/uploads/products/'.$product->image)}}" alt="image here">
                                    </div>
                                    <div class="card-body">
                                        <h5>{{$product->name}}</h5>
                                        <span class="float-start">{{$product->selling_price}}</span>
                                        <span class="float-end"><s>{{$product->original_price}}</s></span>
                                    </div>
                                </div>
                            </div>
                       @endforeach
               </div>
           </div>
       </div>
   </div>

   <div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Trending Category</h2>
             <div class="owl-carousel featured-carousel owl-theme">
                     @foreach ($trending_category as $tcategory )
                         <div class="item">
                            <a href="{{url('view-category/'.$tcategory->slug)}}" class="nav-link">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="{{asset('assets/uploads/category/'.$tcategory->image)}}" alt="image here">
                                    </div>
                                    <div class="card-body">
                                        <h5>{{$tcategory->name}}</h5>
                                        <p>
                                            {{$tcategory->description}}
                                        </p>
                                    </div>
                                </div>
                            </a>
                         </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>
@endsection