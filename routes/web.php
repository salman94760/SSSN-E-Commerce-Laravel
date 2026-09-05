<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\customer\CartController;
use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\dashboard\BrandController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\SellerController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\AdminOrderController;
use App\Http\Controllers\dashboard\ColorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\dashboard\CouponController;
use App\Http\Controllers\dashboard\PaymentController;
use App\Http\Controllers\dashboard\ReportController;
use App\Http\Controllers\dashboard\ReviewController;
use App\Http\Controllers\dashboard\SizeController;
use App\Http\Controllers\dashboard\TagController;
use App\Http\Controllers\HomeController;
use App\Models\Product;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test-subscription-mail', function () {
    $products = Product::limit(4)->get();

    return view('mail.subscription-mail', [
        'name' => 'Salman',
        'products' => $products,
    ]);
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/category', [HomeController::class, 'category']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/faq', [HomeController::class, 'faq']);
Route::get('/about', [HomeController::class, 'about']);

Route::get('/shop/{slug?}', [CustomerController::class, 'shop'])->name('customer.shop');
Route::post('/subscribe', [CustomerController::class, 'subscribe'])->name('customer.subscription');
Route::get('/product/{slug}', [CustomerController::class, 'productDetail'])->name('product.detail');
Route::post('product/notify/{id}', [CustomerController::class, 'notify'])->name('product.notify');

Route::match(['get', 'post'], '/register', [AuthController::class, "register"])->name('userRegister');
Route::match(['get', 'post'], '/login', [AuthController::class, "login"])->name('userLogin');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');

Route::middleware("check.login")->group(function () {
    Route::resource('/adminprofile', AdminController::class);
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('/users', UserController::class);
    Route::resource('/sellers', SellerController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/brand', BrandController::class);
    Route::resource('/colors', ColorController::class);
    Route::resource('/sizes', SizeController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/coupons', CouponController::class);
    Route::post('/coupon/apply', [CouponController::class, 'apply'])->name('coupon.apply');
    Route::post('/coupon/remove', [CouponController::class, 'remove'])->name('coupon.remove');

    Route::controller(CustomerController::class)->group(function () {
        Route::get('/cart', 'cart')->name('customer.cart');
        Route::post('/remove-item/{id}', 'removeCartitems');
        Route::post('/cart/{id}', 'addToCart')->name('cart.add');
        Route::post('/cart/{item}/increase','increase')->name('cart.increase');
        Route::post('/cart/{item}/decrease', 'decrease')->name('cart.decrease');
        Route::get('/checkout', 'checkout')->name('customer.checkout');
        Route::get('/wishlist', 'wishlist')->name('customer.wishlist');
        Route::post('/wishlist/toggle', 'toggle')->name('wishlist.toggle');
        Route::get('/order-success', 'orderPlaced')->name('customer.orderplaced');
        Route::get('profile', 'profile')->name('profile');
        Route::get('/profile-edit', 'profileEdit')->name('profile.edit');
        Route::put('/profile-update/{id}', 'profileUpdate')->name('profile.update');
    });

    Route::resource('/company', CompanyController::class);
    Route::post('/admin/logo/upload', [AdminController::class, 'uploadLogo'])->name('admin.logo.upload');
    Route::get('/orders', [AdminOrderController::class, "orders"])->name("admin.orders");
    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
    Route::put('/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.status');
    Route::get('/payments', [PaymentController::class, "index"])->name('admin.payments');
    Route::get('/reviews', [ReviewController::class, 'review'])->name('admin.reviews');
    Route::get("/reports", ReportController::class)->name('admin.reports');

    Route::controller(OrderController::class)->group(function () {
        Route::post('/place-order', 'placeOrder')->name('order.place');
        Route::get('/thank-you/{orderNumber}', 'thankYou')->name('order.thankyou');
        Route::get('/my-orders', 'myOrders')->name('customer.my-orders');
        Route::get('/my-orders/{orderNumber}', 'orderDetails')->name('customer.order.details');
    });
});



Route::patch(
    '/my-orders/{order}/cancel',
    [OrderController::class, 'cancel']
)->name('customer.order.cancel');


Route::put(
    '/admin/orders/{order}/payment-status',
    [AdminOrderController::class, 'updatePaymentStatus']
)->name('admin.orders.payment-status');






// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');
// Route::get('/email/verify/{id}/{hash}', function (
//     EmailVerificationRequest $request
// ) {
//     $request->fulfill();

//     return redirect()->route('dashboard');
// })->middleware(['auth', 'signed', 'throttle:6,1'])
//   ->name('verification.verify');
//   Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();

//     return back()->with(
//         'success',
//         'Verification link sent!'
//     );
// })->middleware(['auth', 'throttle:6,1'])
//   ->name('verification.send');

//   Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])
//   ->name('dashboard');


use Illuminate\Support\Facades\Mail;

Route::get('/test-mail', function () {

    Mail::raw('This is a test email from Laravel.', function ($message) {
        $message->to('salman94760@gmail.com')
            ->subject('Laravel Test Mail');
    });

    echo 'Mail sent';
});
