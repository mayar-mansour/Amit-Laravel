<?php

use App\Http\Controllers\AdminController;
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
Route::get('/view', [AdminController::class, 'view'])->name('view');
Route::get('/index', [AdminController::class, 'index'])->name('index');

Route::get('/display{id}', [AdminController::class, 'display'])->name('cat.display');
Route::get('/create', [AdminController::class, 'create'])->name('create');
Route::get('/edit{id}', [AdminController::class, 'editcategories'])->name('edit');
Route::post('/update', [AdminController::class, 'updatecategories'])->name('cat.update');
Route::get('/delete{id}', [AdminController::class, 'destroycategories'])->name('delete');
//product
Route::get('/indexProduct', [AdminController::class, 'indexProduct'])->name('product.index');
Route::get('/createProduct', [AdminController::class, 'createProduct'])->name('product.create');
Route::get('/viewProduct', [AdminController::class, 'viewProduct'])->name('product.view');
Route::get('/edit_product{id}', [AdminController::class, 'editProduct'])->name('product.edit');
Route::post('/update_product', [AdminController::class, 'updateProduct'])->name('product.update');
Route::get('/delete_product{id}', [AdminController::class, 'destroyProduct'])->name('product.delete');