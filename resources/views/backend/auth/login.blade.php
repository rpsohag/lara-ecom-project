@extends('backend.auth.auth_master')

@section('auth_title')
    Login | Admin Panel
@endsection

@section('auth-content')
     <!-- login area start -->

  
            <div class="login-box">
                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

                        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
                          <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">starlight <span class="tx-info tx-normal">admin</span></div>
                          <div class="tx-center mg-b-60">Professional Admin Template Design</div>
                  
                          <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Enter your Email">
                          </div><!-- form-group -->
                          <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Enter your password">
                            <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
                          </div><!-- form-group -->
                          <button type="submit" class="btn btn-info btn-block">Sign In</button>
                  
                          <div class="mg-t-60 tx-center">Not yet a member? <a href="page-signup.html" class="tx-info">Sign Up</a></div>
                        </div><!-- login-wrapper -->
                      </div><!-- d-flex -->
                </form>
            </div>
     

    <!-- login area end -->
@endsection