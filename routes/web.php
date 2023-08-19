<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Frontend\CarController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Frontend\HomepageController;

use App\Http\Controllers\SewaController;

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
Route::get('/', [\App\Http\Controllers\Frontend\HomepageController::class,'index'])->name('homepage');
Route::get('daftar-mobil', [\App\Http\Controllers\Frontend\CarController::class,'index'])->name('car.index');
Route::get('daftar-mobil/{car}', [\App\Http\Controllers\Frontend\CarController::class,'show'])->name('car.show');
Route::post('daftar-mobil', [\App\Http\Controllers\Frontend\CarController::class,'store'])->name('car.store');
Route::get('blog', [\App\Http\Controllers\Frontend\BlogController::class,'index'])->name('blog.index');
Route::get('blog/{blog:slug}', [\App\Http\Controllers\Frontend\BlogController::class,'show'])->name('blog.show');
Route::get('tentang-kami',[\App\Http\Controllers\Frontend\AboutController::class,'index']);
Route::get('kontak', [\App\Http\Controllers\Frontend\ContactController::class,'index']);
Route::post('kontak', [\App\Http\Controllers\Frontend\ContactController::class,'store'])->name('contact.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post("/booking", [SewaController::class, "insert"]);

Route::group(['middleware' => ['auth','is_admin'],'prefix' => 'admin','as' => 'admin.'],function () {
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::resource('cars', \App\Http\Controllers\Admin\CarController::class);
    Route::resource('types', \App\Http\Controllers\Admin\TypeController::class);
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
    Route::resource('teams', \App\Http\Controllers\Admin\TeamController::class);
    Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class)->only(['index','store','update']);
    Route::resource('contacts', \App\Http\Controllers\Admin\ContactController::class)->only(['index','destroy']);
    Route::resource('bookings', BookingController::class)->only(['index','destroy','store']);
    Route::get("bookings/confirmed", [BookingController::class, "confirmed"]);
    Route::get("bookings/waiting", [BookingController::class, "waiting"]);
    Route::get("bookings/cancel-confirmed/{id}", [BookingController::class, "batalkan_konfirmasi"]);
    Route::get("bookings/confirm-booking/{id}", [BookingController::class, "konfirmasi_pesanan"]);
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);
});
