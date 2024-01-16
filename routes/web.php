<?php

use Illuminate\Support\Facades\Route;

// controller for admin 
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\FiltersController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\RatingController;




// controller for front 
use App\Http\Controllers\Front\VendorController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\ProductsController as FrontProductsController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\AddressController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\CmsController;
use App\Http\Controllers\Front\RatingController as FrontRatingController;






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


// route for vendor 
Route::match(['get', 'post'], 'vendor/login-register', [VendorController::class, 'loginRegister'])->name('vendor.login');
Route::match(['get', 'post'], 'vendor/register', [VendorController::class, 'vendorRegister'])->name('vendor.register');
Route::get('vendor/confirm/{code}', [VendorController::class, 'vendorConfirm'])->name('vendor.confirm');


// route for admin 
Route::group([ 'prefix' => 'admin', 'as' => 'admin.'],function() {
    Route::match(['get', 'post'], 'login',  [AdminController::class, 'login'])->name('login'); 
    // Route::match(['get', 'post'], 'register',  [AdminController::class, 'register'])->name('register'); 
    Route::group(['middleware' => 'admin'], function() {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::match(['get', 'post'],'update-admin-password', [AdminController::class, 'updateAdminPassword'])->name('update.admin.password');
        Route::match(['get', 'post'],'update-admin-details', [AdminController::class, 'updateAdminDetail'])->name('update.admin.details');
        Route::get('logout', [AdminController::class, 'logout'])->name('logout');


        // udpate vendor commission 
        Route::match(['get', 'post'],'update-vendoer-commission', [AdminController::class, 'updateVendoerCommission'])->name('update.vendor.commission');

        // route for udate and view vendor details 
        Route::match(['get', 'post'],'update-vendoer-details/{slug}', [AdminController::class, 'updateVendoerDetail'])->name('update.vendor.details');


        Route::group(['middleware' => ['roles:admin']], function(){
                            
            // view vendor details 
            Route::get('view-admins/{slug?}', [AdminController::class, 'admins'])->name('view.admins');
            Route::get('view-vendor-details/{slug?}', [AdminController::class, 'viewVendorDetails'])->name('view.vendor.details');
            Route::post('update-admin-status', [AdminController::class, 'updateAdminStatus'])->name('update.admin.status');

            // route for section 
            Route::get('sections', [SectionController::class, 'sections'])->name('sections');
            Route::match(['get', 'post'], 'add-edit-section/{id?}', [SectionController::class, 'addEditSection'])->name('add.edit.section');
            Route::post('update-section-status', [SectionController::class, 'updateSectionStatus'])->name('update.section.status');
            Route::get('delete-section/{id}', [SectionController::class, 'deteteSection'])->name('delete.section');
            
            // route for categories 
            Route::get('categories', [CategoryController::class, 'categories'])->name('categories');
            Route::post('append-category-level', [CategoryController::class,'appendCategoryLevel'])->name('append.category.level');
            Route::match(['get', 'post'], 'add-edit-category/{id?}', [CategoryController::class, 'addEditCategory'])->name('add.edit.category');
            Route::post('update-category-status', [CategoryController::class, 'updateCategoryStatus'])->name('update.category.status');
            Route::get('delete-category/{id}', [CategoryController::class, 'deteteCategory'])->name('delete.category');
        
            // route for brand 
            Route::get('brands', [BrandController::class, 'brands'])->name('brands');
            Route::match(['get', 'post'], 'add-edit-brand/{id?}', [BrandController::class, 'addEditBrand'])->name('add.edit.brand');
            Route::post('update-brand-status', [BrandController::class, 'updateBrandStatus'])->name('update.brand.status');
            Route::get('delete-brand/{id}', [BrandController::class, 'deteteBrand'])->name('delete.brand');

            // Filters 
            Route::get('filters', [FiltersController::class, 'filters'])->name('filters');
            Route::get('filters-values', [FiltersController::class, 'filtersValues'])->name('filters.values');
            Route::match(['get', 'post'], 'add-edit-filter/{id?}', [FiltersController::class, 'addEditFilter'])->name('add.edit.filter');
            Route::match(['get', 'post'], 'add-edit-filter-value/{id?}', [FiltersController::class, 'addEditFilterValue'])->name('add.edit.filter.value');
            Route::post('update-filter-status', [FiltersController::class, 'updateFilterStatus'])->name('update.filter.status');
            Route::post('update-filter-value-status', [FiltersController::class, 'updateFilterValueStatus'])->name('update.filter.value.status');
            Route::get('delete-filter/{id}', [FiltersController::class, 'deteteFilter'])->name('delete.filter');
            Route::post('category-filters', [FiltersController::class, 'categoryFilter'])->name('category.filter');
            
            //    route for banner 
            Route::get('banners', [BannerController::class, 'banners'])->name('banners');
            Route::match(['get', 'post'], 'add-edit-banner/{id?}', [BannerController::class, 'addEditBanner'])->name('add.edit.banner');
            Route::post('update-banner-status', [BannerController::class, 'updateBannerStatus'])->name('update.banner.status');
            Route::get('delete-banner/{id}', [BannerController::class, 'deteteBanner'])->name('delete.banner');
                
            // route for newsletter 
            Route::get('subscribers', [NewsletterController::class, 'subscribers'])->name('subscribers');
            Route::post('update-subscriber-status', [NewsletterController::class, 'updateSubscriberStatus'])->name('update.subscriber.status');
            Route::get('delete-subscriber/{id}', [NewsletterController::class, 'deteteSubscriber'])->name('delete.subscriber'); 
            Route::get('export-subscriber', [NewsletterController::class,'exportSubscriber'])->name('export.subscriber');
            
            // route for users 
            Route::get('users', [AdminUserController::class, 'users'])->name('users');
            Route::post('update-user-status', [AdminUserController::class, 'updateUserStatus'])->name('update.user.status');
            Route::get('delete-user/{id}', [AdminUserController::class, 'deteteUser'])->name('delete.user');

            // rating 
            Route::get('ratings', [RatingController::class, 'ratings'])->name('ratings');
            Route::post('update-rating-status', [RatingController::class, 'updateRatingStatus'])->name('update.rating.status');
            Route::get('delete-rating/{id}', [RatingController::class, 'deteteRating'])->name('delete.rating');
               
            // shipping charges 
            Route::get('shipping', [ShippingController::class, 'shipping'])->name('shipping');
            Route::post('update-shipping-status', [ShippingController::class, 'updateShippingStatus'])->name('update.shipping.status');
            Route::match(['get', 'post'], 'edit-shipping/{id?}', [ShippingController::class, 'editShipping'])->name('edit.shipping');
        });

        // route for products 
        Route::get('products', [ProductsController::class, 'products'])->name('products');
        Route::match(['get', 'post'], 'add-edit-product/{id?}', [ProductsController::class, 'addEditProduct'])->name('add.edit.product');
        Route::post('update-product-status', [ProductsController::class, 'updateProductStatus'])->name('update.product.status');
        Route::get('delete-product/{id}', [ProductsController::class, 'deteteProduct'])->name('delete.product');

        //  route for attributes 
        Route::match(['get','post'], 'add-attributes/{id}', [ProductsController::class, 'addAttributes'])->name('add.attributes');
        Route::post('edit-attributes/{id?}',[ProductsController::class, 'editAttributes'])->name('edit.attributes');
        Route::post('update-attribute-status', [ProductsController::class, 'updateAttributeStatus'])->name('update.attribute.status');
        Route::get('add-attributes/delete-attribute/{id}', [ProductsController::class, 'deteteAttribute'])->name('delete.attribute');

        //  route for product image 
        Route::match(['get','post'], 'add-image/{id}', [ProductsController::class, 'addImage'])->name('add.image');
        Route::post('update-image-status', [ProductsController::class, 'updateProductImageStatus'])->name('update.image.status');
        Route::get('add-image/delete-image/{id}', [ProductsController::class, 'deteteImage'])->name('delete.image');
        
        // route for coupon code  
        Route::get('coupons', [CouponsController::class, 'coupons'])->name('coupons');
        Route::match(['get', 'post'], 'add-edit-coupon/{id?}', [CouponsController::class, 'addEditCoupon'])->name('add.edit.coupon');
        Route::post('update-coupon-status', [CouponsController::class, 'updateCouponStatus'])->name('update.coupon.status');
        Route::get('delete-coupon/{id}', [CouponsController::class, 'deteteCoupon'])->name('delete.coupon');

        // route for order 
        Route::get('orders', [AdminOrderController::class, 'orders'])->name('orders');
        Route::get('order/{id?}', [AdminOrderController::class, 'orderDetails'])->name('order.details');
        Route::post('udpate-order-status', [AdminOrderController::class, 'updateOrderStatus'])->name('update.order.status');
        Route::post('udpate-order-item-status', [AdminOrderController::class, 'updateOrderItemStatus'])->name('update.order.item.status');

        // order invoice 
        Route::get('order-invoice/{id}', [AdminOrderController::class, 'orderInvoice'])->name('order.invoice');
        Route::get('order-invoice/pdf/{id}', [AdminOrderController::class, 'orderInvoicePdf'])->name('order.invoice.pdf');

    });

});


