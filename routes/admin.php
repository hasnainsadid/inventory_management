<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SupplierController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.pages.dashboard.index');
        // return view('dashboard');
    })->name('dashboard');

    // category
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::get('categories/recycle-bin', [CategoryController::class, 'recycleBin'])->name('categories.recycleBin');
    Route::post('categories/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('categories/force-delete/{id}', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');


    // suppliers
    Route::resource('suppliers', SupplierController::class)->except(['show']);
    Route::get('suppliers/recycle-bin', [SupplierController::class, 'recycleBin'])->name('suppliers.recycleBin');
    Route::post('suppliers/restore/{id}', [SupplierController::class, 'restore'])->name('suppliers.restore');
    Route::delete('suppliers/force-delete/{id}', [SupplierController::class, 'forceDelete'])->name('suppliers.forceDelete');

    
    // contact
    Route::resource('contacts', ContactController::class)->only(['index', 'destroy']);
    Route::get('contacts/recycle-bin', [ContactController::class, 'recycleBin'])->name('contacts.recycleBin');
    Route::post('contacts/restore/{id}', [ContactController::class, 'restore'])->name('contacts.restore');
    Route::delete('contacts/force-delete/{id}', [ContactController::class, 'forceDelete'])->name('contacts.forceDelete');
});