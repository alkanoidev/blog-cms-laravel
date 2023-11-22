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
use App\Http\Controllers\CategoryController;


Route::get('/', [HomeController::class, "index"])->name("home");
Route::get('/post/{slug}', [BlogPostController::class, "show"])->name("home.post");
Route::get('/{category:slug}', [CategoryController::class, "show"])->name("home.category");
Route::get("/search", BlogPostSearchController::class)->name("blogpost.search");

Route::middleware("guest")->group(function () {
	Route::get('/register', [RegisterController::class, 'create'])->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->name('login');
	Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->name('change.perform');
});

Route::prefix("dashboard")->middleware(['auth'])->group(function () {
	Route::get("/", [DashboardController::class, 'index'])->name("dashboard");
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get("/blogpost/create-new-post", [BlogPostController::class, "create"])->name("create-new-post");

	Route::post('logout', [LoginController::class, 'logout'])->name('logout');

	Route::get("/blogpost/{id}", [BlogPostController::class, "index"])->name('blogpost');
	Route::post("/blogpost/store", [BlogPostController::class, "store"])->name('blogpost.store');
	Route::post("/blogpost/delete/{postId}", [BlogPostController::class, "destroy"])->name('blogpost.delete');
	Route::get("/blogpost/update/{id}", [BlogPostController::class, "update"])->name('blogpost.update');
	Route::post("/blogpost/update/{id}", [BlogPostController::class, "update"])->name('blogpost.update');
	Route::post("/blogpost/upload-image", [BlogPostController::class, "storeImage"])->name('blogpost.upload-image');

	Route::middleware("role:admin")->group(function () {
		Route::controller(UserController::class)->group(function () {
			Route::post('/user/delete/{id}', "destroy")->name('user.delete');
			Route::post('/user/promote_to_admin/{id}', "promote_to_admin")->name('user.promote_to_admin');
		});
		Route::get("/user-management", [UserProfileController::class, "index"])->name("user-management");
		Route::resource("category", CategoryController::class);

		Route::post('/register/approve/{id}', [RegisterController::class, 'approve'])->name('register.approve');
	});
});
