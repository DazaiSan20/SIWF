<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\backend\DashboardController;

// ACARA 3

// Route GET
Route::get('/', function () {
    return view('welcome');
});

Route::get('foo', function() {
    return 'Hello World';
});

Route::get('user/{id}', function ($id){
    return 'User '.$id;
});

Route::get('posts/{post}/comments/{comment}', function ($post, $comment) {
    return "Post ID: " . $post . ", Comment ID: " . $comment;
});

Route::get('/user', [UserController::class, 'index']);

// POST: Menangani form submission
Route::post('/submit', function () {
    return "Data berhasil dikirim!";
});

// PUT: Update data berdasarkan ID
Route::put('/update/{id}', function ($id) {
    return "Data dengan ID $id berhasil diperbarui!";
});

// DELETE: Menghapus data berdasarkan ID
Route::delete('/delete/{id}', function ($id) {
    return "Data dengan ID $id berhasil dihapus!";
});

// Route Redirect
Route::redirect('/old-route', '/new-route');

// Route dengan Parameter
Route::get('/user/{name}', function ($name) {
    return "Halo, $name!";
});

// Route dengan Parameter Opsional
Route::get('/profile/{name?}', function ($name = 'Guest') {
    return "Profil: $name";
});

// Regular Expression Constraints
Route::get('user/{name}', function ($name) {
    return "User Name: $name";
})->where('name', '[A-Za-z]+');

Route::get('user/{id}', function ($id) {
    return "User ID: $id";
})->where('id', '[0-9]+');

Route::get('user/{id}/{name}', function ($id, $name) {
    return "User ID: $id, Name: $name";
})->where([
    'id' => '[0-9]+',
    'name' => '[a-z]+'
]);
// BATAS AKHIR ACARA 3

// ACARA 4
// Named Route untuk halaman profil pengguna
Route::get('/user/profile', function () {
    return 'Ini adalah halaman profil pengguna';
})->name('profile');

// Menggunakan Named Route dalam redirect
Route::get('/redirect-profile', function () {
    return redirect()->route('profile');
});

// Named Route dengan parameter
Route::get('/user/{id}', function ($id) {
    return "Profil Pengguna dengan ID: $id";
})->name('user.profile');

// Menggunakan Named Route dengan parameter
Route::get('/redirect-user/{id}', function ($id) {
    return redirect()->route('user.profile', ['id' => $id]);
});

// Tampilkan halaman login
Route::get('/log', function () {
    return view('log');
})->name('log');

// Proses autentikasi
Route::post('/log', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
        return redirect()->intended('/dashboard');
    } else {
        return back()->withErrors(['email' => 'Email atau password salah']);
    }
})->name('auth.log');

// Route Dashboard (hanya untuk yang sudah login)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return 'Dashboard yang hanya bisa diakses jika login';
    });

    Route::get('/profile', function () {
        return 'Profil pengguna yang hanya bisa diakses jika login';
    });
});

// Namespace
Route::prefix('admin')->group(function () {
    Route::get('/home2', [AdminController::class, 'index']);
});

Route::domain('admin.example.com')->group(function () {
    Route::get('/dashboard', function () {
        return 'Dashboard Admin pada subdomain';
    });
});

// Route Name Prefix
    Route::get('/dashboard', function () {
        
    });

    Route::get('/users', function () {
        return 'Daftar Pengguna Admin';
    })->name('users');
// BATAS AKHIR ACARA 4


// ACARA 5

Route::get('/user',[ManagementUserController::class, 'index']);
Route::resource('users', ManagementUserController::class);

// BATAS AKHIR ACARA 5


// ACARA 6

Route::get("/home1", function(){
    return view("home1");
});

// BATAS AKHIR ACARA 6

// ACARA 7
Route::group(['namespace' => 'App\Http\Controllers\frontend'], function() {
    Route::resource('homem', HomeController::class);

});
// BATAS AKHIR ACARA 7

// ACARA 8
Route::group(['namespace' => 'App\Http\Controllers\backend'], function() {
    Route::resource('dash', DashboardController::class);
    Route::resource('pengalaman_kerja',PengalamanKerjaController::class);
    Route::resource('pendidikan',PendidikanController::class);

});
// BATAS AKHIR ACARA 8

// Route Fallback (Jika Tidak Ada Route yang Cocok)
Route::fallback(function () {
    return 'Halaman tidak ditemukan!';
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


?>