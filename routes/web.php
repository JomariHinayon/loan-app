<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\AddressController;
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
});

require __DIR__.'/auth.php';


// application
Route::get('/application/form/1', [ApplicationController::class, 'view_form'])->name('application.view_form');
Route::get('/application/form/2', [AddressController::class, 'view_form'])->name('address.view_form');
Route::get('/application/form/3', [EmploymentController::class, 'view_form'])->name('employment.view_form');
Route::post('/application/form/1/store', [ApplicationController::class, 'store'])->name('application.store');
Route::post('/application/form/2/store', [AddressController::class, 'store'])->name('address.store');
Route::post('/application/form/3/store', [EmploymentController::class, 'store'])->name('employment.store');
