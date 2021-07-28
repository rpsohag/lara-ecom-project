@extends('frontend.master')
@section('style_css')
    <style>
        
    </style>
@endsection
@section('frontend_content')
@include('frontend.layouts.header')

            <div class="header-bottom has-dropdown pb-0">
                <div class="container d-flex align-items-center">
@include('frontend.layouts.menu')

                </div>
            </div>
            <!-- End HeaderBottom -->
        </header>
<main class="main mt-6 single-product">
<div class="page-content mb-10 pb-6">
    <div class="container">
        <div class="product product-single row mb-7">
            <div class="col-md-6 sticky-sidebar-wrapper">
                <div class="product-gallery pg-vertical sticky-sidebar"
                    data-sticky-options="{'minWidth': 767}">
                    <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
                        @foreach ($imagesGalleries as $item)
                        <figure class="product-image">
                            <img src="{{ url('images/product/gallery',$item->image) }}"
                                data-zoom-image="{{ asset('frontend/images/product/product-1-1-800x900.jpg') }}"
                                alt="Women's Brown Leather Backpacks" width="800" height="900">
                        </figure>
@endforeach
                    </div>
                    <div class="product-thumbs-wrap">
                        <div class="product-thumbs">
                            @foreach ($imagesGalleries as $item)
                            <div class="product-thumb active">
                                <img src="{{ url('images/product/gallery',$item->image) }}" alt="product thumbnail"
                                    width="109" height="122">
                            </div>
                            @endforeach
                        </div>
                        <button class="thumb-up disabled"><i class="fas fa-chevron-left"></i></button>
                        <button class="thumb-down disabled"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-details">
                    <div class="product-navigation">
                        <ul class="breadcrumb breadcrumb-lg">
                            <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                            <li><a href="#" class="active">Products</a></li>
                            <li>Detail</li>
                        </ul>
                    </div>
                    <form action="{{ route('addtocart') }}" method="post">
                        @csrf
                    <h1 class="product-name">{{ $product_detail->product_name }}</h1>
                    <div class="product-meta">
                        BRAND: <span class="product-brand">{{ $product_detail->brand->brand_name }}</span>
                    </div>
                    <div class="product-meta">
                        <span class="product-brand">{{ $product_detail->stock }} product in stock</span>
                    </div>
                    <div class="product-price">৳ {{ $product_detail->price }}</div>
                    <div class="ratings-container">
                        <div class="ratings-full">
                            @if ($product_reviews->count() > 0)
                            <span class="ratings" style="width:{{ $product_reviews->sum('rating')/$product_reviews->count() * 20}}%"></span>
                            <span class="tooltiptext tooltip-top"></span>
                            @endif
                            
                        </div>
                        <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( {{ $product_reviews->count() }} reviews )</a>
                    </div>
                    <p class="product-short-desc">{{ $product_detail->summary }}</p>
                    <div class="product-form product-variations ">
                        <label>Color:</label>
                        <div class="select-box">
                            <select name="color" class="form-control">
                                <option value="{{ $product_detail->color->color }}">{{ $product_detail->color->color }}</option>
                                @foreach($product_detail->attributes as $attrs)
                                <option value="{{ $attrs->color }}">{{ $attrs->color }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="hidden" class="product_id" name="product_id" value="{{ $product_detail->id }}">
                    <input type="hidden" class="product_id" name="price" value="{{ $product_detail->price }}">


                    <div class="product-form product-variations">
                        <label>Size:</label>
                        <div class="product-form-group">
                            <div class="select-box">
                                <select name="size" id="pro_size" class="form-control">
                                    <option value="{{ $product_detail->size->size }}">{{ $product_detail->size->size }}</option>
                                    @foreach($product_detail->attributes as $attrs)
                                    <option value="{{ $attrs->size }}">{{ $attrs->size }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr class="product-divider">

                    <div class="product-form product-qty">
                        <div class="product-form-group">
                            <div class="input-group mr-2">
                                <td class="cart-product-quantity product-quantity" style="margin-left: 8px">
                                    <div class="input-group quantity">
                                        <span>
                                            <button type="button" style="padding:15px;" class="btn btn-default btn-number quantity-minus d-icon-minus input-group-prepend decrement-btn input-group-btn">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <input type="text" name="quantity" class="qty-input form-control" maxlength="2" max="10" value="1" style="width: 40px;">
                                    <span>
                                        <button type="button" style="padding:15px;" class="btn btn-default btn-number quantity-plus d-icon-plus input-group-append increment-btn">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </span>
                                    </div>
                                </td>
                            </div>
                           <div>
                            <button type="submit" style="cursor: pointer; width:200px;" class="btn-product  text-normal ls-normal font-weight-semi-bold"><i class="d-icon-bag"></i>Add to Cart</button>
                           </div>
                        </div>
                    </div>
                    
                    </form>
                    <hr class="product-divider mb-3">

                    <div class="product-footer">
                        <div class="social-links mr-4">
                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                            <a href="#" class="social-link social-pinterest fab fa-pinterest-p"></a>
                        </div>
                        <span class="divider d-lg-show"></span>
                        <a href="#" class="btn-product btn-wishlist mr-6"><i class="d-icon-heart"></i>Add to
                            wishlist</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab tab-nav-simple product-tabs">
            <ul class="nav nav-tabs justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#product-tab-description">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#product-tab-additional">Additional information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#product-tab-size-guide">Size Guide</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#product-tab-reviews">Reviews (2)</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active in" id="product-tab-description">
                    <div class="row mt-6">
                        <div class="col-md-6">

                      {!! $product_detail->description !!}
                        </div>
                        <div class="col-md-6 pl-md-6 pt-4 pt-md-0">
                            <h5 class="description-title font-weight-semi-bold ls-m mb-5">Video Description
                            </h5>
                            <figure class="p-relative d-inline-block mb-2">
                                <img src="{{ asset('frontend/images/product/product.jpg') }}" width="559" height="370"
                                    alt="Product" />
                                <a class="btn-play btn-iframe" href="video/memory-of-a-woman.mp4">
                                    <i class="d-icon-play-solid"></i>
                                </a>
                            </figure>
                            <div class="icon-box-wrap d-flex flex-wrap">
                                <div class="icon-box icon-box-side icon-border pt-2 pb-2 mb-4 mr-10">
                                    <div class="icon-box-icon">
                                        <i class="d-icon-lock"></i>
                                    </div>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title lh-1 pt-1 ls-s text-normal">2 year
                                            warranty</h4>
                                        <p>Guarantee with no doubt</p>
                                    </div>
                                </div>
                                <div class="divider d-xl-show mr-10"></div>
                                <div class="icon-box icon-box-side icon-border pt-2 pb-2 mb-4">
                                    <div class="icon-box-icon">
                                        <i class="d-icon-truck"></i>
                                    </div>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title lh-1 pt-1 ls-s text-normal">Free shipping
                                        </h4>
                                        <p>On orders over $50.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="product-tab-additional">
                    <ul class="list-none">
                        <li><label>Brands:</label>
                            <p>SkillStar, SLS</p>
                        </li>
                        <li><label>Color:</label>
                            <p>Blue, Brown</p>
                        </li>
                        <li><label>Size:</label>
                            <p>Large, Medium, Small</p>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane " id="product-tab-size-guide">
                    <figure class="size-image mt-4 mb-4">
                        <img src="{{ asset('frontend/images/product/size_guide.png') }}" alt="Size Guide Image" width="217"
                            height="398">
                    </figure>
                    <figure class="size-table mt-4 mb-4">
                        <table>
                            <thead>
                                <tr>
                                    <th>SIZE</th>
                                    <th>CHEST(IN.)</th>
                                    <th>WEIST(IN.)</th>
                                    <th>HIPS(IN.)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>XS</th>
                                    <td>34-36</td>
                                    <td>27-29</td>
                                    <td>34.5-36.5</td>
                                </tr>
                                <tr>
                                    <th>S</th>
                                    <td>36-38</td>
                                    <td>29-31</td>
                                    <td>36.5-38.5</td>
                                </tr>
                                <tr>
                                    <th>M</th>
                                    <td>38-40</td>
                                    <td>31-33</td>
                                    <td>38.5-40.5</td>
                                </tr>
                                <tr>
                                    <th>L</th>
                                    <td>40-42</td>
                                    <td>33-36</td>
                                    <td>40.5-43.5</td>
                                </tr>
                                <tr>
                                    <th>XL</th>
                                    <td>42-45</td>
                                    <td>36-40</td>
                                    <td>43.5-47.5</td>
                                </tr>
                                <tr>
                                    <th>XXL</th>
                                    <td>45-48</td>
                                    <td>40-44</td>
                                    <td>47.5-51.5</td>
                                </tr>
                            </tbody>
                        </table>
                    </figure>
                </div>
                <div class="tab-pane " id="product-tab-reviews">
                    <div class="comments mb-8 pt-2 pb-2 border-no">
                        <ul>
@foreach ($product_reviews as $product_review)
    

                            <li>
                                <div class="comment">
                                    <figure class="comment-media">
                                        <a href="#">
                                            <img src="{{ asset('frontend/images/blog/comments/1.jpg') }}" alt="avatar">
                                        </a>
                                    </figure>
                                    <div class="comment-body">
                                        <div class="comment-rating ratings-container mb-0">
                                            <div class="ratings-full">
                                                @if ( $product_review->rating  == 1)
                                                    <span class="ratings" style="width:20%"></span>
                                                     <span class="tooltiptext tooltip-top"></span>
                                                
                                                     
                                                @elseif( $product_review->rating  == 2)
                                                    <span class="ratings" style="width:40%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                
                                                @elseif( $product_review->rating  == 3)
                                                    <span class="ratings" style="width:60%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                
                                                @elseif( $product_review->rating  == 4)
                                                    <span class="ratings" style="width:80%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                
                                                @elseif( $product_review->rating  == 5)
                                                    <span class="ratings" style="width:100%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                
                                                @endif
                                               
                                            </div>
                                        </div>
                                        <div class="comment-user">
                                            <span class="comment-date text-body">{{ $product_review->created_at->format('D M Y h:i:s a') }}</span>
                                            <h4><a href="#">{{ $product_review->user->name }}</a></h4>
                                        </div>

                                        <div class="comment-content">
                                            <p>{{ $product_review->message }}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                           
                        </ul>
                    </div>
                    <!-- End Comments -->
                    <div class="reply">

                         <form action="{{ route('ProductReview') }}" method="post">
                            @csrf
                        <div class="title-wrapper text-left">
                            <h3 class="title title-simple text-left text-normal">Add a Review</h3>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <div class="product-form">
                                <label>Select Star From Here:</label>
                                <div class="select-box ml-3">
                                    <select name="rating" class="form-control" style="color:black">
                                        <option value="1">One Star</option>
                                        <option value="2">Two Star</option>
                                        <option value="3">Three Star</option>
                                        <option value="4">Four Star</option>
                                        <option value="5">Five Star</option>
                                    
                                    </select>
                                </div>
                            </div>
                     
                        </div>
                        <input type="hidden" name="product_id" value="{{ $product_detail->id }}">
                            <textarea id="reply-message" name="message" cols="30" rows="6" class="form-control mb-4"
                                placeholder="Comment *" required></textarea>
                            <div class="row">
                                <div class="col-md-6 mb-5">
                                    <input type="text" class="form-control" id="reply-name"
                                        name="name" placeholder="Name *" required />
                                </div>
                                <div class="col-md-6 mb-5">
                                    <input type="email" class="form-control" id="reply-email"
                                        name="email" placeholder="Email *" required />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Submit<i
                                    class="d-icon-arrow-right"></i></button>
                        </form>
                    </div>
                    <!-- End Reply -->
                </div>
            </div>
        </div>

        <section class="pt-3 mt-10">
            <h2 class="title justify-content-center">Related Products</h2>

            <div class="owl-carousel owl-theme owl-nav-full row cols-2 cols-md-3 cols-lg-4"
                data-owl-options="{
                'items': 5,
                'nav': false,
                'loop': false,
                'dots': true,
                'margin': 20,
                'responsive': {
                    '0': {
                        'items': 2
                    },
                    '768': {
                        'items': 3
                    },
                    '992': {
                        'items': 4,
                        'dots': false,
                        'nav': true
                    }
                }
            }">

            @foreach ($relatedProducts as $relatedProduct)
                <div class="product">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="{{ url('images/product/thumbnail',$relatedProduct->thumbnail) }}" alt="product" width="280" height="315">
                        </a>
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                data-target="#addCartModal" title="Add to cart"><i
                                    class="d-icon-bag"></i></a>
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="product-cat">
                            <a href="shop-grid-3col.html">Clothing</a>
                        </div>
                        <h3 class="product-name">
                            <a href="product.html">{{ $relatedProduct->product_name }}</a>
                        </h3>
                        <div class="product-price">
                            <span class="price">$140.00</span>
                        </div>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:100%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#" class="rating-reviews">( <span class="review-count">12</span>
                                reviews
                                )</a>
                        </div>
                    </div>
                </div>
