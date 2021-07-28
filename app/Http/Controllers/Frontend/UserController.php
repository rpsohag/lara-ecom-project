<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;

class UserController extends Controller
{
    public function read_order(){
        $orders = Order::where('user_id',Auth::user()->id)->get();
        return view('frontend.pages.order.view-orders',compact('orders'));
    }

    public function  order_details($order_id){
        $order = Order::where('id',$order_id)->where('user_id',Auth::user()->id)->first();
        $orderItems = OrderDetail::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('frontend.pages.order.order-details',compact('order','orderItems'));
    }
}
