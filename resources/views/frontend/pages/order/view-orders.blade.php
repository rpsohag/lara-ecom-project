@extends('frontend.master')
@section('frontend_content')
@section('style_css')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.min.css') }}">
@endsection
@include('frontend.layouts.header')

            <div class="header-bottom has-dropdown pb-0">
                <div class="container d-flex align-items-center">
@include('frontend.layouts.menu')

                </div>
            </div>
            <!-- End HeaderBottom -->
        </header>
        <main class="main account">
			<nav class="breadcrumb-nav">
				<div class="container">
					<ul class="breadcrumb">
						<li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
						<li>Account</li>
					</ul>
				</div>
			</nav>
			<div class="page-content mt-4 mb-10 pb-6">
				<div class="container">
					<h2 class="title title-center mb-10">My Orders</h2>
					<div class="tab tab-vertical gutter-lg">
@include('frontend.pages.inc.user-menu')
						<div class="tab-content col-lg-9 col-md-8">
				
                    @if ($orders->isEmpty())
                    <h1 class="text-center mt-3">You Have No Orders</h1>
                    @else
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th class="">Order</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th class="pl-10">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td class="order-number"><a href="#">#{{ $order->tracking_code }}</a></td>
                                <td class="order-date"><time>{{ $order->created_at->format('d M Y ')}}</time></td>
                                <td class="order-status"><span>
                                    {{ $order->status }}
                                </span></td>
                                <td class="order-total"><span>৳ {{ $order->paying_amount }}</span></td>
                                <td class="order-total"><a href="{{ route('order_details', $order->id) }}" class="btn btn-primary "><i class="fas fa-eye"></i></a>
                                <a href="{{ route('order_details', $order->id) }}" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i></a></td>
                            </tr>
                              @endforeach
                        </tbody>
                    </table>
                    @endif
						
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- End Main -->
@endsection
@section('footer_js')
<script>

</script>