@endforeach
            </div>
        </section>
    </div>
</div>
</main>
<!-- End Main -->
<!-- End Footer -->
</div>
<!-- Sticky Footer -->
            <div class="sticky-footer sticky-content fix-bottom">
            <a href="demo1.html" class="sticky-link active">
            <i class="d-icon-home"></i>
            <span>Home</span>
            </a>
            <a href="shop.html" class="sticky-link">
            <i class="d-icon-volume"></i>
            <span>Categories</span>
            </a>
            <a href="wishlist.html" class="sticky-link">
            <i class="d-icon-heart"></i>
            <span>Wishlist</span>
            </a>
            <a href="account.html" class="sticky-link">
            <i class="d-icon-user"></i>
            <span>Account</span>
            </a>
            <div class="header-search hs-toggle dir-up">
            <a href="#" class="search-toggle sticky-link">
                <i class="d-icon-search"></i>
                <span>Search</span>
            </a>
            <form action="#" class="input-wrapper">
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

<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

<!-- Background of PhotoSwipe. It's a separate element as animating opacity is faster than rgba(). -->
<div class="pswp__bg"></div>

<!-- Slides wrapper with overflow:hidden. -->
<div class="pswp__scroll-wrap">

<!-- Container that holds slides.
PhotoSwipe keeps only 3 of them in the DOM to save memory.
Don't modify these 3 pswp__item elements, data is added later on. -->
<div class="pswp__container">
    <div class="pswp__item"></div>
    <div class="pswp__item"></div>
    <div class="pswp__item"></div>
