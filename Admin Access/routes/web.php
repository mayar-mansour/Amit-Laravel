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
Route::get("register",[AdminController::class,"register"])->middleware('guest');
Route::post("register",[AdminController::class,"registerRequest"])->name('register')->middleware('guest');

Route::get("login",[AdminController::class,"login"])->name("login")->middleware('guest');
Route::post("login",[AdminController::class,"loginRequest"])->middleware('guest');
Route::get("logout",[AdminController::class,"logout"])->name('logout');

//category
// Route::group(['prefix'=>'user','middleware'=>"auth"],function(){
Route::get('/view', [UserController::class, 'view'])->name('view');
Route::get('/index', [UserController::class, 'index'])->name('index');
Route::get('/display{id}', [UserController::class, 'displayUser'])->name('user.display');
Route::get('/create', [UserController::class, 'createUser'])->name('create')->middleware("admin");
Route::get('/edit{id}', [UserController::class, 'editUser'])->name('user.edit')->middleware("admin");
Route::post('/update', [UserController::class, 'updateUser'])->name('user.update')->middleware("admin");
Route::get('/delete{id}', [UserController::class, 'destroyUser'])->name('user.delete')->middleware("admin");
// });
