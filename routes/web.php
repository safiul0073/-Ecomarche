<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\UserController;
use App\Jobs\SendMail;
use App\Mail\SendEmailMailable;
use App\Models\Product;
use App\Models\User;
use App\Notifications\SuccessfulPayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

Route::get('/', [AdminController::class, 'index']);
Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware("auth");
Route::post('login', [AdminController::class, 'login'])->name('login');

Route::get('logout', [AdminController::class, 'logout'])->name('logout');

// Category Section here....
Route::resource('category', CategoryController::class);
//brand section here......
Route::resource('brand', BrandController::class);
// Slider section here...
Route::resource('slider', SliderController::class);
// // Store section here...
Route::resource('store', StoreController::class);
// // Role section here...
Route::resource('role', RoleController::class);
// // employ user section here...
Route::resource('user', UserController::class);
// product section here....
Route::resource('product', ProductController::class);



Route::get("/send-mail", function () {
    $job = (new SendMail())
                    ->delay(now()->addSeconds(10));
    dispatch($job);
    return "Send Successfull";
});
Route::get("/send-notificaiton", function () {

    $user = User::first();
    $user->notify(new SuccessfulPayment());

});



















