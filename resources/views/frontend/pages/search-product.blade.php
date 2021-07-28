@extends('frontend.master')
@section('style_css')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/nouislider/nouislider.min.css') }}">

<style>

input {
    -webkit-appearance: auto;
}


/* Create a custom checkbox */
.checkmark {
  top: 0;
  left: 0;
  height: 17px;
  width: 18px;
  background-color: #eee;
}


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
    <!-- End Header -->
    <main class="main">

        <!-- End PageHeader -->
        <div class="page-content mb-10 pb-6">
            <div class="container">
                <div class="row gutter-lg main-content-wrap">
                    <div class="col-lg-12 main-content">
                        <nav class="toolbox sticky-toolbox sticky-content fix-top">
                            <div >
                                <p class="text-center">{{ $products->count() }} Products Found</p>
                            </div>
                        </nav>
                         @if ($products->count() <= 0)
                            <div class="text-center">
                              <img class="text-center" src="{{ asset('frontend/images/no-product.png') }}" width="50%" style="margin-top:50px;" alt="">
                            </div>
                            @else
                        <div class="row cols-2 cols-sm-3 cols-md-4 product-wrapper">
  
                    @foreach ($products as $product)
                            <div class="product-wrap">
                                <div class="product product_data">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="{{ url('images/product/thumbnail/',$product->thumbnail) }}" alt="product" width="280" height="315">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                        </div>
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
                                        <div class="product-cat">
                                            <a href="shop-grid-3col.html">Clothing</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="{{ route('frontend.product.details', $product->slug) }}">{{ $product->product_name }}</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">৳ {{ $product->price }}</ins><del class="old-price">৳ {{ $product->discount }}</del>
                                        </div>
                                        {{-- <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width:100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product.html" class="rating-reviews">( 6 reviews )</a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                  @endforeach
@endif
                        </div>
                   
                            {!! $products->links() !!}
                  
                        {{-- <nav class="toolbox toolbox-pagination">
                            <p class="show-info">Showing 12 of 56 Products</p>
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                                        aria-disabled="true">
                                        <i class="d-icon-arrow-left"></i>Prev
                                    </a>
                                </li>
                                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item page-item-dots"><a class="page-link" href="#">6</a></li>
                                <li class="page-item">
                                    <a class="page-link page-link-next" href="#" aria-label="Next">
                                        Next<i class="d-icon-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav> --}}
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<!-- Sticky Footer -->
<!-- Scroll Top -->
<a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>

{{-- <div class="minipopup-box cart-added-box original">
    <p class="minipopup-title">
        Successfully added.
        <a href="#" class="btn btn-link btn-sm btn-slide-right btn-infinite">View Cart<i
                class="d-icon-arrow-right"></i></a>
    </p>
    <div class="product product-cart">
        <figure class="product-media">
            <a href="#">
                <img src="{{ asset('frontend/images/cart/product-1.jpg') }}" alt="product" width="90" height="90" />
            </a>
        </figure>
        <div class="product-detail">
            <a href="product.html" class="product-name">Coast Pool Comfort Jacket</a>
            <div class="price-box">
                <span class="product-quantity">1</span>
                <span class="product-price">$21.00</span>
            </div>
        </div>
    </div>
</div> --}}
<!-- End Cart Added Box -->

{{-- <div class="minipopup-box purchased-box">
    <p class="minipopup-title">Someone just purchased below.</p>
    <div class="product product-list-sm mb-4">
        <figure class="product-media">
            <a href="#">
                <img src="{{ asset('frontend/images/cart/product-1.jpg') }}" alt="product" width="90" height="90" />
            </a>
        </figure>
        <div class="product-detail">
            <a href="product.html" class="product-name">Daisy Bag Sonia by Sonia Rykiel</a>
            <span class="product-price">$199.00</span>
            <div class="ratings-container">
                <div class="ratings-full">
                    <span class="ratings" style="width:100%"></span>
                    <span class="tooltiptext tooltip-top"></span>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- End Purchased Box -->

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
                <a href="#" class="active">Categories</a>
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
                <a href="product.html">Products</a>
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

@endsection
