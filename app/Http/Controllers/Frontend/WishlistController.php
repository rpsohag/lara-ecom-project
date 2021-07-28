<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function add_wishlist(Request $request){
           
        if(Auth::check()){
            $exists = Wishlist::where('product_id',$request->product_id);
            if ($exists->exists()) {

                $notification = array(
                    'message' => 'Already Added to Wishlist!',
                    'alert-type' => 'error'
                );
                
                return redirect()->back()->with($notification);

            }else{
                $wishlist = new Wishlist;
                $wishlist->user_id = Auth::user()->id;
                $wishlist->product_id = $request->product_id;
                $wishlist->save();

                $notification = array(
                    'message' => 'Successfully Added to Wishlist!',
                    'alert-type' => 'success'
                );
                
                return redirect()->back()->with($notification);
            }
            
        }else{
            $notification = array(
                'message' => 'Please Login Your Account!',
                'alert-type' => 'error'
            );
            
            return redirect()->route('login')->with($notification);
        }
            
        
    }

    public function view_wishlist(){
        
        if(Auth::check()){
        $wishlists = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        return view('frontend.pages.view-wishlist',compact('wishlists'));
        }
        else{
            $notification = array(
                'message' => 'Please Login Your Account!',
                'alert-type' => 'error'
            );
            
            return redirect()->route('login')->with($notification);
        }
        
    }

    public function delete_from_wishlist($id){
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        $notification = array(
            'message' => 'Product Deleted Successfully!',
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);
    }

}
