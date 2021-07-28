<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Shipping;

class OrderController extends Controller
{
    public function order_store(Request $request){

                $shipping = new Shipping;
                $shipping->user_id = Auth::user()->id;
                $shipping->first_name=$request->first_name;
                $shipping->last_name=$request->last_name;
                $shipping->shipping_email=$request->shipping_email;
                $shipping->shipping_phone=$request->shipping_phone;
                $shipping->country_id=$request->country_id;
                $shipping->division_id=$request->division_id;
                $shipping->district_id=$request->district_id;
                $shipping->thana_id=$request->thana_id;
                $shipping->shipping_address=$request->shipping_address;
                $shipping->post_code=$request->post_code;
                $shipping->order_note=$request->order_note;
                $shipping->created_at=Carbon::now();
                $shipping->save();

            $data= array();
            $data['user_id']=Auth::user()->id;
            $data['total_amount']=$request->total_amount;
            $data['paying_amount']=$request->paying_amount;
            $data['tracking_code']=mt_rand(100000,999999);
            $data['payment_method']=$request->payment_method;
            $data['transaction_id']=$request->transaction_id;
            $data['shipping_id']=$shipping->id;
            $data['created_at']=Carbon::now();
             if (Session::has('coupon')) {
                  $data['discount_amount']= Session::get('coupon')['discount_amount'];
             }else{
                    $data['discount_amount']= 0 ;
            }
    
         $order_id= DB::table('orders')->insertGetId($data);
        
            // insert shipping details table
        

        
                //insert data into orderdeatils
                $content= Cart();
                $details=array();
                foreach ($content as $row) {
                    $details['order_id']= $order_id;
                    $details['product_name']=$row->product->product_name;
                    $details['color']=$row->color;
                    $details['size']=$row->size;
                    $details['quantity']=$row->quantity;
                    $details['single_price']=$row->price;
                    $details['total_price']=$row->quantity * $row->price;
                    $details['created_at']=Carbon::now();
                    DB::table('order_details')->insert($details);
                    $row->delete();
                }
               
                
                 if (Session::has('coupon')) {
                  Session::forget('coupon');
             }
        
             $notification = array(
                'message' => 'Order Success!',
                'alert-type' => 'success'
            );
            
            return redirect()->route('order_success')->with($notification);
        
    }


    public function order_success(){
             return view('frontend.pages.order-success'); 
   
        }
        
    



}
