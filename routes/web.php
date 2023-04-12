<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\superadmin\SuperAdminController;
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

Route::get('/',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/authenticate',[LoginController::class, 'authenticate'])->name('auth');
Route::post('/logout',[LoginController::class, 'logout'])->name('logout')->middleware('auth');

// SUPERADMIN
Route::middleware(['superadmin','auth','revalidate'])->prefix('superadmin')->group(function (){
    Route::get('/dashboard',[SuperAdminController::class, 'index']);
});
