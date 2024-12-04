<?php

use App\Http\Controllers\SucursalController;
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

Route::view('/', 'welcome');

Route::prefix('/sucursales')->group(function () {
	Route::get('/', [SucursalController::class, 'index'])->name('sucursales.index');
	Route::get('/nuevo', [SucursalController::class, 'create'])->name('sucursales.create');
	Route::get('/editar/{id}', [SucursalController::class, 'edit'])->name('sucursales.edit');
});

Route::view('dashboard', 'dashboard')
	->middleware(['auth', 'verified'])
	->name('dashboard');

Route::view('profile', 'profile')
	->middleware(['auth'])
	->name('profile');

require __DIR__ . '/auth.php';
