<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\AdminAuthenticationController;
use App\Http\Controllers\Admin\OrderController;

// Admin Route

Route::prefix('admins/')->middleware('admin_auth')->group(function(){

    // Dashboard Route
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

    // Category  Route
    Route::get('category',[CategoryController::class,'index'])->name('category');
    Route::post('category-store',[CategoryController::class,'store'])->name('category.store');
    Route::get('get-category',[CategoryController::class,'getCategory'])->name('get.category');
    Route::post('update-category',[CategoryController::class,'update'])->name('update.category');
    Route::get('cate-delete',[CategoryController::class,'destroy'])->name('cate.delete');
    Route::get('cate-status',[CategoryController::class,'status'])->name('cate.status');

    // sub Category  Route
    Route::get('sub-category',[SubCategoryController::class,'index'])->name('sub.category');
    Route::post('sub-cat-store',[SubCategoryController::class,'store'])->name('sub.cat.store');
    Route::get('get-sub-cat',[SubCategoryController::class,'getSubCategory'])->name('get.sub.cat');
    Route::post('update-sub-cat',[SubCategoryController::class,'update'])->name('update.sub.cat');
    Route::get('delete-sub-cat',[SubCategoryController::class,'destroy'])->name('delete.sub.cat');
    Route::get('sub-cat-status',[SubCategoryController::class,'status'])->name('sub.cat.status');

    // Child Category Route
    Route::get('child-category',[ChildCategoryController::class,'index'])->name('child.category');
    Route::post('child-cat-store',[ChildCategoryController::class,'store'])->name('child.cat.store');
    Route::get('get-child-cat',[ChildCategoryController::class,'getChildCategory'])->name('get.child.cat');
    Route::post('update-child-cat',[ChildCategoryController::class,'update'])->name('update.child.cat');
    Route::get('delete-child-cat',[ChildCategoryController::class,'destroy'])->name('delete.child.cat');
    Route::get('child-cat-status',[ChildCategoryController::class,'status'])->name('child.cat.status');

    //  Brand Route
    Route::get('brand',[BrandController::class,'index'])->name('brand.index');
    Route::post('brand-store',[BrandController::class,'store'])->name('brand.store');
    Route::get('get-brand',[BrandController::class,'getBrand'])->name('get.brand');
    Route::post('update-brand',[BrandController::class,'update'])->name('update.brand');
    Route::get('delete-brand',[BrandController::class,'destroy'])->name('delete.brand');
    Route::get('brand-status',[BrandController::class,'status'])->name('brand.status');

    // Product Route
    Route::get('product',[ProductController::class,'index'])->name('product.index');
    Route::post('product-store',[ProductController::class,'store'])->name('pro.store');
    Route::get('product-delete',[ProductController::class,'destroy'])->name('pro.delete');
    Route::get('get-product',[ProductController::class,'show'])->name('product.show');
    Route::get('get-subcategory',[ProductController::class,'getSubCategory'])->name('getSubCat');
    Route::get('get-child-category',[ProductController::class,'getChildCategory'])->name('getChildCat');
    Route::post('product-update',[ProductController::class,'update'])->name('pro.update');
    Route::get('product-status',[ProductController::class,'status'])->name('pro.status');

    // Dynamic page
    Route::get('page',[PageController::class,'index'])->name('page.index');
    Route::post('page/store',[PageController::class,'store'])->name('page.store');
    Route::get('page/get',[PageController::class,'getPage'])->name('page.get');
    Route::post('page/update',[PageController::class,'update'])->name('page.update');
    Route::post('page/delete',[PageController::class,'destroy'])->name('page.delete');
    Route::get('page/status',[PageController::class,'status'])->name('page.status');
    

    // Order route
    Route::get('pending-order',[OrderController::class,'index'])->name('pending.order.index');
    Route::get('pending-orders',[OrderController::class,'get_pending_order'])->name('get.pending.order');
    Route::get('order-status',[OrderController::class,'mark_as_confirm'])->name('order.status');
    Route::get('complete-order',[OrderController::class,'complete_order'])->name('all.complete.order');

    // Settings Modiul
        
        // Payment Method Integration
        Route::get('payment/method',[PaymentController::class,'index'])->name('payment.index');
        Route::post('payment/store',[PaymentController::class,'store'])->name('payment.store');
        Route::get('get/payment',[PaymentController::class,'get_payment'])->name('get.payment');
        Route::post('update/payment',[PaymentController::class,'payment_update'])->name('payment.update');
        Route::get('payment/delete',[PaymentController::class,'payment_delete'])->name('payment.delete');
        Route::get('payment/status',[PaymentController::class,'payment_status'])->name('payment.status');

        // Footer
        Route::get('setting',[FooterController::class,'index'])->name('footer.index');
        Route::post('setting/footer-update',[FooterController::class,'FooterUpdate'])->name('footer.update');
        Route::post('setting/social',[FooterController::class,'social'])->name('social.update');
        Route::post('setting/banner',[FooterController::class,'banner'])->name('banner.update');

        //currency
        Route::get('setting/currency',[CurrencyController::class,'index'])->name('currency.index');
        Route::get('setting/currency/get',[CurrencyController::class,'getCurrency'])->name('currency.get');
        Route::post('setting/currency-store',[CurrencyController::class,'store'])->name('currency.store');
        Route::post('setting/currency-delete',[CurrencyController::class,'destroy'])->name('currency.delete');
        Route::post('setting/currency-update',[CurrencyController::class,'update'])->name('currency.update');
});

Route::prefix('admin-auth/')->group(function(){

    Route::get('login',[AdminAuthenticationController::class,'index'])->name('login.index');
    Route::post('login-request',[AdminAuthenticationController::class,'login'])->name('admin.login');
    Route::get('admin-logout',[AdminAuthenticationController::class,'logout'])->name('admin.logout');

});