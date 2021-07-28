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
				
         	<form action="{{ route('user_password_update') }}" class="form" method="post">
                @csrf
									<div class="row">
                                    <fieldset style="margin-top: -6px; margin-left: 10px">
                                        <legend>Password Change</legend>
                                        <label>Current password</label>
                                        <input type="password" class="form-control" name="current_password">
                                        <label>New password</label>
                                        <input type="password" class="form-control" name="new_password">

                                        <label>Confirm new password</label>
                                        <input type="password" class="form-control" name="confirm_password">
                                    </fieldset>

									<button type="submit" class="btn btn-primary">Change Password</button>
								</form>
						
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