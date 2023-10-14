<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SubCategoryController;
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

    //Route for Role view, create, update, delete
    Route::resource('roles', RolesController::class,['names'=>'roles'])->except([ 'show']);

    //Route for permission create
    Route::resource('permission',PermissionsController::class,['names' =>'permission'])->except(['create','show','edit','update','destroy']);

    //Route for category crud
    Route::resource('category', CategoryController::class,['names'=>'category'])->except([ 'show','create']);

    //Route for subcategory crud
    Route::resource('subcategory', SubCategoryController::class,['names'=>'subcategory'])->except([ 'show','create']);

    //Route for subcategory crud
    Route::resource('announcement', AnnouncementController::class,['names'=>'announcement'])->except([ 'show']);


});
