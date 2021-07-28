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
        <main class="main">
			<nav class="breadcrumb-nav">
				<div class="container">
					<ul class="breadcrumb">
						<li><a href="{{ route('frontend.index') }}"><i class="d-icon-home"></i></a></li>
						<li>Wishlist</li>
					</ul>
				</div>
			</nav>
			<div class="page-content pt-10 pb-10 mb-2">
				<div class="container">
					@if ($wishlists->isEmpty())
<div class="container">
	<div class="row">
		<span class="text-center" style="font-size: 30px;">No product in your wishlist</span>
	</div>
</div>
					@else
					<table class="shop-table wishlist-table mt-2 mb-4">
						<thead>
							<tr>
								<th class="product-name"><span>Product</span></th>
								<th></th>
								<th class="product-price"><span>Price</span></th>
								<th class="product-stock-status"><span>Stock status</span></th>
								<th class="product-add-to-cart"></th>
								<th class="product-remove"></th>
							</tr>
						</thead>
						<tbody class="wishlist-items-wrapper">
					@foreach ($wishlists as $wishlist)
							<tr>
								<td class="product-thumbnail">
									<a href="product-simple.html">
										<figure>
											<img src="{{ url('images/product/thumbnail/',$wishlist->product->thumbnail) }}" width="100" height="100"
												alt="product">
										</figure>
									</a>
								</td>
								<td class="product-name">
									<a href="product-simple.html">{{ $wishlist->product->product_name }}</a>
								</td>
								<td class="product-price">
									<span class="amount">৳ {{ $wishlist->product->price }}</span>
								</td>
								<td class="product-stock-status">
									@if ($wishlist->product->stock >=1)

									<span class="wishlist-out-stock">Stock</span>
										
									@else
										
									<span class="wishlist-out-stock">Out of Stock</span>
										
									@endif
									
								</td>
								<td class="product-add-to-cart">
									<form action="{{ route('addtocart') }}" method="post">
										@csrf
										<input type="hidden" class="product_id" name="product_id" value="{{ $wishlist->product->id }}">
										<input type="hidden" class="product_id" name="quantity" value="1">
										<input type="hidden" class="product_id" name="color" value="{{ $wishlist->product->color->color }}">
										<input type="hidden" class="product_id" name="size" value="{{ $wishlist->product->size->size }}">
										<input type="hidden" class="product_id" name="price" value="{{ $wishlist->product->price }}">
									<button type="submit" class="btn-product btn-primary"  style="width: 55%;"><span>Add to cart</span></button>
									</form>
								</td>
								<td class="product-remove">
									<div>
										<a href="{{ route('delete_from_wishlist', $wishlist->id) }}" class="remove" title="Remove this product"><i
												class="fas fa-times"></i></a>
									</div>
								</td>
							</tr>
					@endforeach
						</tbody>
					</table>
					@endif
				</div>
			</div>
		</main>
		<!-- End Main -->
@endsection
@section('footer_js')
<script>

</script>