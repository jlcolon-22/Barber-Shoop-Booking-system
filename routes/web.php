<?php

use App\Http\Controllers\API\admin\AdminDashboardController;
use App\Http\Controllers\API\OwnerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

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
    return view('pages.welcome');
});
Route::get('/contact', function() {
    return view('pages.contact');
});
Route::get('/booked', function() {
    return view('pages.booked');
});
Route::get('/reservation',[FrontendController::class, 'reservation']);
Route::post('/reservation',[FrontendController::class, 'store_reservation']);
Route::get('/appointment',[FrontendController::class, 'appointment']);
Route::get('/appointment/{id}',[FrontendController::class, 'update_appointment']);
Route::get('/account',[FrontendController::class, 'account']);
Route::post('/account/{id}',[FrontendController::class, 'update_account']);

Route::get('/services',[FrontendController::class, 'services']);
Route::get('/view',[FrontendController::class, 'branch']);

// auth
Route::get('/auth/login',[AuthController::class,'index']);
Route::post('/auth/login',[AuthController::class,'userLogin']);
Route::get('/auth/signup',[AuthController::class,'signup']);
Route::get('/auth/google',[AuthController::class,'signup_google']);
Route::get('/auth/google/callback',[AuthController::class,'google_callback']);
Route::get('/auth/logout',[AuthController::class,'userLogout']);


    // admin
    Route::middleware(['admin.only'])->prefix('admin')->group(function () {
        Route::get('/dashboard',[AdminDashboardController::class,'index']);
        Route::get('/account',[AdminDashboardController::class,'account']);
        Route::get('/branch',[AdminDashboardController::class,'branch']);
        Route::post('/branch',[AdminDashboardController::class,'store_branch']);
        Route::post('/branch/{id}',[AdminDashboardController::class,'update_branch']);
        Route::post('/account',[AdminDashboardController::class,'store_account']);
        Route::post('/account/{id}',[AdminDashboardController::class,'update_account']);
    });

    // Owner
    Route::prefix('owner')->group(function (){

        Route::get('dashboard',[OwnerController::class,'index']);
        Route::get('appointment',[OwnerController::class,'appointment']);
        Route::get('account',[OwnerController::class,'account']);
        Route::get('certificate',[OwnerController::class,'certificate']);
        Route::post('certificate',[OwnerController::class,'store_certificate']);
        Route::get('certificate/delete/{id}',[OwnerController::class,'delete_certificate']);
        Route::get('posts',[OwnerController::class,'posts']);
        Route::post('posts',[OwnerController::class,'store_post']);
        Route::post('post/{id}',[OwnerController::class,'update_post']);
        Route::post('account',[OwnerController::class,'store_account']);
        Route::post('/account/{id}',[OwnerController::class,'update_account']);
        Route::get('/appointment/{id}/approved',[OwnerController::class,'update_appointment']);
    });


