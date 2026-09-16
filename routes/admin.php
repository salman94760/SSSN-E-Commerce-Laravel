<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\dashboard\AdminOrderController;
use App\Http\Controllers\dashboard\BrandController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\dashboard\CouponController;
use App\Http\Controllers\dashboard\PaymentController;
use App\Http\Controllers\dashboard\ReportController;
use App\Http\Controllers\dashboard\ReviewController;

Route::middleware(['check.login', 'role:admin,seller'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/orders', [AdminOrderController::class, "orders"])->name("admin.orders");
    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
    Route::put('/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.status');
    Route::resource('/products', ProductController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/brands', BrandController::class);
    Route::resource('/coupons', CouponController::class);
    Route::post('/coupon/apply', [CouponController::class, 'apply'])->name('coupon.apply');
    Route::post('/coupon/remove', [CouponController::class, 'remove'])->name('coupon.remove');
    Route::get('/payments', [PaymentController::class, "index"])->name('admin.payments');
    Route::get('/reviews', [ReviewController::class, 'review'])->name('admin.reviews');
    Route::get("/reports", ReportController::class)->name('admin.reports');
    Route::put('/admin/orders/{order}/payment-status',[AdminOrderController::class, 'updatePaymentStatus'])->name('admin.orders.payment-status');
});