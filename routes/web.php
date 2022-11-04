<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CommentController;
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
Route::get('/about/', [PostController::class, 'show']);
Route::get('/blog/{id}', [BlogController::class, 'show']);
Route::post('comment', [BlogController::class, 'comment'])->name('comment');





// Route::get('/about', function () {
//     return view('blog/about/about');
// });

Route::get('/post', function () {
    return view('blog/post/post');
});

Route::get('/contact', function () {
    return view('blog/contact/contact');
});


//Admin

Route::resource('/admin/pages', PageController::class)->middleware('auth');

Route::get('admin', [DashboardController::class,'index'])->middleware(['auth', 'is_verify_email']);
Route::resource('admin/posts', PostController::class)->middleware('auth');
Route::get('admin/comment', [CommentController::class, 'index']);
Route::post('/admin/comment/{id}', [CommentController::class, 'update']) ;
Route::get('/image', [ImageController::class,'index'])->name('image.index');
Route::post('/image', [ImageController::class,'store'])->name('image.store');

Route::resource('admin/setting', SettingController::class)->middleware('auth');

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login.proses')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Register
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'actionregister'])->name('register.action');
Route::get('account/verify/{token}', [RegisterController::class, 'verifyAccount'])->name('user.verify');

// Route::resource('/blog', BlogController::class);

// Route::get('/', function () {
//     return view('blog/index');
// });


// Route::get('/comment', function () {
//     return view('posts/comment');
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
