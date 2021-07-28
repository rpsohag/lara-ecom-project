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
					<h2 class="title title-center mb-10">Order Details</h2>
                    <table class="shop-table wishlist-table">
						<thead>
							<tr>
								<th class="text-center" style="width: 30%;">Product Name</th>
								<th class="text-center" style="width: 10%;">Date</th>
								<th class="text-center" style="width: 10%;">Size</th>
								<th class="text-center" style="width: 10%;">Color</th>
								<th class="text-center" style="width: 10%;">Price</th>
								<th class="text-center" style="width: 10%;">Quantity</th>
								<th class="text-center" style="width: 10%;">Discount</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody class="wishlist-items-wrapper">
                            @foreach ($orderItems as $item)
							<tr>
								<td class="">
									<a href="">{{ $item->product_name }}</a>
								</td>
								<td class="">
									{{ $item->created_at->format('d M Y ')}}
								</td>
								<td class="">
									{{ $item->size }}
								</td>
								<td class="">
									{{ $item->color }}
								</td>
								<td class="">
									{{ $item->single_price }}
								</td>
								<td class="">
									{{ $item->quantity }}
								</td>
								<td class="">
									{{ $order->discount_amount }}
								</td>
								<td class="">
                                    ৳ {{ $item->total_price }}
								</td>
							</tr>
                    @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- End Main -->
@endsection
@section('footer_js')
<script>

</script>