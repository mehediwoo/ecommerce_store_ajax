<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\View_Product;
use App\Http\Controllers\User\CategoryProductController;
use App\Http\Controllers\User\SubCategoryProductController;
use App\Http\Controllers\User\ChildCategoryProductController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\AddToCartController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\PlaceOrderController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\WishListController;
use App\Http\Controllers\User\QuickViewProductController;



Route::get('/',[HomeController::class,'index'])->name('home');

// Category wise product's
Route::get('/category-product/{slug}',[CategoryProductController::class,'index'])->name('category.product');
Route::get('/cate-product',[CategoryProductController::class,'get_product'])->name('get.category.product');
Route::get('/product-filter',[CategoryProductController::class,'get_product'])->name('product.filter');

// sub category product
Route::get('/sub-category-product/{slug}',[SubCategoryProductController::class,'index'])->name('sub.cat.pro');
Route::get('/subcate-product',[SubCategoryProductController::class,'get_product'])->name('get.subCat.pro');
Route::get('/sub_cat-filter',[SubCategoryProductController::class,'get_product'])->name('sub.cat.pro.filter');

// Child category product
Route::get('/child-cat-product/{slug}',[ChildCategoryProductController::class,'index'])->name('child.cat.pro');
Route::get('/childcate-product',[ChildCategoryProductController::class,'get_product'])->name('get.childCat.pro');
Route::get('/child_cat-filter',[ChildCategoryProductController::class,'get_product'])->name('child.cat.pro.filter');

// get product wise brand ajax
Route::get('/brand-pro',[CategoryProductController::class,'get_brand_product'])->name('product.filter.brand');

// Shop
Route::get('/shop',[ShopController::class,'index'])->name('shop.index');
Route::get('/get-shop-iteam',[ShopController::class,'get_product'])->name('shop.get');

// view product
Route::get('/product/{slug}',[View_Product::class,'index'])->name('view.product');

// Quick View Product
Route::get('/quick-view',[QuickViewProductController::class,'get_product'])->name('get.product.quickView');

// Add To Cart
Route::get('/ad-to-cart',[AddToCartController::class,'Add_To_Cart'])->name('AddToCart');
Route::get('/load_cart',[AddToCartController::class,'loadCart'])->name('loadCart');

// Add To Wishlist
Route::get('/ad-to-Wishlist',[WishListController::class,'Add_To_Wishlist'])->name('AddToWishlist');
Route::get('/wishlist',[WishListController::class,'view_wishlist'])->name('view.wishlist')->middleware('customer_auth');
Route::get('/load-wishlist',[WishListController::class,'loadWishlist'])->name('loadWishlist')->middleware('customer_auth');
Route::get('/delete-wishlist',[WishListController::class,'delete'])->name('delete.wishlist')->middleware('customer_auth');

/*view full cart*/
Route::get('/view_cart',[AddToCartController::class,'view_cart'])->name('view.cart');
Route::get('/cart_data',[AddToCartController::class,'cart_data'])->name('cart.data');
Route::get('/remove_cart',[AddToCartController::class,'remove_cart'])->name('remove.cart.iteam');
Route::get('/cart_plus',[AddToCartController::class,'cart_plus'])->name('cart.plus');
Route::get('/cart_minus',[AddToCartController::class,'cart_minus'])->name('cart.minus');

// customer checkout
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout')->middleware('customer_auth');

// Save customer billing information
Route::get('/billing',[CheckoutController::class,'billing'])->name('billing')->middleware('customer_auth');
Route::post('/billing/store',[CheckoutController::class,'billing_store'])->name('billing.store')->middleware('customer_auth');

// Place Order Controller & Payment method API Controller
Route::post('place-order',[PlaceOrderController::class,'place_order'])->name('place.order');
Route::post('success',[PlaceOrderController::class,'success'])->name('success');
Route::post('fail',[PlaceOrderController::class,'fail'])->name('fail');
Route::get('cancel',[PlaceOrderController::class,'cancel'])->name('cancel');


// Customer Login & register
Route::get('/customer-authentication',[CustomerController::class,'customer_auth'])->name('customer.authentication');
Route::post('/customer_register',[CustomerController::class,'customer_register'])->name('customer.register');
Route::post('/customer_login',[CustomerController::class,'customer_login'])->name('customer.login');
Route::get('/customer_logout',[CustomerController::class,'customer_logout'])->name('customer.logout');
Route::get('/forget-password',[CustomerController::class,'forget_password'])->name('forget.password');
Route::post('/email/otp',[CustomerController::class,'OTP'])->name('forget.otp');
Route::get('/check-otp',[CustomerController::class,'check_otp'])->name('check.otp');
Route::post('/otp-match',[CustomerController::class,'match_otp'])->name('match.otp');
Route::get('/set-password',[CustomerController::class,'set_password'])->name('set.password');
Route::post('/store-password',[CustomerController::class,'store_password'])->name('store.password');



// customer profiles
Route::prefix('/profile/')->middleware('customer_auth')->group(function(){

    Route::get('dashboard',[ProfileController::class,'dashboard'])->name('customer.dashboard');
    Route::get('pending-order',[ProfileController::class,'pending_order'])->name('pending.order');
    Route::get('complete-order',[ProfileController::class,'complete_order'])->name('complete.order');

});
