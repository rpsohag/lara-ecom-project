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
                            <a class="nav-link active border-no lh-1 ls-normal" href="#signin">Login</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="signin">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="singin-email" name="email" placeholder="Username or Email Address *" required />
                                @error('email')
                                        <p style="color:red;">{{ $message }}</p>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="singin-password" name="password" placeholder="Password *"
                                        required />
                                @error('password')
                                        <p style="color:red;">{{ $message }}</p>
                                @enderror
                                </div>
                                <div class="form-footer">
                                    <div class="form-checkbox">
                                        <input type="checkbox" class="custom-checkbox" id="signin-remember"
                                            name="remember"{{ old('remember') ? 'checked' : '' }} />
                                        <label class="form-control-label" for="signin-remember">Remember
                                            me</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="lost-link">Lost your password?</a>
                                    @endif
                                </div>
                                <button class="btn btn-dark btn-block btn-rounded" type="submit">Login</button>
                            </form>
                            <div class="form-choice text-center">
                                <label class="ls-m">or Login With</label>
                                <div class="social-links">
                                    <a href="#" class="social-link social-google fab fa-google border-no"></a>
                                    <a href="#" class="social-link social-facebook fab fa-facebook-f border-no"></a>
                                    <a href="#" class="social-link social-twitter fab fa-twitter border-no"></a>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                               Don't Have an account?<a href="{{ route('register') }}"> Sign Up</a>
                            </div>
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