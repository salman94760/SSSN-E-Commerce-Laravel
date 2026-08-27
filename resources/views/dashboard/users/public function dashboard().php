public function dashboard()
{
    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect('/admin/dashboard');
    }

    if ($user->role === 'seller') {
        return redirect('/seller/dashboard');
    }

    return redirect('/customer/dashboard');
}


Route::get('/admin/dashboard', function () {
    return 'Admin Dashboard';
})->middleware(['auth', 'role:admin']);

Route::get('/seller/dashboard', function () {
    return 'Seller Dashboard';
})->middleware(['auth', 'role:seller']);

Route::get('/customer/dashboard', function () {
    return 'Customer Dashboard';
})->middleware(['auth', 'role:customer']);