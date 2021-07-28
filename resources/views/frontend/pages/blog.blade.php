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
                        <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                        <li><a href="#" class="active">Blog</a></li>
                        <li>Classic</li>
                    </ul>
                </div>
            </nav>
            <div class="page-content with-sidebar">
                <div class="container">
                    <div class="row gutter-lg">
                        <div class="col-lg-9">
                            <div class="posts">
                             @foreach ($blogs as $blog)
                                 
                                <article class="post post-classic mb-7">
                                    <figure class="post-media overlay-zoom">
                                        <a href="post-single.html">
                                            <img src="{{ url('images/blog/thumbnail',$blog->thumbnail) }}" width="870" height="420" alt="post" />
                                        </a>
                                    </figure>
                                    <div class="post-details">
                                        <div class="post-meta">
                                            by <a href="#" class="post-author">Admin</a>
                                            on <a href="#" class="post-date"></a>
                                            | <a href="#" class="post-comment"><span>3</span> Comments</a>
                                        </div>
                                        <h4 class="post-title"><a href="{{ route('frontend.single_blog',$blog->slug) }}">{{ $blog->title }}</a>
                                        </h4>
                                        <p class="post-content">Sed pretium, ligula sollicitudin laoreet viverra,
                                            tortor libero sodales leo, eget blandit nunc tortor eu nibh. Suspendisse
                                            potenti.
                                            Sed egestas, ante et vulputate volutpat, uctus metus libero eu augue.
                                        </p>
                                        <a href="post-single.html" class="btn btn-link btn-underline btn-primary">Read
                                            more<i class="d-icon-arrow-right"></i></a>
                                    </div>
                                </article>
                               @endforeach   
                            </div>
                            {{ $blogs->links('vendor.pagination.tailwind') }}
                        </div>
                        <aside class="col-lg-3 right-sidebar sidebar-fixed sticky-sidebar-wrapper">
                            <div class="sidebar-overlay">
                                <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                            </div>
                            <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-left"></i></a>
                            <div class="sidebar-content">
                                <div class="sticky-sidebar" data-sticky-options="{'top': 89, 'bottom': 70}">
                                    <div class="widget widget-search border-no mb-2">
                                        <form action="#" class="input-wrapper input-wrapper-inline btn-absolute">
                                            <input type="text" class="form-control" name="search" autocomplete="off"
                                                placeholder="Search in Blog" required />
                                            <button class="btn btn-search btn-link" type="submit">
                                                <i class="d-icon-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="widget widget-collapsible border-no">
                                        <h3 class="widget-title">Blog Categories</h3>
                                        <ul class="widget-body filter-items search-ul">
                                            <li><a href="#">Accessories</a></li>
                                            <li>
                                                <a href="#">Clothing</a>
                                                <ul class="children">
                                                    <li><a href="#">Summer Sale</a></li>
                                                    <li><a href="#">Winter Sale</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Musicial instruments</a>
                                                <ul class="children">
                                                    <li><a href="#">Headphone</a></li>
                                                    <li><a href="#">Speaker</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Fashion</a></li>
                                            <li><a href="#">Lifestyle</a></li>
                                            <li><a href="#">Backpack & Fashion bags</a></li>
                                        </ul>
                                    </div>
                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title">Popular Posts</h3>
                                        <div class="widget-body">
                                            <div class="post-col">
                                                <div class="post post-list-sm">
                                                    <figure class="post-media">
                                                        <a href="post-single.html">
                                                            <img src="images/blog/1_xs.jpg" width="90" height="90"
                                                                alt="post" />
                                                        </a>
                                                    </figure>
                                                    <div class="post-details">
                                                        <div class="post-meta">
                                                            <a href="#" class="post-date">Nov 22, 2020</a>
                                                        </div>
                                                        <h4 class="post-title"><a href="post-single.html">The Best
                                                                Choice For
                                                                Spending Time</a></h4>
                                                    </div>
                                                </div>
                                                <div class="post post-list-sm">
                                                    <figure class="post-media">
                                                        <a href="post-single.html">
                                                            <img src="images/blog/2_xs.jpg" width="90" height="90"
                                                                alt="post" />
                                                        </a>
                                                    </figure>
                                                    <div class="post-details">
                                                        <div class="post-meta">
                                                            <a href="#" class="post-date">Jun 6, 2019</a>
                                                        </div>
                                                        <h4 class="post-title"><a href="post-single.html">Women's
                                                                Fashion
                                                                Summer Dress</a></h4>
                                                    </div>
                                                </div>
                                                <div class="post post-list-sm">
                                                    <figure class="post-media">
                                                        <a href="post-single.html">
                                                            <img src="images/blog/3_xs.jpg" width="90" height="90"
                                                                alt="post" />
                                                        </a>
                                                    </figure>
                                                    <div class="post-details">
                                                        <div class="post-meta">
                                                            <a href="#" class="post-date">May 13, 2020</a>
                                                        </div>
                                                        <h4 class="post-title"><a href="post-single.html">Women’s
                                                                Sneaker</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title">About us</h3>
                                        <div class="widget-body">
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                nonummy nibh euismod tincidunt.</p>
                                        </div>
                                    </div>

                                    <div class="widget widget-posts widget-collapsible">
                                        <h3 class="widget-title">Tag Cloud</h3>
                                        <div class="widget-body">
                                            <a href="#" class="tag">Bag</a>
                                            <a href="#" class="tag">Classic</a>
                                            <a href="#" class="tag">Converse</a>
                                            <a href="#" class="tag">Leather</a>
                                            <a href="#" class="tag">Fit</a>
                                            <a href="#" class="tag">Green</a>
                                            <a href="#" class="tag">Man</a>
                                            <a href="#" class="tag">Jeans</a>
                                            <a href="#" class="tag">Women</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </main>
        <!-- End Main -->
        <!-- End Main -->
@endsection
@section('footer_js')
<script>

</script>