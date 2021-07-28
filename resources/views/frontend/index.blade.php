@extends('frontend.master')
@section('frontend_content')
@php
// product category start
$product_category_1 = App\Models\Category::where('status',1)->OrderBy('category_name','asc')->skip(1)->take(1)->get();
$product_category_2 = App\Models\Category::where('status',1)->OrderBy('category_name','asc')->skip(2)->take(1)->get();
$product_category_3 = App\Models\Category::where('status',1)->OrderBy('category_name','asc')->skip(3)->take(1)->get();
// product category end

@endphp
@include('frontend.layouts.header')

            <div class="header-bottom has-dropdown pb-0">
                <div class="container d-flex align-items-center">
@include('frontend.layouts.category')
@include('frontend.layouts.menu')

                </div>
            </div>
            <!-- End HeaderBottom -->
        </header>
        <!-- End Header -->
<main class="main mt-lg-4">
    <div class="page-content">
        <section class="intro-section container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-8 mb-4 mb-lg-0">
                    <div class="intro-slider animation-slider owl-carousel owl-theme owl-dot-inner row cols-1 gutter-no"
                        data-owl-options="{
                        'items': 1,
                        'dots': true,
                        'loop': true
                    }">
                        <div class="intro-slide1 banner banner-fixed" style="background-color: #e8e8ea">
                            <figure>
                                <img src="{{ asset('frontend/images/demos/demo22/slides/1.jpg') }}" alt="banner" width="580"
                                    height="460" />
                            </figure>
                            <div
                                class="banner-content x-50 y-50 text-center d-flex flex-column align-items-center">
                                <h4 class="banner-subtitle text-body font-weight-normal slide-animate"
                                    data-animation-options="{'name': 'fadeInUp', 'duration': '1.5s'}">Financing
                                    Offer</h4>
                                <h3 class="banner-title slide-animate"
                                    data-animation-options="{'name': 'fadeInUp', 'duration': '1.5s','delay': '.3s'}">
                                    Camera, Lens and Tablet</h3>
                                <p class="font-weight-semi-bold text-grey slide-animate"
                                    data-animation-options="{'name': 'fadeInLeftShorter', 'duration': '1.2s','delay': '.3s'}">
                                    Discount</p>
                                <div class="banner-price-info ls-s text-uppercase text-primary font-weight-bold flex-1 slide-animate"
                                    data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1.2s','delay': '.8s'}">
                                    40% OFF</div>
                                <a href="demo22-shop.html"
                                    class="btn btn-outline btn-dark btn-rounded slide-animate"
                                    data-animation-options="{'name': 'fadeIn', 'duration': '1.2s','delay': '1s'}">Shop
                                    now</a>
                            </div>
                        </div>
                        <div class="intro-slide2 banner banner-fixed" style="background-color: #7a7675">
                            <figure>
                                <img src="{{ asset('frontend/images/demos/demo22/slides/2.jpg') }}" alt="banner" width="580"
                                    height="460" />
                            </figure>
                            <div class="banner-content x-50 y-50 text-center">
                                <div class="slide-animate"
                                    data-animation-options="{'name': 'blurIn', 'duration': '1.5s'}">
                                    <h4
                                        class="banner-subtitle mb-1 ls-l text-white text-uppercase font-weight-normal">
                                        Flash Sales</h4>
                                    <h3 class="banner-title ls-l text-white text-uppercase font-weight-bold">Up
                                        to 70% Discount</h3>
                                    <p class="ls-l mb-5 text-white font-primary">Extra Off Everything online</p>
                                    <a href="demo22-shop.html"
                                        class="btn btn-outline btn-white btn-rounded mb-1">Shop
                                        now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 mb-4">
                    <div class="intro-banner banner banner-fixed overlay-dark">
                        <figure>
                            <img class="x-50" src="{{ asset('frontend/images/demos/demo22/banner/drone.png') }}" alt="product"
                                width="346" height="193" />
                        </figure>
                        <div class="banner-content x-50 y-50 text-center d-flex flex-column align-items-center">
                            <p class="text-white font-primary text-uppercase flex-1 lh-1 appear-animate"
                                data-animation-options="{
                                'name': 'maskUp'
                            }">Through <br /><span class="d-inline-block mt-1 ls-normal">Riode Birthday</span>
                            </p>
                            <h4 class="banner-subtitle mb-1 text-uppercase ls-normal font-weight-normal appear-animate"
                                data-animation-options="{
                                'name': 'fadeInDownShorter',
                                'delay': '.3s'
                            }">Up to 70% Off</h4>
                            <h3 class="banner-title ls-md font-weight-bold appear-animate"
                                data-animation-options="{
                                'name': 'fadeInDownShorter',
                                'delay': '.2s'
                            }">Portable Drone SD9</h3>
                            <a href="#" class="btn btn-dark btn-md btn-rounded appear-animate"
                                data-animation-options="{
                                'name': 'fadeInDownShorter'
                            }">Buy drone</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="categories container mt-10">
            <h2 class="title title-line title-underline border-1 mb-4">Top Categories of the Month</h2>
            <div class="row">

