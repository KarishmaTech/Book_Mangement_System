<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

      Route::get('create', [BookController::class, 'create'])->name('create');
      Route::get('dashboard', [BookController::class, 'dashboard'])->name('dashboard');
      Route::post('store', [BookController::class, 'store'])->name('store');
     Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('edit');
     Route::post('/books/{id}', [BookController::class, 'update'])->name('update');
     Route::get('show/{id}', [BookController::class, 'show'])->name('show');
     Route::delete('books/{id}', [BookController::class, 'destroy'])->name('destroy');





});

require __DIR__.'/auth.php';
