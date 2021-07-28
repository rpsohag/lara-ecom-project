<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Support\Facades\Cookie; 
use App\Models\Ship_Country;
use App\Models\Ship_District;
use App\Models\Ship_Division;
use App\Models\Ship_Upzilla;

class CheckoutController extends Controller
{
    public function view_checkout(){
        if (Auth::check()) {
            if (Cart()->count() > 0) {
                $cookie = Cookie::get('cookie_id');
                $carts = Cart::where('cookie_id', $cookie)->get();
                $countries = Ship_Country::orderBy('country_name','asc')->get();
                return view('frontend.pages.checkout',compact('carts','countries'));
            }else {
                $notification = array(
                    'message' => 'Shopping First!',
                    'alert-type' => 'error'
                );
                
                return redirect()->route('frontend.index')->with($notification);
            }
            
        }else {
            $notification = array(
                'message' => 'Please Login Your Account!',
                'alert-type' => 'error'
            );
            
            return redirect()->route('login')->with($notification);
        }
        
    }

    function GetDivision($id){
        $divisions = Ship_Division::where('country_id', $id)->get();

        return response()->json($divisions);
    }

    function GetDistrict($district_id){
        $districts = Ship_District::where('division_id', $district_id)->get();

        return response()->json($districts);
    }
    function GetThana($thana_id){
        $thana = Ship_Upzilla::where('district_id', $thana_id)->get();

        return response()->json($thana);
    }
}
