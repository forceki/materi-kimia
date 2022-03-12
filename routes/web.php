<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

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
Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['role:admin']], function(){
        Route::post('/store/image',[App\Http\Controllers\CkeditorController::class, 'upload'])->name('upload');
        
        Route::get('/admin/materi',[MateriController::class, 'index']);
        Route::get('/admin/materi/create',[MateriController::class, 'create']);
        Route::post('/admin/materi/create/store',[MateriController::class, 'Add']);
        Route::get('/admin/materi/delete/{id}',[MateriController::class,'Delete']);
    });

    Route::group(['middleware' => ['role:user|admin']], function(){
        Route::get('/',[HomeController::class,'index']);    
        Route::get('/materi/{id}/{judul}',[HomeController::class, 'view']);
    });
});



Route::get('/login',[AuthController::class, 'index'])->name('login');
Route::post('/login-store',[AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');