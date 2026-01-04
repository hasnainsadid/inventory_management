<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\SupplierController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'has_permission'
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

    // products
    Route::resource('products', ProductController::class)->except(['show']);

    // purchase
    Route::resource('purchases', PurchaseController::class)->except(['show']);
    Route::get('purchases/recycle-bin', [PurchaseController::class, 'recycleBin'])->name('purchases.recycleBin');
    Route::post('purchases/restore/{id}', [PurchaseController::class, 'restore'])->name('purchases.restore');
    Route::delete('purchases/force-delete/{id}', [PurchaseController::class, 'forceDelete'])->name('purchases.forceDelete');

    // contact
    Route::resource('contacts', ContactController::class)->only(['index', 'destroy']);
    Route::get('contacts/recycle-bin', [ContactController::class, 'recycleBin'])->name('contacts.recycleBin');
    Route::post('contacts/restore/{id}', [ContactController::class, 'restore'])->name('contacts.restore');
    Route::delete('contacts/force-delete/{id}', [ContactController::class, 'forceDelete'])->name('contacts.forceDelete');

    // role
    Route::resource('roles', RoleController::class)->except(['show']);
    Route::get('roles/recycle-bin', [RoleController::class, 'recycleBin'])->name('roles.recycleBin');
    Route::post('roles/restore/{id}', [RoleController::class, 'restore'])->name('roles.restore');
    Route::delete('roles/force-delete/{id}', [RoleController::class, 'forceDelete'])->name('roles.forceDelete');

    Route::get('add-permission/{id}', [RoleController::class, 'addPermission'])->name('roles.addPermission');
    Route::post('add-permission/{id}', [RoleController::class, 'permissionStore'])->name('roles.permissions.store');

    // users
    Route::resource('users', UserController::class)->except(['show']);
    Route::get('users/recycle-bin', [UserController::class, 'recycleBin'])->name('users.recycleBin');
    Route::post('users/restore/{id}', [UserController::class, 'restore'])->name('users.restore');
    Route::delete('users/force-delete/{id}', [UserController::class, 'forceDelete'])->name('users.forceDelete');
});
