<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome1');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/tenants',[TenantController::class,'index'])->name('tenant.index');
    Route::get('/tenants-create',[TenantController::class,'create'])->name('tenant.create');
    Route::post('/tenants-store',[TenantController::class,'store'])->name('tenant.store');
});

require __DIR__.'/auth.php';
