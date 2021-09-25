<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\UserController;
use App\Mail\SendEmailMailable;
use App\Models\Product;
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
Route::get('/brand/index', [BrandController::class, 'index'])->name('brand.index');
Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
Route::delete('/brand/delete/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');

// Slider section here...
Route::get('/slider/index',[SliderController::class, 'index'])->name('slider.index');
Route::get('/slider/create',[SliderController::class, 'create'])->name('slider.create');
Route::post('/slider/store',[SliderController::class, 'store'])->name('slider.store');
Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
Route::post('/slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');
Route::delete('/slider/delete/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');

// Store section here...
Route::get('/store/index',[StoreController::class, 'index'])->name('store.index');
Route::get('/store/create',[StoreController::class, 'create'])->name('store.create');
Route::post('/store/store',[StoreController::class, 'store'])->name('store.store');
Route::get('/store/edit/{id}',[StoreController::class, 'edit'])->name('store.edit');
Route::post('/store/update/{id}',[StoreController::class, 'update'])->name('store.update');
Route::delete('/store/delete/{id}',[StoreController::class, 'destroy'])->name('store.destroy');

// Role section here...
Route::get('/role/index', [RoleController::class, 'index'])->name('role.index');
Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
Route::post('/role/update/{id}', [RoleController::class, 'update'])->name('role.update');
Route::delete('/role/delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

// employ user section here...
Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');



// product section
Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

// Route::get('/get/category',function(){
//     $product = Product::find(1);
//     foreach($product->items as $item){
//         echo $item->category->name."<br>";
//     }
// });



Route::get("/send-mail", function () {
    Mail::to("parsonal494@gmail.com")->send(new SendEmailMailable());
});



















