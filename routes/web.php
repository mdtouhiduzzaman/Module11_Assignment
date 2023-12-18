<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
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
    return view('welcome');
});

Route::get('/dashboard', [StoreController::class, 'report',])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/add-product', [StoreController::class, 'addProduct'])->middleware(['auth', 'verified'])->name('store.product');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/store', [StoreController::class, 'showStore'])->name('store');
    Route::get('/sale-product/{id}', [StoreController::class, 'saleProduct'])->name('sale.product');
    Route::get('/edit-product/{id}', [StoreController::class, 'editProduct'])->name('edit.product');
    Route::get('/delete-product/{id}', [StoreController::class, 'deleteProduct'])->name('delete.product');
    Route::post('/update-product/{id}', [StoreController::class, 'updateProduct'])->name('update.product');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
