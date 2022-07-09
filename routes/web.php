<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EducationController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/employees', [UserController::class, 'index'])->middleware('auth')->name('employees.index');
Route::get('/employees/create', [UserController::class, 'create'])->middleware('auth')->name('employees.create');
Route::post('/employees/store', [UserController::class, 'store'])->middleware('auth')->name('employees.store');

Route::get('/educations', [EducationController::class, 'index'])->middleware('auth')->name('educations.index');


require __DIR__.'/auth.php';
