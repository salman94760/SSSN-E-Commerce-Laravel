<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\CompanyController;

use App\Http\Controllers\customer\CustomerController;


use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\SellerController;

use App\Http\Controllers\dashboard\ColorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SocialAuthController;

use App\Http\Controllers\dashboard\SizeController;
use App\Http\Controllers\dashboard\TagController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;
use App\Models\Order;
use App\Models\Product;

use Illuminate\Support\Facades\Route;

Route::get('/test-subscription-mail', function () {
    $product = Product::limit(3)->first();
    $order = Order::where('order_number', 'ORD-LW2WQEV0')->first();
    // dd($order->Items);
    return view('mail.order-cancel', [
        'name' => 'Salman',
        'order' => $order,
    ]);
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/', [HomeController::class, 'index']);
Route::get('/category', [HomeController::class, 'category']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/faq', [HomeController::class, 'faq']);
Route::get('/about', [HomeController::class, 'about']);

Route::get('/shop/{slug?}', [CustomerController::class, 'shop'])->name('customer.shop');
Route::post('/subscribe', [CustomerController::class, 'subscribe'])->name('customer.subscription');
Route::get('/product/{slug}', [CustomerController::class, 'productDetail'])->name('product.detail');
Route::post('product/notify/{id}', [CustomerController::class, 'notify'])->name('product.notify');
Route::get('product-review/thank-you', function () {
    return view('customer.product-review-thankyou');
})->name('product.review.thankyou');
Route::get('product-review/{id}', [CustomerController::class, 'productReview'])->name('product.review');
Route::post('product-review-store', [CustomerController::class, 'productReviewStore'])->name('product.review.store');


Route::match(['get', 'post'], '/register', [AuthController::class, "register"])->name('userRegister');
Route::match(['get', 'post'], '/login', [AuthController::class, "login"])->name('userLogin');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');
Route::post('/razorpay/webhook',[PaymentController::class, 'webhook'])->name('razorpay.webhook');
Route::middleware("check.login")->group(function () {
    Route::resource('/adminprofile', AdminController::class);

    Route::resource('/users', UserController::class);
    Route::resource('/sellers', SellerController::class);
    Route::post('/razorpay/verify',[PaymentController::class, 'verify'])->name('razorpay.verify');
    Route::resource('/colors', ColorController::class);
    Route::resource('/sizes', SizeController::class);
    Route::resource('/tags', TagController::class);


    Route::controller(CustomerController::class)->group(function () {
        Route::get('/cart', 'cart')->name('customer.cart');
        Route::post('/remove-item/{id}', 'removeCartitems');
        Route::post('/cart/{id}', 'addToCart')->name('cart.add');
        Route::post('/cart/{item}/increase', 'increase')->name('cart.increase');
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



    Route::controller(OrderController::class)->group(function () {
        Route::post('/place-order', 'placeOrder')->name('order.place');
        Route::get('/thank-you/{orderNumber}', 'thankYou')->name('order.thankyou');
        Route::get('/my-orders', 'myOrders')->name('customer.my-orders');
        Route::get('/my-orders/{orderNumber}', 'orderDetails')->name('customer.order.details');
        Route::post('my-orders/{ordernumber}/cancel', 'cancel');
    });
});


Route::get('new-dashboard1', function () {
    return view('dashboard.admin-dashboard-new1');
});



Route::patch(
    '/my-orders/{order}/cancel',
    [OrderController::class, 'cancel']
)->name('customer.order.cancel');

Route::get('/admin/dashboard', [HomeController::class, 'dashboard'])
    ->name('admin.dashboard');







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
