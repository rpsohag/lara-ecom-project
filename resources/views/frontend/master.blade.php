
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>BooroBazar - Online shop</title>

    <meta name="keywords" content="BooroBazar - Online shop" />
    <meta name="description" content="BooroBazar - Online shop">
    <meta name="author" content="rpsoftwares">

    <!-- Favicon -->
@include('frontend.layouts.styles')
</head>

<body class="home">


@yield('frontend_content')
        <!-- End Main -->
        <footer class="footer">
            <div class="container">
                <div class="footer-top">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <a href="{{ route('frontend.index') }}" class="logo-footer">
                                <img src="{{ asset('frontend/images/logo-footer.png') }}" alt="logo-footer" width="154"
                                    height="43" />
                            </a>
                            <!-- End FooterLogo -->
                        </div>
                        <div class="col-lg-9">
                            <div class="widget widget-newsletter form-wrapper form-wrapper-inline">
                                <div class="newsletter-info mx-auto mr-lg-2 ml-lg-4">
                                    <h4 class="widget-title">Subscribe to our Newsletter</h4>
                                    <p>Get all the latest information, Sales and Offers.</p>
                                </div>
                                <form action="#" class="input-wrapper input-wrapper-inline">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Email address here..." required />
                                    <button class="btn btn-primary btn-rounded btn-md ml-2" type="submit">subscribe<i
                                            class="d-icon-arrow-right"></i></button>
                                </form>
                            </div>
                            <!-- End Newsletter -->
                        </div>
                    </div>
                </div>
                <!-- End FooterTop -->
                <div class="footer-middle">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="widget widget-info">
                                <h4 class="widget-title">Contact Info</h4>
                                <ul class="widget-body">
                                    <li>
                                        <label>Phone:</label>
                                        <a href="tel:#">Toll Free (123) 456-7890</a>
                                    </li>
                                    <li>
                                        <label>Email:</label>
                                        <a href="mailto:mail@riode.com">riode@mail.com</a>
                                    </li>
                                    <li>
                                        <label>Address:</label>
                                        <a href="#">123 Street, City, Country</a>
                                    </li>
                                    <li>
                                        <label>WORKING DAYS / HOURS:</label>
                                    </li>
                                    <li>
                                        <a href="#">Mon - Sun / 9:00 AM - 8:00 PM</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="widget ml-lg-4">
                                <h4 class="widget-title">About Us</h4>
                                <ul class="widget-body">
                                    <li>
                                        <a href="about-us.html">About Us</a>
                                    </li>
                                    <li>
                                        <a href="#">Order History</a>
                                    </li>
                                    <li>
                                        <a href="#">Returns</a>
                                    </li>
                                    <li>
                                        <a href="#">Custom Service</a>
                                    </li>
                                    <li>
                                        <a href="#">Terms &amp; Condition</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="widget ml-lg-4">
                                <h4 class="widget-title">My Account</h4>
                                <ul class="widget-body">
                                    <li>
                                        <a href="#">Sign in</a>
                                    </li>
                                    <li>
                                        <a href="cart.html">View Cart</a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html">My Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="#">Track My Order</a>
                                    </li>
                                    <li>
                                        <a href="#">Help</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="widget widget-instagram">
                                <h4 class="widget-title">Instagram</h4>
                                <figure class="widget-body row">
                                    <div class="col-3">
                                        <img src="{{ asset('frontend/images/instagram/01.jpg') }}" alt="instagram 1" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="{{ asset('frontend/images/instagram/08.jpg') }}" alt="instagram 8" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="{{ asset('frontend/images/instagram/07.jpg') }}" alt="instagram 7" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="{{ asset('frontend/images/instagram/06.jpg') }}" alt="instagram 6" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="{{ asset('frontend/images/instagram/05.jpg') }}" alt="instagram 5" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="{{ asset('frontend/images/instagram/04.jpg') }}" alt="instagram 4" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="{{ asset('frontend/images/instagram/03.jpg') }}" alt="instagram 3" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="{{ asset('frontend/images/instagram/02.jpg') }}" alt="instagram 2" width="64" height="64" />
                                    </div>
                                </figure>
                            </div>
                            <!-- End Instagram -->
                        </div>
                    </div>
                </div>
                <!-- End FooterMiddle -->
                <div class="footer-bottom">
                    <div class="footer-left">
                        <figure class="payment">
                            <img src="{{ asset('frontend/images/payment.png') }}" alt="payment" width="159" height="29" />
                        </figure>
                    </div>
                    <div class="footer-center">
                        <p class="copyright">BooroBazar &copy; 2021. All Rights Reserved</p>
                    </div>
                    <div class="footer-right">
                        <div class="social-links">
                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                            <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                        </div>
                    </div>
                </div>
                <!-- End FooterBottom -->
            </div>
        </footer>
        <!-- End Footer -->
    </div>
    <!-- Sticky Footer -->
    <div class="sticky-footer sticky-content fix-bottom">
        <a href="{{ route('frontend.index') }}" class="sticky-link active">
            <i class="d-icon-home"></i>
            <span>Home</span>
        </a>
        <a href="{{ route('view_wishlist') }}" class="sticky-link">
            <i class="d-icon-heart"></i>
            <span>Wishlist</span>
        </a>
        <a href="{{ route('user_profile') }}" class="sticky-link">
            <i class="d-icon-user"></i>
            <span>Account</span>
        </a>
        <div class="header-search hs-toggle dir-up">
            <a href="#" class="search-toggle sticky-link">
                <i class="d-icon-search"></i>
                <span>Search</span>
            </a>
            <form action="{{route('product.search')}}" method="get" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off"
                    placeholder="Search your keyword..." required />
                <button class="btn btn-search" type="submit">
                    <i class="d-icon-search"></i>
                </button>
            </form>
        </div>
    </div>
    <!-- Scroll Top -->
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>

    <!-- MobileMenu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay">
        </div>
        <!-- End Overlay -->
        <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
        <!-- End CloseButton -->
        <div class="mobile-menu-container scrollable">
            <form action="#" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off"
                    placeholder="Search your keyword..." required />
                <button class="btn btn-search" type="submit">
                    <i class="d-icon-search"></i>
                </button>
            </form>
            <!-- End Search Form -->
            <div class="tab tab-nav-simple tab-nav-boxed form-tab mt-5">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#menu">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#categories">Menu</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="menu">
                        @php
                        $categories = App\Models\Category::where('status',1)->orderBy('category_name','asc')->get();
                        @endphp
                        <ul class="mobile-menu">

                            <li><a href="demo22-shop.html" class="menu-title">Browse Our Categories</a></li>
                            @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('frontend.product.list',$category->slug) }}"><i class="{{ $category->icon }}"></i>{{ $category->category_name }}</a>
                            </li>
                            @endforeach
                        </ul>

                  
                    </div>
                    <div class="tab-pane" id="categories">
                        <ul class="mobile-menu mmenu-anim">

                            <li class="active">
                                <a href="{{ route('frontend.index') }}">Home</a>
                            </li>
                            <li class="">
                                <a href="{{ route('frontend.blog') }}">Blog</a>
                            </li>
                            <li class="">
                                <a href="{{ route('OrderTrack') }}">Track Order</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="newsletter-popup mfp-hide" id="newsletter-popup" style="background-image: url({{ asset('frontend/images/newsletter-popup.jpg') }})">
        <div class="newsletter-content">
            <h4 class="text-uppercase text-dark">Up to <span class="text-primary">20% Off</span></h4>
            <h2 class="font-weight-semi-bold">Sign up to <span>RIODE</span></h2>
            <p class="text-grey">Subscribe to the Riode eCommerce newsletter to receive timely updates from your favorite
                products.</p>
            <form action="#" method="get" class="input-wrapper input-wrapper-inline input-wrapper-round">
                <input type="email" class="form-control email" name="email" id="email2" placeholder="Email address here..."
                    required="">
                <button class="btn btn-dark" type="submit">SUBMIT</button>
            </form>
            <div class="form-checkbox justify-content-center">
                <input type="checkbox" class="custom-checkbox" id="hide-newsletter-popup" name="hide-newsletter-popup"
                    required />
                <label for="hide-newsletter-popup">Don't show this popup again</label>
            </div>
        </div>
    </div> --}}

    <!-- Plugins JS File -->
    <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/elevatezoom/jquery.elevatezoom.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    <script src="{{ asset('frontend/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/isotope/isotope.pkgd.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('js/webfont.js') }}"></script>
    @yield('footer_js')
	<script src="{{ asset('frontend/vendor/nouislider/nouislider.min.js') }}"></script>
	<!-- Main JS File -->
	<script src="{{ asset('frontend/js/main.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
                var type ="{{Session::get('alert-type','info')}}"
                switch(type){
                    case 'info':
                        toastr.info(" {{Session::get('message')}} ");
                        break;

                    case 'success':
                        toastr.success(" {{Session::get('message')}} ");
                        break;
                        
                    case 'warning':
                        toastr.warning(" {{Session::get('message')}} ");
                        break;

                    case 'error':
                        toastr.error(" {{Session::get('message')}} ");
                        break;
                }
            @endif     
    </script>
</body>

</html>