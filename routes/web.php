<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ContentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman awal
Route::get('/', function () {
    return view('welcome');
});

// Login form
Route::get('/login', function () {
    return view('auth.login');
})->name('login'); // nama route harus "login"

// Proses login
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/contents');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
})->name('login'); // masih sama namanya biar cocok sama view

// Logout
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
})->name('logout');

// Halaman konten (harus login)
Route::get('/contents', [ContentController::class, 'index'])->middleware('auth');
