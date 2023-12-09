<?php


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
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostSearchController;
use App\Http\Controllers\ZahtevController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, "index"])->name("home");
Route::get('/post/{post:slug}', [PostController::class, "show"])->name("home.post");
Route::get('/category/{category:slug}', [CategoryController::class, "show"])->name("home.category");
Route::get("/search", PostSearchController::class)->name("blogpost.search");

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

	Route::post('logout', [LoginController::class, 'logout'])->name('logout');

	Route::controller(PostController::class)->prefix('blogpost')->group(function () {
		Route::get("/create-new-post", "create")->name("create-new-post");
		Route::get("/{id}", "index")->name('blogpost');
		Route::post("/store", "store")->name('blogpost.store');
		Route::post("/delete/{postId}", "destroy")->name('blogpost.delete');
		Route::get("/update/{id}", "edit")->name('blogpost.update');
		Route::post("/update/{id}", "update")->name('blogpost.update');
		Route::post("/upload-image", "storeImage")->name('blogpost.upload-image');
	});

	Route::middleware("role:admin")->group(function () {
		Route::controller(UserController::class)->group(function () {
			Route::post('/user/delete/{id}', "destroy")->name('user.delete');
			Route::post('/user/promote_to_admin/{id}', "promoteToAdmin")->name('user.promote-to-admin');
		});
		Route::get("/user-management", [UserProfileController::class, "index"])->name("user-management");
		Route::resource("category", CategoryController::class);

		Route::delete("/zahtevi/delete/{zahtev}", [ZahtevController::class, 'destroy'])->name('zahtev.destroy');

		Route::post('/register/approve/{id}', [RegisterController::class, 'approve'])->name('register.approve');
	});
});
