<?php

use App\Http\Controllers\Backend\AdminOrderController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\AdminsController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Auth\ForgetPasswordController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ProductDetailsController;
use App\Http\Controllers\Frontend\ProductViewController;
use App\Http\Controllers\Frontend\ProductComponentController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\BlogsController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\OrderTrackController;
use App\Http\Controllers\Frontend\ProductReviewController;
use App\Http\Controllers\Frontend\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Route::get('/', 'HomeController@redirectAdmin')->name('index');
Route::get('/', [IndexController::class,'index'])->name('frontend.index');
Route::get('/single-product/{slug}', [ProductDetailsController::class,'product_details'])->name('frontend.product.details');
Route::get('/product-list/{slug}', [ProductViewController::class,'product_list'])->name('frontend.product.list');
Route::get('/product-lists/{slug}', [ProductViewController::class,'product_lists'])->name('frontend.product.lists');
Route::get('/product-listss/{slug}', [ProductViewController::class,'product_listss'])->name('frontend.product.listss');
Route::get('/category/{category_slug}',[ProductComponentController::class,'category'])->name('frontend.product.category');
Route::match(['get', 'post'],'/product-filter', [ProductViewController::class,'product_filter'])->name('product.filter');


Route::get('/product/search', [ProductViewController::class,'productSearch'])->name('product.search');

Route::match(['get','post'],'add-to-cart',[CartController::class,'addtocart'])->name('addtocart');
Route::get('view-cart',[CartController::class,'view_cart'])->name('view_cart');
Route::get('delete-from-cart/{id}',[CartController::class,'delete_from_cart'])->name('delete_from_cart');
Route::post('quantity/update',[CartController::class,'CartUpdate'])->name('CartUpdate');

//

Route::get('/view-wishlist',[WishlistController::class,'view_wishlist'])->name('view_wishlist');
Route::match(['get','post'],'add-wishlist',[WishlistController::class,'add_wishlist'])->name('add_wishlist');
Route::get('delete-from-wishlist/{id}',[WishlistController::class,'delete_from_wishlist'])->name('delete_from_wishlist');


// Checkout Route

Route::get('checkout',[CheckoutController::class,'view_checkout'])->name('view_checkout');

Route::get('success-order',[OrderController::class,'order_success'])->name('order_success');
// Checkout route end

// User profile start
Route::get('user-profile',[UserProfileController::class,'user_profile'])->name('user_profile');
Route::get('change-password',[UserProfileController::class,'change_password'])->name('change_password');
Route::post('change-password-update',[UserProfileController::class,'user_password_update'])->name('user_password_update');

// User profile end
// frontend blog route 
Route::get('blog',[BlogsController::class,'view_blog'])->name('frontend.blog');
Route::get('blog-details/{slug}',[BlogsController::class,'single_blog'])->name('frontend.single_blog');  
// frontend blog route

Route::get('/api/get-division-list/{id}',[CheckoutController::class,'GetDivision'])->name('GetDivision');
Route::get('/api/get-district-list/{district_id}',[CheckoutController::class,'GetDistrict'])->name('GetDistrict');
Route::get('/api/get-thana-list/{thana_id}',[CheckoutController::class,'GetThana'])->name('GetThana');

Route::post('/order-store',[OrderController::class,'order_store'])->name('order_store');
Route::get('/order-read',[UserController::class,'read_order'])->name('read_order');
Route::get('/order-details/{order_id}',[UserController::class,'order_details'])->name('order_details');


Route::post('/product-review',[ProductReviewController::class,'ProductReview'])->name('ProductReview');

Route::get('/order-track',[OrderTrackController::class,'OrderTrack'])->name('OrderTrack');
Route::post('/order-track-view',[OrderTrackController::class,'OrderTrackView'])->name('OrderTrackView');


/**
 * Admin routes
 */
Route::group(['prefix' => 'bbazar'], function () {
    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::resource('roles', RolesController::class, ['names' => 'admin.roles']);
    Route::resource('users', UsersController::class, ['names' => 'admin.users']);
    Route::resource('admins', AdminsController::class, ['names' => 'admin.admins']);
    // Login Routes
    Route::get('/login',[LoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('/login/submit',[LoginController::class,'login'])->name('admin.login.submit');
    // Logout Routes
    Route::post('/logout/submit', [LoginController::class,'logout'],'logout')->name('admin.logout.submit');
    // Forget Password Routes
    Route::get('/password/reset', [ForgetPasswordController::class,'showLinkRequestForm'],'showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/submit', [ForgetPasswordController::class,'reset'])->name('admin.password.update');
    // Category Routes
    Route::resource('/category',CategoryController::class,['names' => 'admin.category']);
    Route::resource('/subcategory',SubCategoryController::class,['names' => 'admin.subcategory']);
    Route::resource('/subsubcategory',SubSubCategoryController::class,['names' => 'admin.subsubcategory']);
    //Manage Color
    Route::resource('/color',ColorController::class,['names' => 'admin.color']);
    Route::resource('/size',SizeController::class,['names' => 'admin.size']);
    Route::resource('/brand',BrandController::class,['names' => 'admin.brand']);
    Route::get('/product',[ProductController::class,'index'])->name('admin.product.index');
    Route::get('/product/create',[ProductController::class,'create'])->name('admin.product.create');
    Route::post('/product/store',[ProductController::class,'store'])->name('admin.product.store');
    Route::get('/product/attribute/{id}',[ProductController::class,'attribute'])->name('admin.product.attribute');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
    Route::post('/product/update/{id}',[ProductController::class,'update'])->name('admin.product.update');
    Route::get('/product/destroy/{id}',[ProductController::class,'destroy'])->name('admin.product.destroy');
    // product attribute start
    Route::get('/product/attribute/{id}',[ProductController::class,'attribute'])->name('admin.product.attribute');
    Route::post('/product/attribute/store',[ProductController::class,'pro_attribute_store'])->name('admin.product.attribute.store');
    Route::get('/product/attribute/destroy/{id}',[ProductController::class,'pro_attribute_destroy'])->name('admin.product.attribute.destroy');
    //product attribute end
    //product image start
    Route::get('/product-image/{id}',[ProductController::class,'pro_image'])->name('admin.product.image');
    Route::post('/product-image/store',[ProductController::class,'pro_image_store'])->name('admin.product.image.store');
    Route::post('/product-image/destroy',[ProductController::class,'pro_image_destroy'])->name('admin.product.image.destroy');

    //producct image end
    Route::get('view-blog',[BlogController::class,'view_blog'])->name('admin.view_blog');
    Route::get('create-blog',[BlogController::class,'create_blog'])->name('admin.create_blog'); 
    Route::post('store-blog',[BlogController::class,'store_blog'])->name('admin.store_blog'); 
    Route::get('edit-blog/{id}',[BlogController::class,'edit_blog'])->name('admin.edit_blog'); 
    Route::post('update-blog/{id}',[BlogController::class,'update_blog'])->name('admin.update_blog'); 
    Route::get('delete-blog/{id}',[BlogController::class,'delete_blog'])->name('admin.delete_blog'); 

    // order details route
    Route::get('view-orders',[AdminOrderController::class,'view_order'])->name('admin.view_order');
    Route::get('view-orders-details/{order_id}',[AdminOrderController::class,'view_order_details'])->name('admin.view_order_details');
    Route::post('/view-orders-details/change-status/{id}',[AdminOrderController::class,'change_order_status'])->name('change_order_status');
    // order details route

});

Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
    });



    Route::get("/test", function(){
        return "Git Hub Test Line";
    });