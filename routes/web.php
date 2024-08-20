<?php

use App\Http\Controllers\ApiController;
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

Route::get('/', function () {
    return view('admin.index');
});


Route::resource('proprio',ProprioController::class);
Route::resource('categorie',CategorieController::class);

Route::post('update-proprio/',[ProprioController::class,'update'])->name('update.proprio');
Route::post('update-categorie/',[CategorieController::class,'update'])->name('update.categorie');