@foreach ($Indexcategories as $category)
    

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="category category-group-image appear-animate" data-animation-options="{
                        'name': 'fadeIn'
                    }">
                        <a href="{{ route('frontend.product.list',$category->slug) }}">
                            <figure class="category-media">
                                <img src="{{ url('images/category/', $category->image) }}" alt="category" width="190"
                                    height="169" />
                            </figure>
                        </a>
                        <div class="category-content">
                            <h4 class="category-name"><a href="{{ route('frontend.product.list',$category->slug) }}">{{ $category->category_name }}</a></h4>
                            <ul class="category-list">
@foreach ($category->subcategory as $subcat)
    

                                <li><a href="{{ route('frontend.product.lists',$subcat->slug) }}">{{ $subcat->subcategory_name }}</a></li>
@endforeach
                            </ul>
                        </div>
                    </div>
                </div>
@endforeach
            </div>
        </section>
        <section class="banner-group container mt-10 pb-4 pt-2 mb-10 appear-animate">
            <div class="owl-carousel owl-theme row cols-md-2 cols-1" data-owl-options="{
                'items': 2,
                'margin': 20,
                'dots': true,
                'responsive': {
                    '0': {
                        'items': 1
                    },
                    '768': {
                        'items': 2,
                        'loop': false
                    },
                    '992': {
                        'dots': false
                    }
                }
            }">
                <div class="banner1 banner banner-fixed overlay-zoom appear-animate" data-animation-options="{
                    'name': 'fadeInRightShorter'
                }" style="background-color: #3cbea4">
                    <figure>
                        <img src="{{ asset('frontend/images/demos/demo22/banner/1.jpg') }}" alt="banner" width="580" height="219" />
                    </figure>
                    <div class="banner-content y-50">
                        <h3 class="banner-title text-white">Customized Products</h3>
                        <p class="mb-7 text-white">Partner with one of 8,000 experienced manufacturers with
                            design & production capabilities</p>
                        <a href="#" class="btn btn-link btn-white btn-underline">Oem Factories<i
                                class="fas fa-angle-right"></i></a>
                        <a href="#" class="btn btn-link btn-white btn-underline">Top suppliers<i
                                class="fas fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="banner2 banner banner-fixed overlay-zoom appear-animate" data-animation-options="{
                    'name': 'fadeInLeftShorter',
                    'delay': '.2s'
                }" style="background-color: #444443">
                    <figure>
                        <img src="{{ asset('frontend/images/demos/demo22/banner/2.jpg') }}" alt="banner" width="580" height="219" />
                    </figure>
                    <div class="banner-content y-50">
                        <h3 class="banner-title text-white">Ready-To-Ship Products</h3>
                        <p class="mb-7 text-white">Source from 15 milion products that are ready to ship, and
                            leave the facility within 15 days</p>
                        <a href="#" class="btn btn-link btn-white btn-underline">New Arrivals<i
                                class="fas fa-angle-right"></i></a>
                        <a href="#" class="btn btn-link btn-white btn-underline">Best Sellers<i
                                class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="grey-section pt-10 pb-8">
            <div class="container pt-4 pb-4">
                <div class="product-wrapper row gutter-no appear-animate">
                    <div class="row gutter-no products-banner">
                        <div class="col-12 col-xs-6">
                            <div class="category-filters d-flex flex-column">
