<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class CheckoutController extends Controller
{
    public function index()
    {
        // $old_cartItems = Cart::where('user_id',Auth::id())->get();
        // foreach($old_cartItems as $item){
        //     if(!Product::where('id',$item->prod_id)->where('qty','>=',$item->prod_id)->exists()){
        //         $removeItem = Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
        //         $removeItem->delete();
        //     }
        // }
        $cartItems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout',compact('cartItems'));
    }
    public function placeorder( Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->country = $request->input('country');
        $order->tracking_no ='Huutuan'.rand(1111,9999);
        $order->payment_mode = $request->input('payment_mode');
        $order->payment_id = $request->input('payment_id');

        $total=0;
        $cartItems_total =Cart::where('user_id',Auth::id())->get();
        foreach($cartItems_total as $prod){
            $total += $prod->products->selling_price;
        }
        $order->total_price = $total;
        $order->save();
      

        // $order->id;
        $cartItems = Cart::where('user_id',Auth::id())->get();
        foreach($cartItems as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id'=>$item->prod_id,
                'qty' =>$item->prod_qty,
                'price'=>$item->products->selling_price,
            ]);
            $prod = Product::where('id',$item->prod_id)->first();
            $prod->qty = $prod->qyt -  $item->prod_qty;
            $prod ->update();
        }
        if(Auth::user()->address == NULL){
            $user = User::where('id',Auth::id())->first();
             $user->name = $request->input('name');
            $user->city = $request->input('city');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->country = $request->input('country');
            $user->update();
        }
        $cartItems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartItems);
            
        if($request->input('payment_mode') == "Paid by Paypal"){
            return response()->json(['status'=>"Order placed Successfufly"]);
        }
        return redirect('/')->with('status',"Order Placed Successfully");
    }

    public function payment(Request $request )
    {
       $cartItems = Cart::where('user_id',Auth::id())->get();
       $total_price=0;
       foreach( $cartItems as $item){
           $total_price += $item->products->selling_price * $item->prod_qty;
       }
       $name = $request->input('name');
       $phone = $request->input('phone');
       $email = $request->input('email');
       $country = $request->input('country');
       $city = $request->input('city');
       $adress = $request->input('adress');
       return response()->json([
            'name'=>$name,
            'phone'=>$email,
            'phone'=>$phone,
            'country'=>$country,
            'city'=>$city,
            'adress'=>$adress,
            'total_price'=>$total_price,
       ]);
     
    }
}
