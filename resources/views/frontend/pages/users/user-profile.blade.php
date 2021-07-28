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
					<h2 class="title title-center mb-10">My Account</h2>
					<div class="tab tab-vertical gutter-lg">
@include('frontend.pages.inc.user-menu')
						<div class="tab-content col-lg-9 col-md-8">
							<div class="tab-pane active" id="dashboard">
								<p class="mb-0">
									Hello <span>{{ Auth::user()->name }}</span>
									<br>
									(<a class="text-primary" href="{{ route('logout') }}"
										onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>)
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									 @csrf
								</form>
								</p>
								<p class="mb-8">
									From your account dashboard you can view your <a href="{{ route('read_order') }}"
										class="link-to-tab text-primary">recent orders</a>, manage your shipping and billing
										addresses,<br>and edit your password and account details</a>.
								</p>
								<a href="{{ route('frontend.index') }}" class="btn btn-dark btn-rounded">Go To Shop<i class="d-icon-arrow-right"></i></a>
							</div>
							<div class="tab-pane" id="downloads">
								<p class="mb-4 text-body">No downloads available yet.</p>
								<a href="#" class="btn btn-primary btn-link btn-underline">Browser Products<i class="d-icon-arrow-right"></i></a>
							</div>
							<div class="tab-pane" id="address">
								<p class="mb-2">The following addresses will be used on the checkout page by default.
								</p>
								<div class="row">
									<div class="col-sm-6 mb-4">
										<div class="card card-address">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Billing Address</h5>
												<p>John Doe<br>
                                                    Riode Company<br>
                                                    Steven street<br>
                                                    El Carjon, CA 92020
												</p>
												<a href="#" class="btn btn-link btn-secondary btn-underline">Edit <i
														class="far fa-edit"></i></a>
											</div>
										</div>
									</div>
									<div class="col-sm-6 mb-4">
										<div class="card card-address">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Shipping Address</h5>
												<p>You have not set up this type of address yet.</p>
												<a href="#" class="btn btn-link btn-secondary btn-underline">Edit <i
														class="far fa-edit"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="account">
								<form action="#" class="form">
									<div class="row">
										<div class="col-sm-6">
											<label>First Name *</label>
											<input type="text" class="form-control" name="first_name" required="">
										</div>
										<div class="col-sm-6">
											<label>Last Name *</label>
											<input type="text" class="form-control" name="last_name" required="">
										</div>
									</div>

									<label>Display Name *</label>
									<input type="text" class="form-control mb-0" name="display_name" required="">
									<small class="d-block form-text mb-7">This will be how your name will be displayed
										in the account section and in reviews</small>

									<label>Email Address *</label>
									<input type="email" class="form-control" name="email" required="">
                                    <fieldset>
                                        <legend>Password Change</legend>
                                        <label>Current password (leave blank to leave unchanged)</label>
                                        <input type="password" class="form-control" name="current_password">

                                        <label>New password (leave blank to leave unchanged)</label>
                                        <input type="password" class="form-control" name="new_password">

                                        <label>Confirm new password</label>
                                        <input type="password" class="form-control" name="confirm_password">
                                    </fieldset>

									<button type="submit" class="btn btn-primary">SAVE CHANGES</button>
								</form>
							</div>
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