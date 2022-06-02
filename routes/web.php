<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\InvoiceController;
// use App\Http\Controllers\Admin\FuelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', [AdminController::class, 'index'])->middleware(['auth', 'verified']);

Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function() {
    // Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

    Route::resource('clients', ClientController::class);
    Route::resource('works', WorkController::class);
    Route::resource('invoices', InvoiceController::class);
    // Route::resource('fuels', FuelController::class);

    Route::get('new-work/{client}', [WorkController::class, 'newWork'])->name('works.new_work');
    Route::get('edit-work/{work}/{from_client?}', [WorkController::class, 'editWork'])->name('works.edit_work');
    Route::put('update-work/{work}/{from_client?}', [WorkController::class, 'updateWork'])->name('works.update_work');
});

require __DIR__.'/auth.php';
