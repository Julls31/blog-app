<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

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

//Blog
Route::get('/', [BlogController::class,'index']);
Route::get('/blog/{id}', [BlogController::class, 'show']);


Route::get('/about', function () {
    return view('blog/about/about');
});

Route::get('/post', function () {
    return view('blog/post/post');
});

Route::get('/contact', function () {
    return view('blog/contact/contact');
});


//Admin

// Route::get('/admin', [PostController::class,'index'])->middleware('auth');

Route::get('admin', [DashboardController::class,'index'])->middleware('auth');
Route::resource('admin/posts', PostController::class)->middleware('auth');

// Route::get('dashboard', [DashboardController::class,'index'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login.proses')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');




// Route::resource('/blog', BlogController::class);

// Route::get('/', function () {
//     return view('blog/index');
// });


// Route::get('/admin', function () {
//     return view('admin/index');
// });

// Route::get('/login', function () {
//     return view('admin/login');
// });

// Route::get('/register', function () {
//     return view('admin/register');
// });

// Route::get('/forgot_password', function () {
//     return view('admin/forgot_password');
// });
