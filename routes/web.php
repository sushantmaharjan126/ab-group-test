<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\DocumentDetailController;

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


// Route::prrfix('user')->middleware('auth')->name('user.')->group(function () {
    
// });

Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::get('register/lists', [RegisterController::class, 'index'])->name('register.get');
Route::post('register/submit', [RegisterController::class, 'storeRegister'])->name('register.submit');
Route::get('register/destory/{id}', [RegisterController::class, 'destory'])->name('register.destory');


Route::get('register/activate/{code}', [RegisterController::class, 'activate'])->name('register.activate');


Route::get('document-types', [DocumentTypeController::class, 'index'])->name('document.type.get');
Route::get('document-types/add', [DocumentTypeController::class, 'create'])->name('document.type.create');
Route::post('document-types/store', [DocumentTypeController::class, 'store'])->name('document.type.store');
Route::get('document-types/destory/{id}', [DocumentTypeController::class, 'destory'])->name('document.type.destory');


Route::get('document-detail', [DocumentDetailController::class, 'index'])->name('document.detail.get');
Route::get('document-detail/add', [DocumentDetailController::class, 'create'])->name('document.detail.create');
Route::post('document-detail/store', [DocumentDetailController::class, 'store'])->name('document.detail.store');
Route::get('document-detail/destory/{id}', [DocumentDetailController::class, 'destory'])->name('document.detail.destory');

Route::get('/', function () {
    return view('welcome');
})->name('home');
