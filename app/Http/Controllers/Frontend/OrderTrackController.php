<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderTrackController extends Controller
{
    public function OrderTrack(){
        return view('frontend.pages.order.order-track');
    }
    public function OrderTrackView(Request $request){
        $order = Order::where('tracking_code',$request->order_tracking_code)->first();
        if ($order) {
            return view('frontend.pages.order.view-track-order',compact('order'));
        }else {
            $notification = array(
                'message' => 'Invalid Order Tracking Number',
                'alert-type' => 'error'
            );
            
            return redirect()->back()->with($notification);
        }

       
    }
}
