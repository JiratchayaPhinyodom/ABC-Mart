<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/stock', function () {
//     return view('stock');
// })->middleware(['auth', 'verified'])->name('stock');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/stores', [StoreController::class, 'index'])->name('stores.index');
Route::get('/stores/create', [StoreController::class, 'create'])->name('stores.create');
Route::post('/stores', [StoreController::class, 'store'])->name('stores.store');
Route::get('/stores/{store}', [StoreController::class, 'show'])->name('stores.show');
Route::get('/stores/{store}/edit', [StoreController::class, 'edit'])->name('stores.edit');
Route::put('/stores/{store}', [StoreController::class, 'update'])->name('stores.update');
Route::delete('/stores/{store}', [StoreController::class, 'destroy'])->name('stores.destroy');


Route::get('/stores/{storeId}/items/create', [ItemsController::class, 'create'])->name('items.create');
Route::post('/stores/{storeId}/items/store', [ItemsController::class, 'store'])->name('items.store');
Route::get('/stores/{storeId}/items/{itemId}/edit', [ItemsController::class, 'edit'])->name('items.edit');
Route::put('/stores/{storeId}/items/{itemId}', [ItemsController::class, 'update'])->name('items.update');
Route::delete('/items/{item}', [ItemsController::class, 'destroy'])->name('items.destroy');

require __DIR__.'/auth.php';
