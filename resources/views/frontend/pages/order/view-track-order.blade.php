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
        <main class="main order">
			<div class="page-content pt-7 pb-10 mb-10">
				<div class="container mt-8">
                    @if ($order->status == 'pending')
                    <div class="order-message mr-auto ml-auto">
						<div class="icon-box d-inline-flex align-items-center">
							<div class="icon-box-icon mb-0">
								<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
									<g>
										<path fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="bevel" stroke-miterlimit="10" d="
											M33.3,3.9c-2.7-1.1-5.6-1.8-8.7-1.8c-12.3,0-22.4,10-22.4,22.4c0,12.3,10,22.4,22.4,22.4c12.3,0,22.4-10,22.4-22.4
											c0-0.7,0-1.4-0.1-2.1"></path>
											<polyline fill="none" stroke-width="4" stroke-linecap="round" stroke-linejoin="bevel" stroke-miterlimit="10" points="
											48,6.9 24.4,29.8 17.2,22.3 	"></polyline>
									</g>
								</svg>
							</div>
							<div class="icon-box-content text-left">
								<h5 class="icon-box-title font-weight-bold mb-1">Your Order Is Now Pending</h5>
							</div>
						</div>
					</div>
                    @elseif($order->status == 'confirmed')
                    <div class="order-message mr-auto ml-auto">
						<div class="icon-box d-inline-flex align-items-center">
							<div class="icon-box-icon mb-0">
								<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
									<g>
										<path fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="bevel" stroke-miterlimit="10" d="
											M33.3,3.9c-2.7-1.1-5.6-1.8-8.7-1.8c-12.3,0-22.4,10-22.4,22.4c0,12.3,10,22.4,22.4,22.4c12.3,0,22.4-10,22.4-22.4
											c0-0.7,0-1.4-0.1-2.1"></path>
											<polyline fill="none" stroke-width="4" stroke-linecap="round" stroke-linejoin="bevel" stroke-miterlimit="10" points="
											48,6.9 24.4,29.8 17.2,22.3 	"></polyline>
									</g>
								</svg>
							</div>
							<div class="icon-box-content text-left">
								<h5 class="icon-box-title font-weight-bold mb-1">Your Order Is Now Processing</h5>
							</div>
						</div>
					</div>
                    @elseif($order->status == 'processing')
                    <div class="order-message mr-auto ml-auto">
						<div class="icon-box d-inline-flex align-items-center">
							<div class="icon-box-icon mb-0">
								<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
									<g>
										<path fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="bevel" stroke-miterlimit="10" d="
											M33.3,3.9c-2.7-1.1-5.6-1.8-8.7-1.8c-12.3,0-22.4,10-22.4,22.4c0,12.3,10,22.4,22.4,22.4c12.3,0,22.4-10,22.4-22.4
											c0-0.7,0-1.4-0.1-2.1"></path>
											<polyline fill="none" stroke-width="4" stroke-linecap="round" stroke-linejoin="bevel" stroke-miterlimit="10" points="
											48,6.9 24.4,29.8 17.2,22.3 	"></polyline>
									</g>
								</svg>
							</div>
							<div class="icon-box-content text-left">
								<h5 class="icon-box-title font-weight-bold mb-1">Your Order Is Now Processing</h5>
							</div>
						</div>
					</div>
                    @elseif($order->status == 'delevered')
                    <div class="order-message mr-auto ml-auto">
						<div class="icon-box d-inline-flex align-items-center">
							<div class="icon-box-icon mb-0">
								<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
									<g>
										<path fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="bevel" stroke-miterlimit="10" d="
											M33.3,3.9c-2.7-1.1-5.6-1.8-8.7-1.8c-12.3,0-22.4,10-22.4,22.4c0,12.3,10,22.4,22.4,22.4c12.3,0,22.4-10,22.4-22.4
											c0-0.7,0-1.4-0.1-2.1"></path>
											<polyline fill="none" stroke-width="4" stroke-linecap="round" stroke-linejoin="bevel" stroke-miterlimit="10" points="
											48,6.9 24.4,29.8 17.2,22.3 	"></polyline>
									</g>
								</svg>
							</div>
							<div class="icon-box-content text-left">
								<h5 class="icon-box-title font-weight-bold mb-1">Your Order Is Now Delevered</h5>
							</div>
						</div>
					</div>
                    @elseif($order->status == 'success')
                    <div class="order-message mr-auto ml-auto">
						<div class="icon-box d-inline-flex align-items-center">
							<div class="icon-box-icon mb-0">
								<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
									<g>
										<path fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="bevel" stroke-miterlimit="10" d="
											M33.3,3.9c-2.7-1.1-5.6-1.8-8.7-1.8c-12.3,0-22.4,10-22.4,22.4c0,12.3,10,22.4,22.4,22.4c12.3,0,22.4-10,22.4-22.4
											c0-0.7,0-1.4-0.1-2.1"></path>
											<polyline fill="none" stroke-width="4" stroke-linecap="round" stroke-linejoin="bevel" stroke-miterlimit="10" points="
											48,6.9 24.4,29.8 17.2,22.3 	"></polyline>
									</g>
								</svg>
							</div>
							<div class="icon-box-content text-left">
								<h5 class="icon-box-title font-weight-bold mb-1">Your Order delevered Success</h5>
							</div>
						</div>
					</div>
                    @elseif($order->status == 'cancel')
                    <div class="order-message mr-auto ml-auto">
						<div class="icon-box d-inline-flex align-items-center">
							<div class="icon-box-icon mb-0">
								<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
									<g>
										<path fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="bevel" stroke-miterlimit="10" d="
											M33.3,3.9c-2.7-1.1-5.6-1.8-8.7-1.8c-12.3,0-22.4,10-22.4,22.4c0,12.3,10,22.4,22.4,22.4c12.3,0,22.4-10,22.4-22.4
											c0-0.7,0-1.4-0.1-2.1"></path>
											<polyline fill="none" stroke-width="4" stroke-linecap="round" stroke-linejoin="bevel" stroke-miterlimit="10" points="
											48,6.9 24.4,29.8 17.2,22.3 	"></polyline>
									</g>
								</svg>
							</div>
							<div class="icon-box-content text-left">
								<h5 class="icon-box-title font-weight-bold mb-1">Your Order Is Canceled!</h5>
								<p class="lh-1 ls-m">Please Contact Help Center</p>
							</div>
						</div>
					</div>
                    @endif
					


				

					<a href="{{ route('frontend.index') }}" class="btn btn-icon-left btn-dark btn-back btn-rounded btn-md mb-4 mt-4"><i class="d-icon-arrow-left"></i> Back to Home</a>
				</div>
			</div>
		</main>
		<!-- End Main -->
@endsection
@section('footer_js')
<script>

</script>