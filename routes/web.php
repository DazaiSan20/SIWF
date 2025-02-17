<?php

use Illuminate\Support\Facades\Route;

// Route GET
Route::get('/', function () {
    return view('welcome');
});

// Route POST
Route::post('/submit', function () {
    return 'Data berhasil dikirim!';
});

// Route PUT
Route::put('/update/{id}', function ($id) {
    return "Data dengan ID $id berhasil diperbarui!";
});

// Route DELETE
Route::delete('/delete/{id}', function ($id) {
    return "Data dengan ID $id berhasil dihapus!";
});

// Route dengan Controller
use App\Http\Controllers\HomeController;
Route::get('/home', [HomeController::class, 'index']);

// Route dengan Parameter
Route::get('/user/{name}', function ($name) {
    return "Halo, $name!";
});

// Route dengan Parameter Opsional
Route::get('/profile/{name?}', function ($name = 'Guest') {
    return "Profil: $name";
});

// Route Group (dengan Middleware)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return 'Dashboard User';
    });
});

// Route dengan Prefix
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Dashboard Admin';
    });
});

// Route Redirect
Route::redirect('/old-route', '/new-route');

// Route Fallback (Jika Tidak Ada Route yang Cocok)
Route::fallback(function () {
    return 'Halaman tidak ditemukan!';
});


?>
