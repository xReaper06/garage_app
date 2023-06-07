<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BikeController;
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

Route::get('/car',[CarController::class, 'index'])->name('car.index');

Route::get('/car/create',[CarController::class, 'create'])->name('car.create');

Route::post('/car/store',[CarController::class, 'store'])->name('car.store');


Route::get('/bike', [BikeController::class, 'index'])->name('bike.index');

Route::get('/bike/create', [BikeController::class, 'create'])->name('bike.create');

Route::post('/bike/store', [BikeController::class, 'store'])->name('bike.store');

Route::get('/bike/show/{id}', [BikeController::class, 'show'])->name('bike.show');

Route::get('/car/show/{id}', [CarController::class, 'show'])->name('car.show');

Route::get('/car/edit/{id}', [CarController::class, 'edit'])->name('car.edit');

Route::get('/bike/edit/{id}', [BikeController::class, 'edit'])->name('bike.edit');

Route::put('/car/update{id}', [CarController::class, 'update'])->name('car.update');

Route::put('/bike/update/{id}', [BikeController::class, 'update'])->name('bike.update');

Route::delete('/car/destroy{id}', [CarController::class, 'destroy'])->name('car.destroy');

Route::delete('/bike/destroy/{id}', [BikeController::class, 'destroy'])->name('bike.destroy');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/car',[CarController::class, 'index'])->name('car.index');
    Route::get('/bike',[BikeController::class, 'index'])->name('bike.index');
});

require __DIR__.'/auth.php';
