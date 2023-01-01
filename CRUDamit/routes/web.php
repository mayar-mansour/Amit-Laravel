<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

//admin and user
Route::get("register",[AdminController::class,"register"]);
Route::post("register",[AdminController::class,"registerRequest"])->name('register');

Route::get("login",[AdminController::class,"login"])->name("login");
Route::post("login",[AdminController::class,"loginRequest"]);
Route::get("logout",[AdminController::class,"logout"]);

//category
Route::group(['prefix'=>'category'],function(){
Route::get('/view', [CategoryController::class, 'view'])->name('view');
Route::get('/index', [CategoryController::class, 'index'])->name('index');
Route::get('/display{id}', [CategoryController::class, 'display'])->name('cat.display');
Route::get('/create', [CategoryController::class, 'create'])->name('create');
Route::get('/edit{id}', [CategoryController::class, 'editcategories'])->name('cat.edit');
Route::post('/update', [CategoryController::class, 'updatecategories'])->name('cat.update');
Route::get('/delete{id}', [CategoryController::class, 'destroycategories'])->name('cat.delete');
});
//product
Route::group(['prefix'=>'product'],function(){
Route::get('/index', [ProductController::class, 'indexProduct'])->name('product.index');
Route::get('/create', [ProductController::class, 'createProduct'])->name('product.create');
Route::get('/view', [ProductController::class, 'viewProduct'])->name('product.view');
Route::get('/edit{id}', [ProductController::class, 'editProduct'])->name('product.edit');
Route::post('/update', [ProductController::class, 'updateProduct'])->name('product.update');
Route::get('/delete{id}', [ProductController::class, 'destroyProduct'])->name('product.delete');
});
