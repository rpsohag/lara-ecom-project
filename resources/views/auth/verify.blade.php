



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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Verify Your Email Address') }}</div>
        
                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif
        
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
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