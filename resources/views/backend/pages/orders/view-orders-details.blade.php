
@extends('backend.layouts.master')

@section('title')
Admins - Admin Panel
@endsection

@section('style_css')
<!-- Starlight CSS -->
<link rel="stylesheet" href="{{ asset('backend/css/starlight.css') }}">
@endsection


@section('dashboard_content')
<div class="sl-pagebody">
    <div class="row row-sm">

      <div class="col-md-6 mb-4">
          <ul class="list-group">
              <li class="list-group-item active text-center">Shipping Information</li>
              <li class="list-group-item">
                  <strong>First Name: </strong>   {{ $order->shipping->first_name }}
              </li>
              <li class="list-group-item">
                  <strong>Last Name: </strong>   {{ $order->shipping->last_name }}
              </li>
              <li class="list-group-item">
                  <strong>Phone:</strong> {{ $order->shipping->shipping_phone }}
               
              </li>
              <li class="list-group-item">
                  <strong>Email:</strong> {{ $order->shipping->shipping_email }}
                 
              </li>
              <li class="list-group-item">
                  <strong>Country: {{ $order->shipping->country->country_name }}</strong> 
              </li>
              <li class="list-group-item">
                  <strong>Division: {{ $order->shipping->division->division_name }}</strong> 
              </li>
              <li class="list-group-item">
                  <strong>District:</strong> {{ $order->shipping->district->district_name }}
                 
              </li>
              <li class="list-group-item">
                  <strong>Upzilla:</strong> {{ $order->shipping->thana->upzilla_name }}
                 
              </li>

                  <li class="list-group-item">
                      <strong>Post Code:</strong> {{ $order->shipping->post_code }}
                     
                  </li>

                  <li class="list-group-item">
                      <strong>Shipping Address:</strong> {{ $order->shipping->shipping_address }}
                     
                  </li>
              <li class="list-group-item">
                  <strong>Order Date:</strong>  {{ $order->shipping->created_at }}
              </li>
              <textarea name="" id="" cols="30" rows="10" disabled style="text-align: justify">

                     {{ $order->shipping->order_note }}
                   
            </textarea>
          </ul>
      </div>

      <div class="col-md-6 float-left">
          <ul class="list-group">
              <li class="list-group-item active text-center">Order Information</li>
              <li class="list-group-item">
                  <strong>Name:</strong> {{ $order->user->name }}
              </li>
              <li class="list-group-item">
                  <strong>Email:</strong> {{ $order->user->email  }}
                 
              </li>
              <li class="list-group-item">
                  <strong>Payment By:</strong> {{ $order->payment_method }}
                  
              </li>
                <li class="list-group-item">
                  <strong>TNX Id:</strong> {{ $order->transaction_id }}
              </li> 
                  <li class="list-group-item">
                      <strong>Total Amount:</strong> {{ $order->total_amount }}
                  </li>

                  <li class="list-group-item">
                      <strong>Coupon Discount:</strong> {{ $order->discount_amount }}
                  </li>

                  <li class="list-group-item">
                      <strong>Paying Amount:</strong> {{ $order->paying_amount }}
                  </li>
              <li class="list-group-item">
                  <strong>Order Status:</strong>
                  <span class="badge badge-pill badge-primary"></span> {{ $order->status }}
              </li>
              <li class="list-group-item">
                  <strong>Payment Status:</strong>
                  <span class="badge badge-pill badge-primary"></span>{{($order->payment_status==0)?' Unpaid':'Paid'}}
              </li>

              <li class="form-group">
              </li>

          </ul>
          
              <form action="{{ route('change_order_status', $order->id) }}" method="post">
                @csrf
                  <div class="form-row">
            <div class="form-group col-md-12 col-sm-12">
                <label for="name">Change Order Status</label>
                <select class="col-sm-12 form-control" name="status">
                    @foreach ($orderstatus as $status)
                        <option @if($status->status == $order->status) selected @endif  value="{{ $status->status }}">{{ $status->status }}</option>
                          @endforeach
                    </select>
                @error('status')
            <span class="text-danger text-center">{{$message}}</span>
            @enderror
            </div>
            <input type="submit" value="Change Order Status" class="btn btn-success">
            </form>
        </div>
      </div>
      
    </div>
    <div class="col-md-6 d-block">
        <ul class="list-group">
            <li class="list-group-item active text-center">User Information</li>
            <li class="list-group-item">
                <strong>Name:</strong> {{ $order->user->name }}
            </li>
            <li class="list-group-item">
                <strong>Email:</strong> {{ $order->user->email }}
               
            </li>
        </ul>
    </div>

    <div class="row mt-3">
        <div class="col-md-12 m-auto">
          <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 5%;">SL</th>
                    <th class="text-center" style="width: 35%;">Product Name</th>
                    <th class="text-center" style="width: 10%;">Date</th>
                    <th class="text-center" style="width: 10%;">Size</th>
                    <th class="text-center" style="width: 10%;">Color</th>
                    <th class="text-center" style="width: 10%;">Price</th>
                    <th class="text-center" style="width: 10%;">Quantity</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orderItems as $item)
                  <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->created_at->format('d M Y ')}}</td>
                    <td>{{ $item->size }}</td>
                    <td>{{ $item->color }}</td>
                    <td>{{ $item->single_price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>৳ {{ $item->total_price }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
        </div>
    </div>


</div>
@endsection