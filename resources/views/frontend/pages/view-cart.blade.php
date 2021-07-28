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
        <main class="main cart">
			<div class="page-content pt-7 pb-10">
				<div class="step-by pr-4 pl-4">
                    <h3 class="title title-simple title-step active"><a href="{{ route('view_cart') }}">1. Shopping Cart</a></h3>
                    <h3 class="title title-simple title-step"><a href="{{ route('view_checkout') }}">2. Checkout</a></h3>
				</div>
				@php
				$grand_total = 0;
			@endphp
 <form action="{{ route('CartUpdate') }}" method="post">
	@csrf
				<div class="container mt-7 mb-2">
				@if ($carts->isEmpty())
					<h3 class="text-center">No product on your cart</h3>
						
					@else
					<div class="row">
						<div class="col-lg-8 col-md-12 pr-lg-4">
							<table class="shop-table cart-table">
								<thead>
									<tr>
										<th><span>Image</span></th>
										<th>Product Name</th>
										<th><span>Price</span></th>
										<th><span>quantity</span></th>
										<th>Subtotal</th>
									</tr>
								</thead>
								<tbody>
                                @foreach($carts as $cart_item)

								@php
								$grand_total += ($cart_item->quantity * $cart_item->product->price)
							@endphp
									<tr>
										<td class="product-thumbnail">
											<figure>
												<a href="product-simple.html">
													<img src="{{ asset('images/product/thumbnail/'. $cart_item->product->thumbnail) }}" width="100" height="100"
														alt="product">
												</a>
											</figure>
										</td>
										<td class="product-name">
											<div class="product-name-section">
												<a href="product-simple.html">{{ $cart_item->product->product_name }}</a>
											</div>
										</td>
										<td class="product-subtotal">
											<span class="amount unit_price{{ $cart_item->id }}" data-unit{{ $cart_item->id }}="{{ $cart_item->product->price }}">৳ {{ $cart_item->product->price }}</span>
										</td>
										
										<input type="hidden" name="cart_id[]" value="{{ $cart_item->id }}">
										{{-- <td class="product-quantity">
											<div class="input-group">
												<button class="quantity-minus d-icon-minus qtyminus{{ $cart_item->id }}"></button>
												<input name="quantity[]" class="quantity form-control qty_quantity{{ $cart_item->id }}" type="number" value="{{ $cart_item->quantity }}">
												<button class="quantity-plus d-icon-plus qtyplus{{ $cart_item->id }}"></button>
											</div>
										</td> --}}
										{{-- <td class="product-quantity">
											<div class="input-group">
												<span class="input-group-btn">
													<button type="button" style="padding:15px;" class="btn btn-default btn-number quantity-minus d-icon-minus" disabled="disabled" data-type="minus" data-field="quantity[]">
														<span class="glyphicon glyphicon-minus"></span>
													</button>
												</span>
												<input type="text" name="quantity[]" class="quantity form-control input-number" value="{{ $cart_item->quantity }}" min="1" max="10">
												<span class="input-group-btn">
													<button type="button" style="padding:15px;" class="btn btn-default btn-number quantity-plus d-icon-plus" data-type="plus" data-field="quantity[]">
														<span class="glyphicon glyphicon-plus"></span>
													</button>
												</span>
											</div>
										</td> --}}

										<td class="cart-product-quantity product-quantity" style="margin-left: 8px">
											<div class="input-group quantity">
												<span>
													<button type="button" style="padding:15px;" class="btn btn-default btn-number quantity-minus d-icon-minus input-group-prepend decrement-btn input-group-btn">
														<span class="glyphicon glyphicon-minus"></span>
													</button>
												</span>
												<input type="text" name="quantity[]" class="qty-input form-control" maxlength="2" max="10" value="{{ $cart_item->quantity }}" style="width: 40px;">
											<span>
												<button type="button" style="padding:15px;" class="btn btn-default btn-number quantity-plus d-icon-plus input-group-append increment-btn">
													<span class="glyphicon glyphicon-plus"></span>
												</button>
											</span>
											</div>
										</td>
									
										<td class="product-price">
											<span class="amount total_unit{{ $cart_item->id }}" >৳ {{ $cart_item->quantity * $cart_item->product->price }}</span>
										</td>
										<td class="product-close">
											<a href="{{ route('delete_from_cart', $cart_item->id) }}" class="product-remove" title="Remove this product">
												<i class="fas fa-times"></i>
											</a>
										</td>
									</tr>
									
							@endforeach
								</tbody>
							</form>
							</table>
							<div class="cart-actions mb-6 pt-4">
								<a href="shop.html" class="btn btn-dark btn-md btn-rounded btn-icon-left mr-4 mb-4"><i class="d-icon-arrow-left"></i>Continue Shopping</a>
								<button type="submit" class="btn btn-outline btn-dark btn-md btn-rounded">Update Cart</button>
							</div>
			
							<form action="{{ route('view_cart') }}" method="get">
								@csrf
							<div class="cart-coupon-box mb-8">
								<h4 class="title coupon -title text-uppercase ls-m">Coupon Discount</h4>
								<input type="text" name="coupon_name" class="input-text form-control text-grey ls-m mb-4"
									id="coupon_code" value="" placeholder="Enter coupon code here...">
								<button type="submit" class="btn btn-md btn-dark btn-rounded btn-outline">Apply Coupon</button>
							</div>
							</form>
						</div>
						<aside class="col-lg-4 sticky-sidebar-wrapper">
							<div class="sticky-sidebar" data-sticky-options="{'bottom': 20}">
								<div class="summary mb-4">
									<h3 class="summary-title text-left">Cart Totals</h3>
									<table class="shipping">
										@foreach(cart() as $cart_item)
										<tr>
											<td class="product-name">{{ Str::limit($cart_item->product->product_name, 25,'....') }}<span
													class="product-quantity">×&nbsp;{{ $cart_item->quantity }}</span></td>
											<td class="product-total text-body">৳ {{ $cart_item->quantity * $cart_item->product->price }}</td>
										</tr>
										@endforeach
										<tr class="summary-subtotal">
											<td>
												<h4 class="summary-subtitle">SubTotal Amount</h4>
											</td>
											<td class="summary-subtotal-price pb-0">৳ {{ $grand_total }}
											</td>
										</tr>
										<tr class="summary-subtotal">
											@php
											if(Session::has('coupon')){
												$coupon_discount = Session::get('coupon')['discount_amount'];
											}else {
												$coupon_discount = 0;
											}
										@endphp
											<td>
												<h4 class="summary-subtitle">Coupon Discount</h4>
											</td>
											<td class="summary-subtotal-price pb-0 pt-0">৳ {{ $coupon_discount }}
											</td>
										</tr>
							
										<tr class="summary-total">
											<td class="pb-0">
												<h4 class="summary-subtitle">Total</h4>
											</td>
											<td class="pt-0 pb-0" style="">
												<p class="summary-total-price" style="font-size: 16px">৳ {{ $grand_total - $coupon_discount  }}</p>
											</td>
										</tr>
									</table>
								
									
									<a href="{{ route('view_checkout') }}" class="btn btn-dark btn-rounded btn-checkout">Proceed to checkout</a>
								</div>
							</div>
						</aside>
					</div>
					
				@endif
				</div>
			</div>
		</main>