// frontend 

Route::group([], function (){
    Route::get('/', [IndexController::class, 'index'])->name('index');

    // contact page 
    Route::match(['get', 'post'], 'contact', [CmsController::class, 'contact'])->name('contact');
    // about 
    Route::match(['get', 'post'], 'about', [CmsController::class, 'about'])->name('about');
    // faq
    Route::match(['get', 'post'], 'faq', [CmsController::class, 'faq'])->name('faq');

    // Newsletter
    Route::post( 'add-subscribe-email', [CmsController::class, 'addSubscriberEmail'])->name('add.subscribe.email');
    
    // rating 
    Route::post( 'add-rating', [FrontRatingController::class, 'addRating'])->name('add.rating');

    Route::group(['middleware'=>['auth']], function (){

        // user logout 
        Route::get('logout', [UserController::class, 'logout'])->name('logout');

        //  user current password 
        Route::post('user/check-current-password', [UserController::class, 'userCurrentPassword'])->name('current.password');

        // user update password 
        Route::post('user/update-password', [UserController::class, 'userUpdatePassword'])->name('upate.password');

        // user update account 
        Route::post('user/update-account', [UserController::class, 'userUpdateAccount'])->name('upate.account');

        //  user account 
        Route::get('user-account', [UserController::class, 'userAccount'])->name('account');

        //  apply coupon 
        Route::post('/apply-coupon', [FrontProductsController::class, 'applyCoupon'])->name('apply.coupon');

        // check out 
        Route::match(['get', 'post'], '/checkout', [FrontProductsController::class, 'checkout'])->name('checkout');
        
        // get-delivery-address
        Route::post('get-delivery-address', [AddressController::class, 'getDeliveryAddress'])->name('get.delivery.address');
        
        // save-delivery-address
        Route::post('save-delivery-address', [AddressController::class, 'saveDeliveryAddress'])->name('save.delivery.address');
        
        // remove-delivery-address
        Route::post('remove-delivery-address', [AddressController::class, 'removeDeliveryAddress'])->name('remove.delivery.address');

        // thanks  
        Route::get('thanks', [FrontProductsController::class, 'thanks'])->name('thanks');

        // order 
        Route::get('user/orders/{id?}', [OrderController::class, 'orders'])->name('orders');

    });
    // user login register 
    Route::match(['get', 'post'], 'user/login-register', [UserController::class, 'loginRegister'])->name('login');
    Route::post('user/register', [UserController::class, 'register'])->name('register');

    // login with google 
    Route::get('google', [UserController::class, 'google'])->name('google');
    Route::get('google/callback', [UserController::class, 'googleCallback'])->name('google.callback');


    // login with facebook 
    Route::get('facebook', [UserController::class, 'facebook'])->name('facebook');
    Route::get('facebook/callback', [UserController::class, 'facebookCallback'])->name('facebook.callback');

    // user confirmation 
    Route::get('user/confirm/{code}', [UserController::class, 'userConfirm'])->name('user.confirm');
    
    // for product details 
    Route::get('product/{id?}', [FrontProductsController::class, 'detail'])->name('product.detail');

    // search products 
    Route::get('serach-products', [FrontProductsController::class, 'listing'])->name('search.products');

    // check pincode 
    Route::post('check-pincode', [FrontProductsController::class, 'checkPincode']);


    // get product attribute price 
    Route::post('get-product-price', [FrontProductsController::class, 'getProductPrice'])->name('get.product.price');

    // vendor product 
    Route::get('vendor-product/{id?}', [FrontProductsController::class, 'vendorListing'])->name('vendor.product');

    // add product to cart 
    Route::post('add-cart', [FrontProductsController::class, 'addCart'])->name('add.cart');

    // view cart 
    Route::get('cart', [FrontProductsController::class, 'cart'])->name('cart');

    // update carte item qty
    Route::post('cart/update', [FrontProductsController::class, 'updateCartItemQty'])->name('update.cart');

    // delete cart item 
    Route::post('cart/delete', [FrontProductsController::class, 'deleteCart'])->name('delete.cart');

    // for listing products 
    Route::match(['get', 'post'], '/{url?}', [FrontProductsController::class, 'listing'])->name('listing');

    // return$catUrls = App\Models\Category::select('url')->where('status', 1)->get()->toArray();
    // foreach ($catUrls as  $key => $url) { 
    //     Route::get('/'.$url, [FrontProductsController::class, 'listing'])->name('listing');
    // }


});