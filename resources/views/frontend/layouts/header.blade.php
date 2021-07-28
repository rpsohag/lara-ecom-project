<div class="page-wrapper cartpage">
    <h1 class="d-none">BoroBazar online shop</h1>
    <header class="header">
        <div class="header-top">
            <div class="container">
                <div class="header-left">
                    <p class="welcome-msg pb-2">Welcome to Boorobazar online shop</p>
                </div>
                <div class="header-right">
                    <!-- End DropDown Menu -->
                    <div class="dropdown dropdown-expanded">
                        <a href="#dropdown">Links</a>
                        <ul class="dropdown-box">
                            <li><a href="about-us.html">About</a></li>
                            <li><a href="{{ route('frontend.blog') }}">Blog</a></li>
                            <li><a href="faq.html">FAQ</a></li>

                              @if (Route::has('login'))
                            @auth
                                    <li><a href="{{ route('user_profile') }}">Profile</a></li>
                                @else
                                    <li><a href="{{ route('login') }}">Login</a></li>

                                    @if (Route::has('register'))
                                      <li>  <a href="{{ route('register') }}">Register</a></li>
                                    @endif
                                @endauth
                                 @endif   
                        </ul>
                    </div>
                </div>
            </div>
        </div>

      

    



        <!-- End HeaderTop -->
        <div class="header-middle sticky-header fix-top sticky-content">
            <div class="container">
                <div class="header-left">
                    <a href="#" class="mobile-menu-toggle">
                        <i class="d-icon-bars2"></i>
                    </a>
                    <a href="{{ route('frontend.index') }}" class="logo">
                        <img src="{{ asset('frontend/images/logo.png') }}" alt="logo" width="154" height="43" />
                    </a>
                    <!-- End Logo -->

                    <div class="header-search hs-simple">
                        <form method="get" action="{{route('product.search')}}" class="input-wrapper">
                            @csrf
            
                            <input type="text" class="form-control" name="search" autocomplete="off"
                                placeholder="Search..." required />
                            <button class="btn btn-search" type="submit">
                                <i class="d-icon-search"></i>
                            </button>
                        </form>
                    </div>
                    <!-- End Header Search -->
                </div>
                <div class="header-right">
                    <a href="tel:#" class="icon-box icon-box-side">
                        <div class="icon-box-icon">
                            <i class="d-icon-phone"></i>
                        </div>
                        <div class="icon-box-content d-lg-show">
                            <h4 class="icon-box-title">Call Us Now:</h4>
                            <p>0(800) 123-456</p>
                        </div>
                    </a>
                    <span class="divider"></span>
                    <a href="{{ route('view_wishlist') }}" class="wishlist">
                        <i class="d-icon-heart"></i>
                    </a>
                    <span class="divider"></span>
                         @php
                                $grand_total = 0;
                            @endphp
                    <div class="dropdown cart-dropdown type2 mr-0 mr-lg-2">
                        <a href="{{ route('view_cart') }}" class="cart-toggle label-block link">
                            <div class="cart-label d-lg-show ls-normal">
                                <span class="cart-name ls-m">Shopping Cart:</span>
                            </div>
                            <i class="d-icon-bag"><span class="cart-count">{{ cart()->count() }}</span></i>
                        </a>
                        <div class="cart-overlay"></div>
                        <!-- End Cart Toggle -->
                        <div class="dropdown-box">
                            <div class="cart-header">
                                <h4 class="cart-title">Shopping Cart</h4>
                                <a href="#" class="btn btn-dark btn-link"><span class="sr-only">Cart</span></a>
                            </div>
                         @if (cart()->count() > 0)
                         <div class="products scrollable">
                           
                        
                            @foreach (cart() as $cart_item)
                                <div class="product product-cart">
                                    <figure class="product-media">
                                        <a href="{{ route('frontend.product.details', $cart_item->product->slug) }}">
                                            <img src="{{ asset('images/product/thumbnail/'. $cart_item->product->thumbnail) }}" alt="product" width="80"
                                                height="88" />
                                        </a>
                                        <input type="hidden" class="cart_id" value="{{ $cart_item->id }}" >
                                        <a href="{{ route('delete_from_cart', $cart_item->id) }}" class="btn btn-link btn-close">
                                            <i class="fas fa-times"></i><span class="sr-only">Close</span>
                                    </a>
                                    </figure>
                                    <div class="product-detail">
                                        <a href="{{ route('frontend.product.details', $cart_item->product->slug) }}" class="product-name">{{ $cart_item->product->product_name }}</a>
                                        <div class="price-box">
                                            <span class="product-quantity">{{ $cart_item->quantity }}</span>
                                            <span class="product-price">৳ {{ $cart_item->price }}</span>
                                        </div>
                                    </div>

                                </div>
                                <!-- End of Cart Product -->
                                @php
                                $grand_total += ($cart_item->quantity * $cart_item->price)
                            @endphp
@php
                                         $sub = ($cart_item->price * $cart_item->quantity);
                                    @endphp
                         @endforeach
                                <!-- End of Cart Product -->
                            </div>
                            <!-- End of Products  -->
                            <div class="cart-total">
                                <label>Total Amount:</label>
                                <span class="price">৳ {{ number_format($grand_total , 2) }}</span>
                            </div>
                         @else
                            <span style="text-align: center; padding:15px;" class="text-center p-4">Your cart is empty</span>
                         @endif
                            <!-- End of Cart Total -->
                            <div class="cart-action">
                                <a href="{{ route('view_cart') }}" class="btn btn-dark btn-link">View Cart</a>
                                <a href="{{ route('view_checkout') }}" class="btn btn-dark"><span>Go To Checkout</span></a>
                            </div>
                            <!-- End of Cart Action -->
                        </div>
                        <!-- End Dropdown Box -->
                    </div>
                    <div class="header-search hs-toggle mobile-search">
                        <a href="#" class="search-toggle">
                            <i class="d-icon-search"></i>
                        </a>
                        <form action="#" class="input-wrapper">
                            <input type="text" class="form-control" name="search" autocomplete="off"
                                placeholder="Search your keyword..." required />
                            <button class="btn btn-search" type="submit">
                                <i class="d-icon-search"></i>
                            </button>
                        </form>
                    </div>
                    <!-- End of Header Search -->
                </div>
            </div>

        </div>