<div class="dropdown category-dropdown has-border fixed">
    <a href="#" class="text-white font-weight-semi-bold category-toggle"><i
            class="d-icon-bars2"></i><span>Shop By Categories</span></a>

            @php
            $categories = App\Models\Category::where('status',1)->orderBy('category_name','asc')->get();
            @endphp
    <!-- <div class="dropdown-overlay"></div> -->
    <div class="dropdown-box">
        <ul class="menu vertical-menu category-menu">
            <li><a href="demo22-shop.html" class="menu-title">Browse Our
                    Categories</a></li>
            @foreach ($categories as $category)
            <li class="submenu">
                <a href="{{ route('frontend.product.list',$category->slug) }}"><i class="{{ $category->icon }}"></i>{{ $category->category_name }}</a>
                @if ($category->subcategory->isEmpty())
                @else    
                <ul>
                        
                    @foreach ($category->subcategory as $subcat)
                    <li><a href="{{ route('frontend.product.lists',$subcat->slug) }}">{{ $subcat->subcategory_name }}</a>
                        @if ($subcat->subsubcategory->isEmpty())
                        @else    
                        <ul>

                            @foreach ($subcat->subsubcategory as $subsubcat)
                            <li><a href="{{ route('frontend.product.listss',$subsubcat->slug) }}">{{ $subsubcat->subsubcategory_name }}</a></li>
                            @endforeach

                        </ul>
                        @endif
                    </li>
                    @endforeach
                  </ul>  
    @endif

                
            </li>
           @endforeach
        </ul>
    </div>
</div>