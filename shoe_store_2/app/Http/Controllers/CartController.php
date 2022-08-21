<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Console\Scheduling\Schedule;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{

    public function addToCart(Request $req){
        $id = $req->id;
       
        $product = Product::findOrFail($id);
        $image = DB::table('images')->where('product_id','=',$id)->select('image')->take(1)->get()->pluck('image')->toArray();
        $image = implode("[", $image);
        $val = new Cart();
        $val->product_name= $product->product_name;
        $val->product_style = $product->product_style;
        $val->product_color = $product->product_color;
        $val->product_size = $product->product_size;
        $val->product_price = $product->product_price;
        $val->image=$image;
        
        $val->save();
        $count = Cart::count();
       
        return response()->json(['val' => $val,'count'=>$count]);
    }
    public function showCart(){
        $show['data'] = Cart::all();
        return response()->json($show);
    }
    public function deleteCart($id){
        $delItem = DB::table('carts')->where('id','=',$id)->delete();
        return back();
    }
    public function count(){
        $count = Cart::count();
        return $count;
    }

}