</div>


</div>
</div>

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
<ul class="mobile-menu mmenu-anim">
    <li>
        <a href="demo1.html">Home</a>
    </li>
    <li>
        <a href="shop.html">Categories</a>
        <ul>
            <li>
                <a href="#">
                    Variations 1
                </a>
                <ul>
                    <li><a href="shop-banner-sidebar.html">Banner With Sidebar</a></li>
                    <li><a href="shop-boxed-banner.html">Boxed Banner</a></li>
                    <li><a href="shop-infinite-scroll.html">Infinite Ajaxscroll</a></li>
                    <li><a href="shop-horizontal-filter.html">Horizontal Filter</a></li>
                    <li><a href="shop-navigation-filter.html">Navigation Filter<span
                                class="tip tip-hot">Hot</span></a></li>

                    <li><a href="shop-off-canvas.html">Off-Canvas Filter</a></li>
                    <li><a href="shop-right-sidebar.html">Right Toggle Sidebar</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    Variations 2
                </a>
                <ul>

                    <li><a href="shop-grid-3cols.html">3 Columns Mode<span
                                class="tip tip-new">New</span></a></li>
                    <li><a href="shop-grid-4cols.html">4 Columns Mode</a></li>
                    <li><a href="shop-grid-5cols.html">5 Columns Mode</a></li>
                    <li><a href="shop-grid-6cols.html">6 Columns Mode</a></li>
                    <li><a href="shop-grid-7cols.html">7 Columns Mode</a></li>
                    <li><a href="shop-grid-8cols.html">8 Columns Mode</a></li>
                    <li><a href="shop-list.html">List Mode</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="#" class="active">Products</a>
        <ul>
            <li>
                <a href="#">Product Pages</a>
                <ul>
                    <li><a href="product-simple.html">Simple Product</a></li>
                    <li><a href="product.html">Variable Product</a></li>
                    <li><a href="product-sale.html">Sale Product</a></li>
                    <li><a href="product-featured.html">Featured &amp; On Sale</a></li>

                    <li><a href="product-left-sidebar.html">With Left Sidebar</a></li>
                    <li><a href="product-right-sidebar.html">With Right Sidebar</a></li>
                    <li><a href="product-sticky-cart.html">Add Cart Sticky<span
                                class="tip tip-hot">Hot</span></a></li>
                    <li><a href="product-tabinside.html">Tab Inside</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Product Layouts</a>
                <ul>
                    <li><a href="product-grid.html">Grid Images<span class="tip tip-new">New</span></a></li>
                    <li><a href="product-masonry.html">Masonry</a></li>
                    <li><a href="product-gallery.html">Gallery Type</a></li>
                    <li><a href="product-full.html">Full Width Layout</a></li>
                    <li><a href="product-sticky.html">Sticky Info</a></li>
                    <li><a href="product-sticky-both.html">Left &amp; Right Sticky</a></li>
                    <li><a href="product-horizontal.html">Horizontal Thumb</a></li>

                    <li><a href="#">Build Your Own</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">Pages</a>
        <ul>
            <li><a href="about-us.html">About</a></li>
            <li><a href="contact-us.html">Contact Us</a></li>
            <li><a href="account.html">Login</a></li>
            <li><a href="faq.html">FAQs</a></li>
            <li><a href="error-404.html">Error 404</a></li>
            <li><a href="coming-soon.html">Coming Soon</a></li>
        </ul>
    </li>
    <li>
        <a href="blog-classic.html">Blog</a>
        <ul>
            <li><a href="blog-classic.html">Classic</a></li>
            <li><a href="blog-listing.html">Listing</a></li>
            <li>
                <a href="#">Grid</a>
                <ul>
                    <li><a href="blog-grid-2col.html">Grid 2 columns</a></li>
                    <li><a href="blog-grid-3col.html">Grid 3 columns</a></li>
                    <li><a href="blog-grid-4col.html">Grid 4 columns</a></li>
                    <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Masonry</a>
                <ul>
                    <li><a href="blog-masonry-2col.html">Masonry 2 columns</a></li>
                    <li><a href="blog-masonry-3col.html">Masonry 3 columns</a></li>
                    <li><a href="blog-masonry-4col.html">Masonry 4 columns</a></li>
                    <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Mask</a>
                <ul>
                    <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                    <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                </ul>
            </li>
            <li>
                <a href="post-single.html">Single Post</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">Elements</a>
        <ul>
            <li><a href="element-products.html">Products</a></li>
            <li><a href="element-typography.html">Typography</a></li>
            <li><a href="element-titles.html">Titles</a></li>
            <li><a href="element-categories.html">Product Category</a></li>
            <li><a href="element-buttons.html">Buttons</a></li>
            <li><a href="element-accordions.html">Accordions</a></li>
            <li><a href="element-alerts.html">Alert &amp; Notification</a></li>
            <li><a href="element-tabs.html">Tabs</a></li>
            <li><a href="element-testimonials.html">Testimonials</a></li>
            <li><a href="element-blog-posts.html">Blog Posts</a></li>
            <li><a href="element-instagrams.html">Instagrams</a></li>
            <li><a href="element-cta.html">Call to Action</a></li>
            <li><a href="element-icon-boxes.html">Icon Boxes</a></li>
            <li><a href="element-icons.html">Icons</a></li>
        </ul>
    </li>
    <li><a href="https://d-themes.com/buynow/riodehtml" target="_blank">Buy Riode!</a></li>
</ul>
<!-- End MobileMenu -->
</div>
</div>
@endsection
@section('footer_js')


<!-- Main JS File -->
<script src="{{ asset('frontend/js/main.min.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>
<script>
$( document ).ready(function() {
    $('#pro_size').change(function{
        var pro_size = $('#pro_size').val();
     alert (pro_size);
    })
     
});
</script>
@endsection