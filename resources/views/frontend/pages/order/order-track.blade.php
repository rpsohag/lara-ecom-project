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
        <div class="login-popup container">
            <div class="form-box row">
                <div class="tab tab-nav-simple tab-nav-boxed form-tab">
                    <ul class="nav nav-tabs nav-fill align-items-center border-no justify-content-center mb-5" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active border-no lh-1 ls-normal" href="#signin">Track Your Order Now</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="signin">
                            <form method="POST" action="{{ route('OrderTrackView') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control @error('order_tracking_code') is-invalid @enderror" name="order_tracking_code" placeholder="Input Order tracking code" required />

                                </div>

                                <button class="btn btn-dark btn-block btn-rounded" type="submit">Track Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- End Main -->
@endsection
@section('footer_js')
<script>

</script>