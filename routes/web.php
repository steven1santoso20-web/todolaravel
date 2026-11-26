<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

// Halaman utama dan daftar Todo
Route::get('/', [TodoController::class, 'index'])
    ->name('todos.index');

// Menampilkan form tambah Todo
Route::get('/todos/create', [TodoController::class, 'create'])
    ->name('todos.create');

// Menyimpan Todo baru
Route::post('/todos', [TodoController::class, 'store'])
    ->name('todos.store');

// Menampilkan form edit Todo
Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])
    ->name('todos.edit');

// Memperbarui Todo
Route::put('/todos/{todo}', [TodoController::class, 'update'])
    ->name('todos.update');

// Menghapus Todo
Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])
    ->name('todos.destroy');

