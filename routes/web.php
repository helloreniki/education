<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\UserEducationController;

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
Route::get('/educations/create', [EducationController::class, 'create'])->middleware('auth')->name('educations.create');
Route::post('/educations', [EducationController::class, 'store'])->middleware('auth')->name('educations.store');

Route::get('/{user}/educations', [UserController::class, 'show'])->middleware('auth')->name('employee.show');


require __DIR__.'/auth.php';
