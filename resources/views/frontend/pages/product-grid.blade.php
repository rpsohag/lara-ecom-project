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

        @php
        $filterRoute = route('frontend.product.list', $slug);
                if(isset($category)) 
                    $filterRoute = route('frontend.product.list', $slug);
                elseif(isset($subcategory))
                    $filterRoute = route('frontend.product.lists', $slug);
                elseif(isset($subsubcategory))
                    $filterRoute = route('frontend.product.listss', $slug);
        @endphp
<form action="{{ $filterRoute }}" method="get" id="filter-form">
@csrf

        <!-- End PageHeader -->
        <div class="page-content mb-10 pb-6">
            <div class="container">
                <div class="row gutter-lg main-content-wrap">
                    <aside
                        class="col-lg-3 sidebar sidebar-fixed sidebar-toggle-remain shop-sidebar sticky-sidebar-wrapper">
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                        <div class="sidebar-content">
                            <div class="sticky-sidebar" data-sticky-options="{'top': 10}">
                                <div class="filter-actions mb-4">
                                    <a href="#"
                                        class="sidebar-toggle-btn toggle-remain btn btn-outline btn-primary btn-rounded btn-icon-right">Filter<i
                                            class="d-icon-arrow-left"></i></a>
                                    <a href="#" class="filter-clean">Clean All</a>
                                </div>
                                
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">All Categories</h3>
                                    <ul class="widget-body filter-items search-ul">
                                        @if ($categories)
                                            @foreach ($categories as $category)
                                                <li><a href="{{ route('frontend.product.list',$category->slug) }}">{{ $category->category_name }}</a></li>
                                            @endforeach
                                        @endif
                                        
                               

                                    </ul>
                                </div>


                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title">Filter by Price</h3>
                                        <div class="widget-body mt-3">

                                                <div class="filter-price-slider"></div>

                                                <div class="filter-actions">
                                                    <div class="filter-price-text mb-4">Price:
                                                        <span class="filter-price-range"></span>
                                                    </div>
                                                </div>

                                                <input id="skip-value-lower" type="hidden" name="min_price" class="form-control mb-2" placeholder="Min Price" value="1">
                                                <input id="skip-value-upper" type="hidden" name="max_price" class="form-control mb-2" placeholder="Max Price" value="1">
                                        </div>
                                    </div>
                                    
                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title">Color</h3>
                                        <ul class="widget-body filter-items">

                                        @foreach ($colors as $color)
                                            <li>
                                                <input type="checkbox" name="colorFilter[]" @if(in_array($color->id, $colorFilter)) checked @endif value="{{ $color->id }}" class="colorFilter checkmark">
                                                <label for="vehicle1"> {{ $color->color }}</label>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>

                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title">Size</h3>
                                        <ul class="widget-body filter-items">

                                        @foreach ($sizes as $value)
                                            <li>
                                                <input type="checkbox" name="sizeFilter[]" @if(in_array($value->id, $sizeFilter)) checked @endif value="{{ $value->id }}" class="sizeFilter checkmark">
                                                <label for="vehicle1"> {{ $value->size }}</label>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>


                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title">Brands</h3>
                                        <ul class="widget-body filter-items">
                                        @foreach ($brands as $value)
                                            <li>
                                                <input type="checkbox" name="brandFilter[]" @if(in_array($value->id, $brandFilter)) checked @endif value="{{ $value->id }}" class="brandFilter checkmark">
                                                <label for="vehicle1"> {{ $value->brand_name }}</label>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>

                            </div>
                        </div>
                    </aside>
                </form>
                    <div class="col-lg-9 main-content">
                        <nav class="toolbox sticky-toolbox sticky-content fix-top">
                            <div class="toolbox-left">
                                <a href="#"
                                    class="toolbox-item left-sidebar-toggle btn btn-sm btn-outline btn-primary 
                                        btn-rounded btn-icon-right  d-lg-none">Filter<i
                                        class="d-icon-arrow-right"></i></a>
                                <div class="toolbox-item toolbox-sort select-box text-dark">
                                    <label>Sort By :</label>
                                    <select name="orderby" class="form-control">
                                        <option value="default">Default</option>
                                        <option value="popularity" selected="selected">Most Popular</option>
                                        <option value="rating">Average rating</option>
                                        <option value="date">Latest</option>
                                        <option value="price-low">Sort forward price low</option>
                                        <option value="price-high">Sort forward price high</option>
                                        <option value="">Clear custom sort</option>
                                    </select>
                                </div>
                            </div>
                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show select-box text-dark">
                                    <label>Show :</label>
                                    <select name="count" class="form-control">
                                        <option value="12">16</option>
                                    </select>
                                </div>
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
                        @if($hasLinks)
                            {!! $products->links() !!}
                        @endif
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

@endsection
@section('footer_js')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/nouislider/nouislider.min.css') }}">
<script>
$( document ).ready(function() {

    Riode.priceSlider = function(e, t) {
        "object" == typeof noUiSlider && Riode.$(e).each(function() {
            
            var e = this;
            noUiSlider.create(e, $.extend(!0, {

                
                
                start: [{{ isset($minPrice) ? $minPrice : $minProductPriceForCurrectCategory }}, {{ isset($maxPrice) ? $maxPrice : $maxProductPriceForCurrectCategory }}],
                connect: !0,
                step: 1,
                range: {
                    min: {{ $minProductPriceForCurrectCategory }},
                    max: {{ $maxProductPriceForCurrectCategory }}
                }
            }, t)), 
            e.noUiSlider.on("update", function(t, i) {
                $('#skip-value-upper').val(parseInt(t[1]))
                $('#skip-value-lower').val(parseInt(t[0]))
                
                t = t.map(function(e) {
                    return "৳ " + parseInt(e)
                });
                
                $(e).parent().find(".filter-price-range").text(t.join(" - "))
            }),
            e.noUiSlider.on("end", function(t, i) {
                $('#filter-form').submit();
            }),
            e.noUiSlider.on("set", function(t, i) {
                $('#filter-form').submit();
            })
        })
    }


    $(document).on('change', '.colorFilter', function() {
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
        $('#filter-form').submit();
    })

    $(document).on('change', '.brandFilter', function() {
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
        $('#filter-form').submit();
    })

    $(document).on('change', '.sizeFilter', function() {
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
        $('#filter-form').submit();
    })

});
</script>
@endsection
