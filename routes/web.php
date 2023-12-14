<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Controller1;
use App\Models\Mahasiswa;


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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/create', [Controller1::class, 'create']);
    Route::post('/save', [Controller1::class, 'save']);

    Route::get('/read', [Controller1::class, 'read']);
    Route::get('/update/{nim}', [Controller1::class, 'update']);
    Route::post('/edit', [Controller1::class, 'edit']);

    Route::get('/delete/{nim}', [Controller1::class, 'delete']);

    Route::get('/view', [Controller1::class, 'view']);
    
});

Route::get('/logout', [Controller1::class, 'logout']);

require __DIR__.'/auth.php';
