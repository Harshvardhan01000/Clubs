<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UpdateController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('/update/{id}',[UpdateController::class,'UpdataClub']);

Route::resource('/club',ClubController::class);

Route::resource('/product',ProductController::class);
