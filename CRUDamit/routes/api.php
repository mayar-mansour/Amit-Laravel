<?php

use App\Http\Controllers\api\categoryApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("category",[categoryApi::class,"index"])->middleware("auth:api");
Route::get("category/{id}",[categoryApi::class,"show"]);
Route::post("category",[categoryApi::class,"store"]);
Route::put("category/{id}",[categoryApi::class,"update"]);
Route::delete("category/{id}",[categoryApi::class,"delete"]);
