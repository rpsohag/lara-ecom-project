@extends('frontend.master')
@section('frontend_content')
@section('style_css')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.min.css') }}">
<style>
	#trnxid_box {
	  width: 100%;
	  padding: 50px 0;
	  text-align: center;
	  background-color: lightblue;
	  margin-top: 20px;
	}
	</style>
@endsection
@include('frontend.layouts.header')

            <div class="header-bottom has-dropdown pb-0">
                <div class="container d-flex align-items-center">
@include('frontend.layouts.menu')

                </div>
            </div>
            <!-- End HeaderBottom -->
        </header>

        {{-- php code start --}}
        @php
        $grand_total = 0;
        @endphp
 
        {{-- php code end --}}

        
		<main class="main checkout">
			<div class="page-content pt-7 pb-10 mb-10">
				<div class="step-by pr-4 pl-4">
					<h3 class="title title-simple title-step"><a href="{{ route('view_cart') }}">1. Shopping Cart</a></h3>
					<h3 class="title title-simple title-step active"><a href="{{ route('view_checkout') }}">2. Checkout</a></h3>
				</div>
				<div class="container mt-7">
					<form action="{{ route('order_store') }}" class="form" method="post">
						@csrf
						<div class="row">
							<div class="col-lg-7 mb-6 mb-lg-0 pr-lg-4">
								<h3 class="title title-simple text-left text-uppercase">Billing Details</h3>
								<div class="row">
									<div class="col-xs-6">
										<label>First Name *</label>
										<input type="text" class="form-control" name="first_name"/>
									</div>
									<div class="col-xs-6">
										<label>Last Name *</label>
										<input type="text" class="form-control" name="last_name"/>
									</div>
								</div>
								<label>Email-address</label>
								<input type="email" class="form-control" name="shipping_email"/>
								<label>Phone Number</label>
								<input type="phone" class="form-control" name="shipping_phone" />
								<label>Country / Region *</label>
								<div class="select-box">
									<select name="country_id" class="form-control" id="country_id">
										<option value="">Select One</option>
											@foreach ($countries as $country)
											<option value="{{ $country->id }}" >{{ $country->country_name }}</option>
											@endforeach
										</select>
									</div>
								<div class="row">
									<div class="col-xs-6">
										<label>Division *</label>
										<select name="division_id" class="form-control" id="division_id">
										
										</select>
									</div>
									<div class="col-xs-6">
										<label>District *</label>
										<select name="district_id" class="form-control" id="district_id">
									
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<label>Upzilla/Thana *</label>
										<select name="thana_id" class="form-control" id="thana_id">
									
										</select>
									</div>
									<div class="col-xs-6">
										<label>Post Code *</label>
										<input type="text" class="form-control" name="post_code"/>
									</div>
								</div>
								<label>Street Address *</label>
								<input type="text" class="form-control" name="shipping_address"
									placeholder="House number and street name" />
								<label>Order Notes (Optional)</label>
								<textarea name="order_note" class="form-control pb-2 pt-2 mb-0" cols="30" rows="5"
									placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
							</div>
							<aside class="col-lg-5 sticky-sidebar-wrapper">
								<div class="sticky-sidebar mt-1" data-sticky-options="{'bottom': 50}">
									<div class="summary pt-5">
										<h3 class="title title-simple text-left text-uppercase">Your Order</h3>
										<table class="order-table">
											<thead>
												<tr>
													<th>Product</th>
													<th></th>
												</tr>
											</thead>
											<tbody>

                                                @foreach($carts as $cart)
												<tr>
													<td class="product-name">{{ Str::limit($cart->product->product_name, 30,'....') }}<span
															class="product-quantity">×&nbsp;{{ $cart->quantity }}</span></td>
													<td class="product-total text-body">৳ {{ $cart->quantity * $cart->product->price }}</td>
												</tr>
                                       
                                               	@php
                                                    $grand_total += ($cart->quantity * $cart->product->price)
                                                @endphp
                        
                                                @endforeach

												<tr class="summary-subtotal">
													<td>
														<h4 class="summary-subtitle">Subtotal</h4>
													</td>
													<td class="summary-subtotal-price pb-0 pt-0">৳ {{ $grand_total }}
													</td>
												</tr>
												<tr class="summary-subtotal">

                                                {{-- php code start --}}
                                      


                                                    @php
                                                    if(session('coupon')){
                                                        $coupon_discount = Session::get('coupon')['discount_amount'];
                                                    }else {
                                                        $coupon_discount = 0;
                                                    }
                                                @endphp
                                                {{-- php code end --}}
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
													<td class=" pt-0 pb-0">
														<p class="summary-total-price ls-s text-primary">৳ {{ $grand_total - $coupon_discount  }}</p>
													</td>
												</tr>
											</tbody>
										</table>
                    {{-- orders table details --}}

                    <input type="hidden" name="total_amount" id="" value="{{ $grand_total }}">
					<input type="hidden" name="discount_amount" value="{{ $coupon_discount }}">
                    <input type="hidden" name="paying_amount" value="{{ $grand_total - $coupon_discount  }}">
                    {{-- orders table details --}}

                                       
										<div class="payment accordion radio-type">
												<h4 class="summary-subtitle ls-m pb-3">Payment Methods</h4>
										
												<div class="custom-radio">
													<input type="radio" id="local_pickup"
														name="payment_method" class="custom-control-input" value="cod">
													<label class="custom-control-label"
														for="local_pickup">Cash On Delevery</label>
												</div>

												<div class="custom-radio">
													<input type="radio" id="local_pickup2"
														name="payment_method" class="custom-control-input trnx_click" value="bkash">
													<label class="custom-control-label"
														for="local_pickup2">Bkash</label>
												</div>
												<div class="trnxid_box">
													<input type="text" placeholder="Please Enter TrnxId" name="transaction_id">
												</div>
										</div>
                                        


										<div class="form-checkbox mt-4 mb-5">
											<input type="checkbox" class="custom-checkbox" id="terms-condition"
												name="terms_condition" value="1"/>
											<label class="form-control-label" for="terms-condition">
												I have read and agree to the website <a href="#">terms and conditions </a>*
											</label>
										</div>
										<button type="submit" class="btn btn-dark btn-rounded btn-order">Place Order</button>
									</div>
								</div>
							</aside>
						</div>
					</form>
				</div>
			</div>
		</main>
		<!-- End Main -->
