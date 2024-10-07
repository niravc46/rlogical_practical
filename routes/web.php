<?php

use App\Http\Controllers\BatchController;
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

Route::get('/batches', [BatchController::class, 'index'])->name("batches.index");
Route::get('/batches/create', [BatchController::class, 'create']);
Route::get('/batches/list', [BatchController::class, 'batchList']);
Route::post('/batches/save', [BatchController::class, 'store'])->name('batches.store');
Route::get('/batches/{id}/edit', [BatchController::class, 'edit'])->name('batches.edit');
Route::put('/batches/{id}/update', [BatchController::class, 'update'])->name('batches.update');

