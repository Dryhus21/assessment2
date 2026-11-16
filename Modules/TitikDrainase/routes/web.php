<?php

use Illuminate\Support\Facades\Route;
use Modules\Fasilitas\Http\Controllers\TitikDrainaseController;

Route::middleware(['auth', 'role:petugas,mahasiswa'])->group(function () {
Route::get('fasilitas', [TitikDrainase::class, 'index'])->name('fasilitas.index');
});
Route::middleware(['auth', 'role:petugas'])->group(function () {
Route::get('fasilitas/create', [TitikDrainase::class, 'create'])->name('fasilitas.create');
Route::post('fasilitas', [TitikDrainase::class, 'store'])->name('fasilitas.store');
Route::get('fasilitas/{fasilitas}/edit', [TitikDrainase::class, 'edit'])->name('fasilitas.edit');
Route::put('fasilitas/{fasilitas}', [TitikDrainase::class, 'update'])->name('fasilitas.update');
Route::delete('fasilitas/{fasilitas}', [TitikDrainase::class, 'destroy'])->name('fasilitas.destroy');
});
