<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductReview;

class ProductReviewController extends Controller
{
    public function ProductReview(Request $request){
      
        if (Auth::check()) {
            if (ProductReview::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->exists()) {
                $notification = array(
                    'message' => 'Buy Another Product',
                    'alert-type' => 'error'
                );
                
                return redirect()->route('frontend.index')->with($notification);
            }
            else{
                $reviews = new ProductReview;
                $reviews->user_id = Auth::user()->id;
                $reviews->product_id = $request->product_id;
                $reviews->rating = $request->rating;
                $reviews->name = $request->name;
                $reviews->email = $request->email;
                $reviews->message = $request->message;
                $reviews->save();

                $notification = array(
                    'message' => 'Review Inserted Successfully!',
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
}
