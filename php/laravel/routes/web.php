<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/welcome', [TestsController::class, 'index'])->name('tests.index');

// 首页
Route::get('/', [IndexController::class, 'home'])->name('home');

// 登录相关
// Show the login form; Login the user; Logout the user
Route::get('/login', [SessionsController::class, 'create'])->name('login');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');
Route::post('/logout', [SessionsController::class, 'destroy'])->name('logout');

// 注册相关
// Show the registration form; Register the user
Route::get('/register', [UsersController::class, 'create'])->name('register');
Route::post('/register', [UsersController::class, 'store'])->name('register.store');

// 用户详情页
Route::get('/users/{id?}', [UsersController::class, 'show'])->whereNumber('id')->name('users.show');

// Dashboard (登录成功跳转页)
Route::get('/dashboard', function () {
    return view('dashboard');
});

// 测试发送出去的邮件都路由，不用的话会报错 404
//Route::get('/test-email', function () {
//    $user = \App\Models\User::first();
//    return new \App\Mail\WelcomeUserMail($user);
//});

Route::resource('categories', CategoriesController::class);
Route::resource('products', ProductsController::class);
