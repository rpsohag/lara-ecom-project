<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrderController extends Controller
{
    public function view_order(){
        $orders = Order::orderBy('created_at','DESC')->get();
        return view('backend.pages.orders.view-orders',compact('orders'));
    }
    public function view_order_details($order_id){
        $order = Order::with('user','shipping')->where('id',$order_id)->first();
        $orderItems = OrderDetail::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        $orderstatus = OrderStatus::latest()->get();
        return view('backend.pages.orders.view-orders-details',compact('order','orderItems','orderstatus'));
    }
    public function change_order_status(Request $request, $id){
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        return Redirect()->back()->with('success','Status Changed Successfully');
    }
}
