<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

// 1. Route Dasar
Route::get('/', function () {
    return view('welcome');
});

// 2. Route dengan Parameter
Route::get('/user/{id}', function ($id) {
    return 'User ID: ' . $id;
});

// 3. Route dengan Parameter Opsional
Route::get('/profile/{name?}', function ($name = 'Guest') {
    return 'Profile Name: ' . $name;
});

// 4. Route dengan Regular Expression Constraints
Route::get('/post/{id}', function ($id) {
    return 'Post ID: ' . $id;
})->where('id', '[0-9]+');

// 5. Named Route
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

// 6. Group Routing dengan Middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/settings', function () {
        return 'Settings Page';
    });
    Route::get('/profile', function () {
        return 'Profile Page';
    });
});

// 7. Redirect Route
Route::redirect('/old-page', '/new-page', 301);

// 8. Route View
Route::view('/about', 'about', ['title' => 'About Us']);

// 9. CSRF Protection dalam Form
Route::post('/submit-form', function (Illuminate\Http\Request $request) {
    return 'Form Submitted!';
})->middleware('csrf');

// 10. API Route dengan Prefix
Route::prefix('api')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
});

?>
