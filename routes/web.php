<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/', function () {
    if (auth()->user()) {
        return view('dashboard');
    }
    return view('home');
});

Route::get('/login', [LoginController::class, "index"])->name("login");
Route::post('/login', [LoginController::class, "store"]);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/logout', function () {
    return redirect('/dashboard');
});
Route::get('/register', [RegisterController::class, 'index'])->name("register");

Route::post("/register", [RegisterController::class, 'store']);


Route::get('/posts', [PostController::class, 'index'])->name("product");
Route::post('/posts', [PostController::class, 'store']);