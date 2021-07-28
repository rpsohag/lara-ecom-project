<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Color;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Support\Facades\DB;

class ProductViewController extends Controller
{
    private function viewDataWithFilterElement(array $data): array
    {
        $filterElement = [
            'categories' => Category::where('status', 1)->orderBy('category_name', 'asc')->get(),
            'colors' => Color::all(),
            'sizes' => Size::all(),
            'brands' => Brand::all(),
        ];
        return array_merge($data, $filterElement);
    }


    private function getFilterdProducts($products, $colorFilter, $sizeFilter, $brandFilter, $minPrice, $maxPrice) 
    {
        if (!empty($colorFilter)) {
            $products = $products->whereIn('color_id', $colorFilter);
        }

        if (!empty($sizeFilter)) {
            $products = $products->whereIn('size_id', $sizeFilter);
        }

        if (!empty($brandFilter)) {
            $products = $products->whereIn('brand_id', $brandFilter);
        }

        if ($maxPrice && $minPrice) {
            $products = $products->whereBetween('price', [$minPrice, ($maxPrice + 1)]);
        }

        return $products;
    }

    public function product_list($slug)
    {
        $category = Category::where('slug', $slug)->first();

        $colorFilter = request()->colorFilter ?? [];
        $sizeFilter = request()->sizeFilter ?? [];
        $brandFilter = request()->brandFilter ?? [];
        $minPrice = request()->min_price ?? null;
        $maxPrice = request()->max_price ?? null;
        $hasLinks = false;

        if (empty($colorFilter) && empty($sizeFilter) && empty($brandFilter) && $minPrice == null && $maxPrice == null) {
            $products = Product::with('category')->where('cat_id', $category->id)->paginate(16);
            $hasLinks = true;

            $allProducts = Product::with('category')->where('cat_id', $category->id)->get();
            $maxProductPriceForCurrectCategory = $allProducts->max('price') ?? 100000;
            $minProductPriceForCurrectCategory = $allProducts->min('price') ?? 1;

        } else {
            $products = Product::with('category')->where('cat_id', $category->id)->get();

            $maxProductPriceForCurrectCategory = $products->max('price') ?? 100000;
            $minProductPriceForCurrectCategory = $products->min('price') ?? 1;

            $products = $this->getFilterdProducts($products, $colorFilter, $sizeFilter, $brandFilter, $minPrice, $maxPrice);
            $hasLinks = false;
        }

        
        $data = [
            'category' => $category,
            'products' => $products,
            'hasLinks' => $hasLinks,
            'slug'     => $slug,
            'colorFilter' => $colorFilter,
            'sizeFilter' => $sizeFilter,
            'brandFilter' => $brandFilter,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'maxProductPriceForCurrectCategory' => $maxProductPriceForCurrectCategory == $minProductPriceForCurrectCategory ? ($maxProductPriceForCurrectCategory + 1) : $maxProductPriceForCurrectCategory,
            'minProductPriceForCurrectCategory' => $minProductPriceForCurrectCategory
        ];
        
        return view('frontend.pages.product-grid', $this->viewDataWithFilterElement($data));
    }
    public function product_lists($slug)
    {
        $category = SubCategory::where('slug', $slug)->first();

        $colorFilter = request()->colorFilter ?? [];
        $sizeFilter = request()->sizeFilter ?? [];
        $brandFilter = request()->brandFilter ?? [];

        $minPrice = request()->min_price ?? null;
        $maxPrice = request()->max_price ?? null;
        $hasLinks = false;

        if (empty($colorFilter) && empty($sizeFilter) && empty($brandFilter) && $minPrice == null && $maxPrice == null) {
            $products = Product::with('category')->where('subcat_id', $category->id)->paginate(16);
            $hasLinks = true;

            $allProducts = Product::with('category')->where('subcat_id', $category->id)->get();
            $maxProductPriceForCurrectCategory = $allProducts->max('price') ?? 100000;
            $minProductPriceForCurrectCategory = $allProducts->min('price') ?? 1;

        } else {
            $products = Product::with('category')->where('subcat_id', $category->id)->get();

            $maxProductPriceForCurrectCategory = $products->max('price') ?? 100000;
            $minProductPriceForCurrectCategory = $products->min('price') ?? 1;

            $products = $this->getFilterdProducts($products, $colorFilter, $sizeFilter, $brandFilter, $minPrice, $maxPrice);
            $hasLinks = false;
        }

        
        $data = [
            'subcategory' => $category,
            'products' => $products,
            'hasLinks' => $hasLinks,
            'slug'     => $slug,
            'colorFilter' => $colorFilter,
            'sizeFilter' => $sizeFilter,
            'brandFilter' => $brandFilter,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'maxProductPriceForCurrectCategory' => $maxProductPriceForCurrectCategory == $minProductPriceForCurrectCategory ? ($maxProductPriceForCurrectCategory + 1) : $maxProductPriceForCurrectCategory,
            'minProductPriceForCurrectCategory' => $minProductPriceForCurrectCategory
        ];

        return view('frontend.pages.product-grid',$this->viewDataWithFilterElement($data));
    }

    public function product_listss($slug)
    {
        $category = SubSubCategory::where('slug', $slug)->first();

        $colorFilter = request()->colorFilter ?? [];
        $sizeFilter = request()->sizeFilter ?? [];
        $brandFilter = request()->brandFilter ?? [];

        $minPrice = request()->min_price ?? null;
        $maxPrice = request()->max_price ?? null;
        $hasLinks = false;

        if (empty($colorFilter) && empty($sizeFilter) && empty($brandFilter) && $minPrice == null && $maxPrice == null) {
            $products = Product::with('category')->where('subsubcat_id', $category->id)->paginate(16);
            $hasLinks = true;

            $allProducts = Product::with('category')->where('subsubcat_id', $category->id)->get();
            $maxProductPriceForCurrectCategory = $allProducts->max('price') ?? 100000;
            $minProductPriceForCurrectCategory = $allProducts->min('price') ?? 1;

        } else {
            $products = Product::with('category')->where('subsubcat_id', $category->id)->get();

            $maxProductPriceForCurrectCategory = $products->max('price') ?? 100000;
            $minProductPriceForCurrectCategory = $products->min('price') ?? 1;

            $products = $this->getFilterdProducts($products, $colorFilter, $sizeFilter, $brandFilter, $minPrice, $maxPrice);
            $hasLinks = false;
        }
        
        $data = [
            'subsubcategory' => $category,
            'products' => $products,
            'hasLinks' => $hasLinks,
            'slug'     => $slug,
            'colorFilter' => $colorFilter,
            'sizeFilter' => $sizeFilter,
            'brandFilter' => $brandFilter,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'maxProductPriceForCurrectCategory' => $maxProductPriceForCurrectCategory == $minProductPriceForCurrectCategory ? ($maxProductPriceForCurrectCategory + 1) : $maxProductPriceForCurrectCategory,
            'minProductPriceForCurrectCategory' => $minProductPriceForCurrectCategory
        ];

        return view('frontend.pages.product-grid', $this->viewDataWithFilterElement($data));
    }

    
    public function productSearch(Request $request){
        $recent_products=Product::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $products=Product::orwhere('product_name','like','%'.$request->search.'%')
                    ->orwhere('slug','like','%'.$request->search.'%')
                    ->orwhere('description','like','%'.$request->search.'%')
                    ->orwhere('summary','like','%'.$request->search.'%')
                    ->orwhere('price','like','%'.$request->search.'%')
                    ->orderBy('id','DESC')
                    ->paginate('16');
        return view('frontend.pages.search-product')->with('products',$products)->with('recent_products',$recent_products);

    }

}