@endsection
@section('footer_js')
<script src="{{ asset('frontend/js/custom.js') }}"></script>
<script>
 $(document).ready(function(){
            @foreach($carts as $car)
            
            $('.qtyminus{{ $car->id }}').click(function(e){
				e.preventDefault();
                let qty_quantity = $('.qty_quantity{{ $car->id }}').val();
				
                let unit_price = $('.unit_price{{ $car->id }}').attr('data-unit{{ $car->id }}');
                $('.total_unit{{ $car->id }}').html('৳' + qty_quantity * unit_price);
                let minus_sub_total = (qty_quantity * unit_price);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                  url: "{{ url('quantity/update') }}",
                  method: 'post',
                  data: {
                     id: '{{ $car->id }}',
                     qty_quantity: qty_quantity,
                    
                  },
                  success: function(result){
                     console.log(result);
                  }
                });
               

                let c = document.querySelectorAll(".tuira")
                let arr = Array.from(c)
                let sum=0;
                arr.map(item=>{
                    
                    sum += parseInt(item.innerHTML)
                    $('.hasan').html(sum);
                    console.log(typeof parseInt(item.innerHTML))
                })
                
                
          
            
            })
            $('.qtyplus{{ $car->id }}').click(function(){
                let qty_quantity = $('.qty_quantity{{ $car->id }}').val();
                let unit_price = $('.unit_price{{ $car->id }}').attr('data-unit{{ $car->id }}');
                $('.total_unit{{ $car->id }}').html(qty_quantity * unit_price);
                let plus_sub_total = (qty_quantity * unit_price);
               
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                  url: "{{ url('quantity/update') }}",
                  method: 'post',
                  data: {
                     id: '{{ $car->id }}',
                     qty_quantity: qty_quantity,
                    
                  },
                  success: function(result){
                     console.log(result);
                  }
                });
                
                let c = document.querySelectorAll(".tuira")
                let arr= Array.from(c)
                let sum=0;
                arr.map(item=>{
                    sum += parseInt(item.innerHTML)
                    $('.hasan').html(sum);
                    console.log(sum)
                })
            }) 
            @endforeach
        })
</script>
<script>

</script>
@endsection