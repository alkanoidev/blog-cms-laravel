<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\BlogPostSearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|
| Here is where you can register web routes for your application. These
|--------------------------------------------------------------------------
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, "index"])->name("home");
Route::get('/post/{slug}', [BlogPostController::class, "show"])->name("home.post");
Route::get("/search", BlogPostSearchController::class)->name("blogpost.search");

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');

Route::prefix("dashboard")->middleware('auth')->group(function () {
	Route::get("/", [DashboardController::class, 'index'])->name("dashboard");
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get("/user-management", [UserProfileController::class, "index"])->name("user-management");
	Route::get("/blogpost/create-new-post", [BlogPostController::class, "create"])->name("create-new-post");

	Route::post('logout', [LoginController::class, 'logout'])->name('logout');

	Route::get("/blogpost/{id}", [BlogPostController::class, "index"])->name('blogpost');
	Route::post("/blogpost/store", [BlogPostController::class, "store"])->name('blogpost.store');
	Route::post("/blogpost/delete/{postId}", [BlogPostController::class, "destroy"])->name('blogpost.delete');
	Route::get("/blogpost/update/{id}", [BlogPostController::class, "update"])->name('blogpost.update');
	Route::post("/blogpost/update/{id}", [BlogPostController::class, "update"])->name('blogpost.update');
	Route::post("/blogpost/upload-image", [BlogPostController::class, "storeImage"])->name('blogpost.upload-image');

	Route::controller(UserController::class)->group(function () {
		Route::post('/user/delete/{id}', "destroy")->name('user.delete');
	});

	Route::post('/register/approve/{id}', [RegisterController::class, 'approve'])->name('register.approve');
});
