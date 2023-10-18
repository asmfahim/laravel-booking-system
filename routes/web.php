<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoticeBoardController;
use App\Http\Controllers\PdfController;
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
    Route::get('/user/pdf', [PdfController::class,'User_Pdf'])->name('user.pdf');


    //Route for Role view, create, update, delete
    Route::resource('roles', RolesController::class,['names'=>'roles'])->except([ 'show']);

    //Route for permission create
    Route::resource('permission',PermissionsController::class,['names' =>'permission'])->except(['create','show','edit','update','destroy']);

    //Route for category crud
    Route::resource('category', CategoryController::class,['names'=>'category'])->except([ 'show','create']);

    //Route for subcategory crud
    Route::resource('subcategory', SubCategoryController::class,['names'=>'subcategory'])->except([ 'show','create']);

    //Route for Announcement crud
    Route::resource('announcement', AnnouncementController::class,['names'=>'announcement'])->except([ 'show']);

    //Route for Booking crud
    Route::resource('booking', BookingController::class,['names'=>'booking'])->except([ 'create','show','edit','update']);
    Route::get('/booking/confirm/{id}',[AjaxController::class,'confirm'])->name('booking.confirm');
    Route::get('/booking/page',[AjaxController::class,'index'])->name('booking.page');
    Route::get('/booking/data',[AjaxController::class,'Booking_Ajax'])->name('booking.ajax');
    Route::post('/booking/delete',[AjaxController::class,'Booking_Delete'])->name('booking.delete');
    Route::get('/booking/ajax/{id}',[AjaxController::class,'Sub_Ajax'])->name('subcategory.ajax');
    //This Route for user wise booking list
    Route::get('/booking/mybooking',[AjaxController::class,'My_Booking'])->name('booking.mybooking');
    //Route for booking pdf
    Route::get('/booking/pdf', [PdfController::class,'Booking_Pdf'])->name('booking.pdf');

    //Route for NoticeBoard
    Route::get('/notice/board',[NoticeBoardController::class,'index'])->name('notice.index');


});
