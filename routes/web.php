<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Models\Role;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('layouts.app');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Category Section here....
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

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














