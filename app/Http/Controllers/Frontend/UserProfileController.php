<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function user_profile(){
        $orders = Order::where('user_id',Auth::user()->id)->get();
        return view('frontend.pages.users.user-profile',compact('orders'));
    }
    public function change_password(){
        return view('frontend.pages.users.change-password');
    }
    public function user_password_update(Request $request){

        $id = Auth::user()->id;
        $db_pass = Auth::user()->password;
        $current_password = $request->current_password;
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;
        if (Hash::check($current_password,$db_pass)) {
            if ($new_password === $confirm_password) {
                User::find($id)->update([
                    'password' => Hash::make($new_password)
                ]);
                $notification = array(
                    'message' => 'Password Changed Successfully!',
                    'alert-type' => 'success'
                );
                
                return redirect()->route('change_password')->with($notification);
            }else {
                $notification = array(
                    'message' => 'Password does not mathch!',
                    'alert-type' => 'error'
                );
                
                return redirect()->route('change_password')->with($notification);
            }
        }else{
            $notification = array(
                'message' => 'Old Password Not Correct!',
                'alert-type' => 'error'
            );
            
            return redirect()->route('change_password')->with($notification);
        }
    }
}
