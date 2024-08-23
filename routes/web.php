<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\BienImmobilierController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProprioController;
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



Route::middleware(['auth.admin'])->group(function(){
    Route::resource('proprio',ProprioController::class);
    Route::resource('categorie',CategorieController::class);
    Route::resource('bienImmobilier',BienImmobilierController::class);
    Route::get('homeAdmin',[AdminController::class,'home'])->name('home.admin');

    
    Route::post('update-proprio/',[ProprioController::class,'update'])->name('update.proprio');
    Route::post('update-categorie/',[CategorieController::class,'update'])->name('update.categorie');
    Route::post('update-bienImmobilier/',[BienImmobilierController::class,'update'])->name('update.bienImmobielier');
    
    
    // ADMIN CONTROLLER
    
    Route::get('admin-liste-users/',[AdminController::class,'index'])->name('listes.admin.users');
    Route::post('admin-add-users/',[AdminController::class,'store'])->name('add.admin.users');
    
});
Route::get('login-admin/',[AdminController::class,'login'])->name('admin.login');

Route::post('Authentification-admin/',[AdminController::class,'doLogin'])->name('doLogin.login');

Route::get('listesBienImmoblier',[ApiController::class,'index']);