@foreach ($Indexproduct_category as $category)
    

                                <h3 class="category-title font-weight-bold appear-animate"
                                    data-animation-options="{
                                    'name': 'fadeInUpShorter'
                                }">{{ $category->category_name }}</h3>

                                <ul class="cateogry-list appear-animate" data-animation-options="{
                                    'name': 'fadeInUpShorter',
                                    'delay': '.3s'
                                }">
                                @foreach ($category->subcategory as $subcat)
                                      <li><a href="{{ route('frontend.product.lists',$subcat->slug) }}">{{ $subcat->subcategory_name }}</a></li>
                                @endforeach
                                </ul>
                                <a href="{{ route('frontend.product.list',$category->slug) }}" class="btn btn-link btn-underline font-primary appear-animate"
                                    data-animation-options="{
                                    'name': 'fadeInUpShorter',
                                    'delay': '.3s'
                                }">View all products<i class="d-icon-arrow-right"></i></a>
                                @endforeach
                            </div>
                        </div>
                        <div class="banner col-12 col-xs-6"
                            style="background-image: url({{ asset('frontend/images/demos/demo22/banner/3.jpg') }}); background-color: #ebebeb">
                            <div class="banner-content appear-animate" data-animation-options="{
                                'name': 'fadeInUpShorter',
                                'delay': '.4s' 
                            }">
                                <h4 class="banner-subtitle mb-2 ls-s font-weight-normal">Featured</h4>
                                <h3 class="banner-title ls-s">Fashion Design<br /><span
                                        class="d-inline-block font-weight-normal">Collection</span></h3>
                                <a href="demo22-shop.html" class="btn btn-dark btn-md btn-rounded">shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-hidden products-box">
                        <div class="row gutter-no line-grid">

                            @php
                            $catwiseProduct = App\Models\Product::where('cat_id',$category->id)->orderBy('id','DESC')->latest()->limit(6)->get();
                        @endphp
                        @foreach ($catwiseProduct as $product)
                            
                        
                        <div class="col-md-4 col-6">
                            <div class="product text-center appear-animate product_data">
                                <figure class="product-media">
                                    <a href="demo22-product.html">
                                        <img src="{{url('images/product/thumbnail/',$product->thumbnail)}}" alt="product"
                                            width="220" height="206">
                                    </a>
                                    <form action="{{ route('add_wishlist') }}" method="POST">
                                        @csrf
                                        <div class="product-action-vertical">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button href="" class="btn-product-icon add-to-wishlist-btn"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></button>
                                        </div>
                                        </form>
                                    
                                <form action="{{ route('addtocart') }}" method="post">
                                    @csrf
                                    <input type="hidden" class="product_id" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" class="product_id" name="quantity" value="1">
                                    <input type="hidden" class="product_id" name="color" value="{{ $product->color->color }}">
                                    <input type="hidden" class="product_id" name="size" value="{{ $product->size->size }}">
                                    <input type="hidden" class="product_id" name="price" value="{{ $product->price }}">
                                    <div class="product-action">
                                        <button href="#" class="btn-product"
                                            title="Add To Cart" type="submit">Add To Cart</button>
                                    </div>
                                    </form>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="{{ route('frontend.product.details', $product->slug) }}">{{ $product->product_name }}
                                        </a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">৳ {{ $product->price }}</ins><del
                                            class="old-price">৳ {{ $product->discount }}</del>
                                    </div>
                                    <div class="ratings-container">

                                        @if (App\Models\ProductReview::where('product_id',$product->id)->first())
                                        @php
                                             $reviewProducts = App\Models\ProductReview::where('product_id',$product->id)->where('status','approve')->latest()->get();
                                            $rating = App\Models\ProductReview::where('product_id',$product->id)->where('status','approve')->get();
                                            $avgRating = number_format($rating,1);
                                        @endphp
                                    
                                         ({{ count($rating) }})
                            @else
                                <span class="text-danger">No Review</span>
                            @endif
                                   
                                        {{-- {{ $product->product_review->rating }} --}}

                                      
                                        {{-- <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="demo22-product.html" class="rating-reviews">( {{ $product_reviews->count() }} reviews )</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                <div class="product-wrapper row gutter-no appear-animate mt-10 pt-4">
                    <div class="row gutter-no products-banner">
                        <div class="col-12 col-xs-6">
                            <div class="category-filters d-flex flex-column">
@foreach ($product_category_1 as $category)
    

                                <h3 class="category-title font-weight-bold appear-animate"
                                    data-animation-options="{
                                    'name': 'fadeInUpShorter'
                                }">{{ $category->category_name }}</h3>

                                <ul class="cateogry-list appear-animate" data-animation-options="{
                                    'name': 'fadeInUpShorter',
                                    'delay': '.3s'
                                }">
                                @foreach ($category->subcategory as $subcat)
                                    
                              
                                    <li><a href="{{ route('frontend.product.lists',$subcat->slug) }}">{{ $subcat->subcategory_name }}</a></li>
  @endforeach
                                </ul>
                                <a href="{{ route('frontend.product.list',$category->slug) }}" class="btn btn-link btn-underline font-primary appear-animate"
                                    data-animation-options="{
                                    'name': 'fadeInDownShorter',
                                    'delay': '.3s'
                                }">View all products<i class="d-icon-arrow-right"></i></a>
                                @endforeach
                            </div>
                        </div>
                        <div class="banner col-12 col-xs-6"
                            style="background-image: url({{ asset('frontend/images/demos/demo22/banner/4.jpg') }}); background-color: #fff">
                            <div class="banner-content pl-2 pr-2 text-lg-center pt-4">
                                <div class="appear-animate" data-animation-options="{
                                    'name': 'fadeInUpShorter',
                                    'delay': '.4s'
                                }">
                                    <h4 class="banner-subtitle mb-2 ls-s font-weight-normal">Recommended for you
                                    </h4>
                                    <h3 class="banner-title">Cosmetics Trends<br /><span
                                            class="d-inline-block font-weight-normal">Collection</span></h3>
                                    <a href="demo22-shop.html" class="btn btn-dark btn-md btn-rounded">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-hidden products-box">
                        <div class="row gutter-no line-grid product_data">
                            @php
                            $catwiseProduct = App\Models\Product::where('cat_id',$category->id)->orderBy('id','DESC')->limit(6)->get();
                        @endphp
                        @foreach ($catwiseProduct as $product)

                            <div class="col-md-4 col-6">
                                <div class="product text-center appear-animate">
                                    <figure class="product-media">
                                        <a href="demo22-product.html">
                                            <img src="{{url('images/product/thumbnail/',$product->thumbnail)}}" alt="product"
                                                width="220" height="206">
                                        </a>
                                        <form action="{{ route('add_wishlist') }}" method="POST">
                                            @csrf
                                            <div class="product-action-vertical">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button href="" class="btn-product-icon add-to-wishlist-btn"
                                                    title="Add to wishlist"><i class="d-icon-heart"></i></button>
                                            </div>
                                            </form>
                                        <form action="{{ route('addtocart') }}" method="post">
                                            @csrf
                                            <input type="hidden" class="product_id" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" class="product_id" name="quantity" value="1">
                                            <input type="hidden" class="product_id" name="color" value="{{ $product->color->color }}">
                                            <input type="hidden" class="product_id" name="size" value="{{ $product->size->size }}">
                                            <input type="hidden" class="product_id" name="price" value="{{ $product->price }}">
                                            <div class="product-action">
                                                <button href="#" class="btn-product"
                                                    title="Add To Cart" type="submit">Add To Cart</button>
                                            </div>
                                            </form>
                                    </figure>
                                    <div class="product-details">
                                        <h3 class="product-name">
                                            <a href="{{ route('frontend.product.details', $product->slug) }}">{{ $product->product_name }}
                                            </a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">৳ {{ $product->price }}</ins><del
                                                class="old-price">৳ {{ $product->discount }}</del>
                                        </div>
                                        {{-- <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width:100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="demo22-product.html" class="rating-reviews">( 6 reviews )</a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="product-wrapper row gutter-no appear-animate mt-10 pt-2">
                    <div class="row gutter-no products-banner">
                        <div class="col-12 col-xs-6">
                            <div class="category-filters d-flex flex-column">
                                @foreach ($product_category_2 as $category)
                                <h3 class="category-title appear-animate font-weight-bold"
                                    data-animation-options="{
                                    'name': 'fadeInUpShorter'
                                }">{{ $category->category_name }}</h3>
                                @endforeach
                                <ul class="cateogry-list appear-animate" data-animation-options="{
                                    'name': 'fadeInUpShorter',
                                    'delay': '.3s'
                                }">

                                    <li class="active"><a href="demo22-shop.html">Desktop PCs</a></li>

                                </ul>
                                <a href="{{ route('frontend.product.list',$category->slug) }}" class="btn btn-link btn-underline font-primary appear-animate"
                                    data-animation-options="{
                                    'name': 'fadeInUpShorter',
                                    'delay': '.3s'
                                }">View all products<i class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="banner col-12 col-xs-6"
                            style="background-image: url({{ asset('frontend/images/demos/demo22/banner/5.jpg') }}); background-color: #ebebeb">
                            <div class="banner-content appear-animate" data-animation-options="{
                                'name': 'fadeInUp',
                                'delay': '.4s'
                            }">
                                <h4 class="banner-subtitle mb-2 ls-s font-weight-normal">Featured</h4>
                                <h3 class="banner-title ls-s">Top Electronics<br /><span
                                        class="d-inline-block font-weight-normal">Collection</span></h3>
                                <a href="demo22-shop.html" class="btn btn-dark btn-md btn-rounded">shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-hidden products-box">
                        <div class="row gutter-no line-grid">
                            @php
                            $catwiseProduct = App\Models\Product::where('cat_id',$category->id)->orderBy('id','DESC')->limit(6)->get();
                        @endphp
                        @foreach ($catwiseProduct as $product)
                        <div class="col-md-4 col-6">
                            <div class="product text-center appear-animate">
                                <figure class="product-media">
                                    <a href="demo22-product.html">
                                        <img src="{{url('images/product/thumbnail/',$product->thumbnail)}}" alt="product"
                                            width="220" height="206">
                                    </a>
                                    <form action="{{ route('add_wishlist') }}" method="POST">
                                        @csrf
                                        <div class="product-action-vertical">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button href="" class="btn-product-icon add-to-wishlist-btn"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></button>
                                        </div>
                                        </form>
                                    <form action="{{ route('addtocart') }}" method="post">
                                        @csrf
                                        <input type="hidden" class="product_id" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" class="product_id" name="quantity" value="1">
                                        <input type="hidden" class="product_id" name="color" value="{{ $product->color->color }}">
                                        <input type="hidden" class="product_id" name="size" value="{{ $product->size->size }}">
                                        <input type="hidden" class="product_id" name="price" value="{{ $product->price }}">
                                        <div class="product-action">
                                            <button href="#" class="btn-product"
                                                title="Add To Cart" type="submit">Add To Cart</button>
                                        </div>
                                        </form>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="{{ route('frontend.product.details', $product->slug) }}">{{ $product->product_name }}
                                        </a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">৳ {{ $product->price }}</ins><del
                                            class="old-price">৳ {{ $product->discount }}</del>
                                    </div>
                                    {{-- <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="demo22-product.html" class="rating-reviews">( 6 reviews )</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
@endforeach
                        </div>
                    </div>
                </div>
                <div class="product-wrapper row gutter-no appear-animate mt-10">
                    <div class="row gutter-no products-banner">
                        <div class="col-12 col-xs-6">
                            <div class="category-filters d-flex flex-column">
                      @foreach ($product_category_3 as $category)
                                <h3 class="category-title font-weight-bold appear-animate"
                                    data-animation-options="{
                                    'name': 'fadeInDownShorter',
                                    'delay': '.3s'
                                }">{{ $category->category_name }}</h3>


                                <ul class="cateogry-list appear-animate" data-animation-options="{
                                    'name': 'fadeInDownShorter',
                                    'delay': '.3s'
                                }">
                                @foreach ($category->subcategory as $subcat)
                                      <li class="active"><a href="{{ route('frontend.product.lists',$subcat->slug) }}">{{ $subcat->subcategory_name }}</a></li>
                                @endforeach
                                  

                                </ul>
                                <a href="{{ route('frontend.product.list',$category->slug) }}" class="btn btn-link btn-underline font-primary appear-animate"
                                    data-animation-options="{
                                    'name': 'fadeInDownShorter'
                                }">View all products<i class="d-icon-arrow-right"></i></a>
                            </div>
                            @endforeach
                        </div>
                        <div class="banner col-12 col-xs-6"
                            style="background-image: url({{ asset('frontend/images/demos/demo22/banner/6.jpg') }}); background-color: #ebebeb">
                            <div class="banner-content text-lg-center appear-animate" data-animation-options="{
                                'name': 'fadeInDownShorter',
                                'delay': '.4s'
                            }">
                                <h4 class="banner-subtitle mb-2 ls-s font-weight-normal">Recommeded for you</h4>
                                <h3 class="banner-title ls-s">Kitchen Tools<br /><span
                                        class="d-inline-block font-weight-normal">Collection</span></h3>
                                <a href="demo22-shop.html" class="btn btn-dark btn-md btn-rounded">shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-hidden products-box">
                        <div class="row gutter-no line-grid">
                            @php
                            $catwiseProduct = App\Models\Product::where('cat_id',$category->id)->orderBy('id','DESC')->limit(6)->get();
                        @endphp
                        @foreach ($catwiseProduct as $product)

                        <div class="col-md-4 col-6">
                            <div class="product text-center appear-animate">
                                <figure class="product-media">
                                    <a href="demo22-product.html">
                                        <img src="{{url('images/product/thumbnail/',$product->thumbnail)}}" alt="product"
                                            width="220" height="206">
                                    </a>
                                    <form action="{{ route('add_wishlist') }}" method="POST">
                                        @csrf
                                        <div class="product-action-vertical">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button href="" class="btn-product-icon add-to-wishlist-btn"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></button>
                                        </div>
                                        </form>
                                    <form action="{{ route('addtocart') }}" method="post">
                                        @csrf
                                        <input type="hidden" class="product_id" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" class="product_id" name="quantity" value="1">
                                        <input type="hidden" class="product_id" name="color" value="{{ $product->color->color }}">
                                        <input type="hidden" class="product_id" name="size" value="{{ $product->size->size }}">
                                        <input type="hidden" class="product_id" name="price" value="{{ $product->price }}">
                                        <div class="product-action">
                                            <button href="#" class="btn-product"
                                                title="Add To Cart" type="submit">Add To Cart</button>
                                        </div>
                                        </form>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="{{ route('frontend.product.details', $product->slug) }}">{{ $product->product_name }}
                                        </a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">৳ {{ $product->price }}</ins><del
                                            class="old-price">৳ {{ $product->discount }}</del>
                                    </div>
                                    {{-- <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="demo22-product.html" class="rating-reviews">( 6 reviews )</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                                
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container appear-animate">
            <div class="service-list">
                <div class="owl-carousel owl-theme owl-middle row cols-lg-4 cols-md-3 cols-sm-2 cols-2"
                    data-owl-options="{
                    'items': 4,
                    'margin': 20,
                    'dots': false,
                    'autoplay': true,
                    'responsive': {
                        '0': {
                            'items': 1
                        },
                        '576': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        },
                        '992': {
                            'items': 4
                        }
                    }
                }">
                    <div class="icon-box text-center appear-animate" data-animation-options="{
                    'name':'zoomInLeft',
                    'delay': '.2s'
                }">
                        <i class="icon-box-icon d-icon-truck" style="font-size: 4.4rem;"></i>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">Free Shipping &amp; Return</h4>
                            <p>Free shipping on orders over $99</p>
                        </div>
                    </div>
                    <div class="icon-box text-center appear-animate" data-animation-options="{
                    'name':'zoomInLeft',
                    'delay': '.3s'
                }">
                        <i class="icon-box-icon d-icon-headphone" style="font-size: 3.4rem"></i>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">Customer Support 24/7</h4>
                            <p>Instant access to perfect support</p>
                        </div>
                    </div>
                    <div class="icon-box text-center appear-animate" data-animation-options="{
                    'name':'zoomInLeft',
                    'delay': '.4s'
                }">
                        <i class="icon-box-icon d-icon-secure" style="font-size: 3.7rem"></i>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">100% Secure Payment</h4>
                            <p>We ensure secure payment!</p>
                        </div>
                    </div>
                    <div class="icon-box text-center appear-animate" data-animation-options="{
                    'name':'zoomInLeft',
                    'delay': '.5s'
                }">
                        <i class="icon-box-icon d-icon-money" style="font-size: 3.2rem"></i>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">Money Back guarantee</h4>
                            <p>Any back within 30days</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="blog container mt-10 pt-3 mb-10 appear-animate">
            <h2 class="title title-underline title-line mb-4">From our Blog</h2>
            <div class="owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-sm-2 cols-1" data-owl-options="{
                'items': 4,
                'margin': 20,
                'loop': false,
                'responsive': {
                    '0': {
                        'items': 1
                    },
                    '576': {
                        'items': 2
                    },
                    '768': {
                        'items': 3
                    },
                    '992': {
                        'items': 4
                    }
                }
            }">
            @foreach ($blogs as $blog)
                <div class="post overlay-zoom appear-animate overlay-dark" data-animation-options="{
                    'name': 'zoomInShorter'
                }">
                    <figure class="post-media">
                        <a href="{{ route('frontend.single_blog',$blog->slug) }}">
                            <img src="{{ url('images/blog/thumbnail',$blog->thumbnail) }}" width="280" height="189" alt="post" />
                        </a>
                    </figure>
                    <div class="post-details">
                        <div class="post-meta">
                            <a href="" class="post-date">September 6, 2020</a>
                            &nbsp;|&nbsp; <a href="" class="post-comment"><span>1</span> Comments</a>
                        </div>
                        <h3 class="post-title"><a href="{{ route('frontend.single_blog',$blog->slug) }}">{{ $blog->title }}</a></h3>
                        <a href="{{ route('frontend.single_blog',$blog->slug) }}" class="btn btn-link btn-underline btn-sm">Read More<i
                                class="d-icon-arrow-right"></i></a>
                    </div>
                </div>
               @endforeach
            </div>
        </section>
    </div>
</main>
@endsection
@section('footer_js')

@endsection