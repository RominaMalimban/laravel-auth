<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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

// ROUTE HOME PUBLIC:
Route::get('/', [MainController::class,'home'])
    ->name('home');

// ROUTE LOGGED PRIVATE:
Route::get('/logged', [MainController :: class, 'logged']) 
    -> middleware(['auth', 'verified'])-> name('logged');

// ROUTE SHOW PUBLIC:
Route::get('/project/show/{project}', [MainController::class, 'projectShow'])
    ->name('projectShow');

// ROUTE PRIVATE DELETE:
Route :: get('/logged/project/delete/{project}', [MainController :: class, 'projectDelete'])
    ->middleware(['auth', 'verified'])-> name('projectDelete');

// ROUTE PRIVATE PER FORM:
Route :: get('/logged/project/create', [MainController :: class, 'projectCreate'])
    ->middleware(['auth', 'verified'])-> name('projectCreate');

// ROUTE PER RICEZIONE DATI FORM:
Route :: post('/logged/project/store', [MainController :: class, 'projectStore'])
    ->middleware(['auth', 'verified'])-> name('projectStore');

// ROUTE EDIT FORM:
Route::get('/logged/project/edit/{project}', [MainController::class, 'projectEdit'])
    ->middleware(['auth', 'verified'])->name('projectEdit');

// ROUTE PER RICEZIONE DATI VECCHI DA FORM:
Route :: post('/logged/project/update/{project}', [MainController :: class, 'projectUpdate'])
    ->middleware(['auth', 'verified'])-> name('projectUpdate');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