@endsection
@section('footer_js')
<script src="{{ asset('frontend/js/custom.js') }}"></script>
<script>
 $(document).ready(function(){

	$('#country_id').change(function(){
        var countryID = $(this).val(); 
        if(countryID){
            $.ajax({ 
            type:"GET",
            url:"{{url('api/get-division-list')}}/"+countryID,
            success:function(res){               
                if(res){
                    $("#division_id").empty();
                    $("#division_id").append('<option>Select Division</option>');
                    $.each(res,function(key,value){
                        $("#division_id").append('<option value="'+value.id+'">'+value.division_name+'</option>');
                    });
            
                }else{
                $("#division_id").empty();
                $("#district_id").empty();
                $("#thana_id").empty();
                }
            }
            });
        }else{
            $("#division_id").empty();
            $("#district_id").empty();
            $("#thana_id").empty();
        }      
    });
        $('#division_id').on('change',function(){
        var divisionID = $(this).val();    
        if(divisionID){
            $.ajax({
            type:"GET",
            url:"{{url('api/get-district-list')}}/"+divisionID,
            success:function(res){               
                if(res){
                    $("#district_id").append('<option>Select District</option>');
                    $.each(res,function(key,value){
                        $("#district_id").append('<option value="'+value.id+'">'+value.district_name+'</option>');
                    });
            
                }else{
					$("#division_id").empty();
            $("#district_id").empty();
            $("#thana_id").empty();
                }
            }
            });
        }else{
            $("#division_id").empty();
            $("#district_id").empty();
            $("#thana_id").empty();
        }
        
   });
        $('#district_id').on('change',function(){
        var thanaID = $(this).val();    
        if(thanaID){
            $.ajax({
            type:"GET",
            url:"{{url('api/get-thana-list')}}/"+thanaID,
            success:function(res){               
                if(res){
                    $("#thana_id").empty();
                    $("#thana_id").append('<option>Select Upzilla</option>');
                    $.each(res,function(key,value){
                        $("#thana_id").append('<option value="'+value.id+'">'+value.upzilla_name+'</option>');
                    });
            
                }else{
					$("#thana_id").empty();
            $("#district_id").empty();
            $("#thana_id").empty();
                }
            }
            });
        }else{
            $("#division_id").empty();
            $("#district_id").empty();
            $("#thana_id").empty();
        }
        
   });

	$( ".trnx_click" ).click(function() {
			alert("Please Fill Up the TrnxId Box!");
	});
        })
</script>
<script>

</script>
@endsection