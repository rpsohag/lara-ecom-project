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
        <div class="form-gap" style="padding-top: 15px"></div>
        <div class="container">
            <div class="row w-30 ">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="text-center">
                          <h3><i class="fa fa-lock fa-4x"></i></h3>
                          <h2 class="text-center">Forgot Password?</h2>
                          <p>You can reset your password here.</p>
                          <div class="panel-body">
            
                            <form action="{{ route('password.email') }}" id="register-form" role="form" autocomplete="off" class="form" method="post">
            @csrf
                              <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"></span>
                                  <input id="email" name="email" placeholder="email address"  class="form-control @error('email') is-invalid @enderror"  type="email">
             
                                </div>
                              </div>
                                                   @error('email')
                                  <p style="color:red;">{{ $message }}</p>
                          @enderror
                              <div class="form-group">
                                <input name="recover-submit" class="btn btn-primary" value="Reset Password" type="submit">
                              </div>
                              
                              <input type="hidden" class="hide" name="token" id="token" value=""> 
                            </form>
            
                          </div>
                        </div>
                      </div>
   
                  </div>
            </div>
        </div>
        {{-- <div class="container">
            <div class="row">
                    <div class="card">
                        <div class="card-header">{{ __('Reset Password') }}</div>
        
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
        
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div> --}}
		<!-- End Main -->
@endsection
@section('footer_js')
<script>

</script>