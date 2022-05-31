<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
   
    public function index()
    {
        $featured_products = Product::where('trending','1')->take(15)->get();
        $trending_category =Category::where('popular','1')->take(15)->get();
        return view('frontend.index',compact('featured_products','trending_category'));
    }

    
    public function category()
    {
        $category =Category::where('status','0')->get();
        return view('frontend.category',compact('category'));
    }

    
    public function productview($cate_slug,$prod_slug)
    {
        if(Category ::where('slug',$cate_slug)->exists()){
            if(Product ::where('slug',$prod_slug)->exists()){
                $product = Product ::where('slug',$prod_slug)->first();
                $ratings =Rating::where('prod_id', $product->id)->get();
                $rating_sum = Rating::where('prod_id',$product->id)->sum('stars_rated');
                $user_rating =Rating::where('prod_id',$product->id)->where('user_id',Auth::id())->first();
               if($ratings->count() > 0 ){
                    $rating_value =$rating_sum/$ratings->count();
               }else{
                $rating_value =0 ;
               }
                return view('frontend.products.view',compact('product',  'ratings','rating_value','user_rating'));
            }else{
                return redirect('/')->with('status','This link was broken');
            }
        }else{
            return redirect('/')->with('status','');
        }
    }

   
    public function viewcategory($slug)
    {
        if(Category ::where('slug',$slug)->exists()){
            $category = Category ::where('slug',$slug)->first();
            $products = Product::where('cate_id',$category->id)->where('status','0')->get();
            return view('frontend.products.index',compact('category','products'));
            
        }else{
            return redirect('/')->with('status','Slug doesnot exiss');
        }
    }
    public function productlist()
    {
        $products = Product::select('name')->where('status','0')->get();
        $data=[];
        foreach($products as $item){
            $data [] = $item['name'];
        }
        return $data;
    }
    public function search(Request $request){
        $search_product = $request ->product_name;
        if($search_product != ""){
            $product =Product ::where("name","LIKE","%$search_product%")->first();
            if($product){
                return redirect('category/'.$product->category->slug.'/'.$product->slug);
            }else{
                return redirect()->back()->with("status","No Product matched your search");
            }
        }else{
            return redirect()->back();
        }

    }
   
}
