<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [LoginController::class, 'showLoginForm']);

Auth::routes();


Route::middleware('auth')->group(function(){
    //Route For Dashboard View
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    //Route For User view,Create,Update,Delete
    Route::resource('user', UserController::class,['names'=>'user'])->except([ 'show','create']);


});
