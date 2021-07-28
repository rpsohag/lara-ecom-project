<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addtocart(request $request){

        $cookie = Cookie::get('cookie_id');
        if ($cookie) {
            $unique = $cookie;
        }else{
            $unique = Str::random(7).rand(1,1000);
            Cookie::queue('cookie_id', $unique, 43200);
        }
       
         $exists = Cart::where('cookie_id',$unique)->where('product_id',$request->product_id);
        if ($exists->exists()) {

            $notification = array(
                'message' => 'Product Already Added!',
                'alert-type' => 'error'
            );
            
            return redirect()->back()->with($notification);

        }else{

            $cart = new Cart;
            $cart->cookie_id = $unique;
            $cart->product_id = $request->product_id;
            $cart->size = $request->size;
            $cart->color = $request->color;
            $cart->price = $request->price;
            $cart->quantity = $request->quantity;
            $cart->save();

             $notification = array(
            'message' => 'Product Added successfully!',
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);
        }
       
        
    }
    public function view_cart(request $request){
        $coupon_discount = 0;
        $code = $request->coupon_name;
        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        if( $code == ''){
            $cookie = Cookie::get('cookie_id');
            return view('frontend.pages.view-cart',[
                'carts' => Cart::where('cookie_id', $cookie)->get(),
            ]);
        }
        else{
            $cookie = Cookie::get('cookie_id');

           if(Coupon::where('coupon_name',  $code)->exists()){
            $carts = Cart::where('cookie_id', $cookie)->get();
                $valid_date = Coupon::where('coupon_name',  $code)->first();
               if(Carbon::now()->format('Y-m-d') <= $valid_date->coupon_validity){



                if ($coupon->lavel === 'amount') {
           
                    Session::put('coupon',[
                        'coupon_name' => $coupon->coupon_name,
                        'coupon_discount' => $coupon->coupon_discount,
                        'discount_amount' =>  $coupon->coupon_discount,
                    ]);
                    $notification = array(
                        'message' => 'Coupon Applied!',
                        'alert-type' => 'success'
                    );
                    
                    return redirect()->back()->with($notification);
                }else {
         
                    $total = 0;
                        foreach(cart() as $cat){
                        $total += $cat->product->price * $cat->quantity;
                    }
        
                    Session::put('coupon',[
                        'coupon_name' => $coupon->coupon_name,
                        'coupon_discount' => $coupon->coupon_discount,
                        'discount_amount' =>  ($total*$coupon->coupon_discount)/100,
                    ]);

                    $notification = array(
                        'message' => 'Coupon Applied!',
                        'alert-type' => 'success'
                    );
                    
                    return redirect()->back()->with($notification);

                }
               }
               else{
                $notification = array(
                    'message' => 'Invalid Coupon Code!',
                    'alert-type' => 'error'
                );
                
                return redirect()->back()->with($notification);
               }
            }
            else{
                $notification = array(
                    'message' => 'Code Not Found!',
                    'alert-type' => 'error'
                );
                
                return redirect()->back()->with($notification);
            }
            return view('frontend.pages.view-cart',[
                'carts' => Cart::where('cookie_id', $cookie)->get(),
                'coupon_discount' => $coupon_discount,
                'coupon_discount' => $code
            ]);
        }
    }

    public function CartUpdate(Request $request){

        foreach($request->cart_id as $key => $data){
            $cart = Cart::findOrFail($data);
            $cart->quantity = $request->quantity[$key];
            $cart->save();


        }
        $notification = array(
            'message' => 'Cart Updated successfully!',
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);
    }

    public function delete_from_cart($id){
        $cart = Cart::findOrFail($id);
        $cart->delete();
        $notification = array(
            'message' => 'Cart Deleted successfully!',
            'alert-type' => 'error'
        );
        
        return redirect()->back()->with($notification);
    }
    
}
