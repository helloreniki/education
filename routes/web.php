<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApproveController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\CertificateController;
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

 // all routes with middleware auth
Route::group(['middleware' => 'auth'], function () {

    // all auth
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/educations', [EducationController::class, 'index'])->name('educations.index');

    // can manage users
    Route::group(['middleware' => 'can:manage_users'], function () {
        Route::get('/employees', [UserController::class, 'index'])->name('employees.index');
        Route::get('/employees/create', [UserController::class, 'create'])->name('employees.create');
        Route::post('/employees/store', [UserController::class, 'store'])->name('employees.store');
    });

    // can manage educations
    Route::group(['middleware' => 'can:manage_educations'], function () {
        Route::get('/educations/create', [EducationController::class, 'create'])->name('educations.create');
        Route::post('/educations', [EducationController::class, 'store'])->name('educations.store');
        Route::delete('/educations/{education}', [EducationController::class, 'destroy'])->name('educations.destroy');
    });

    // user educations: can see user educations & certificates, but not uploading certificates (manage users OR see_my_own),
    Route::group(['middleware' => 'can:see_user_educations,user'], function () {
        Route::get('/users/{user}/educations', [UserController::class, 'show'])->name('employee.show');
        Route::get('/users/{user}/educations/{education}/certificate/download', [CertificateController::class, 'download'])->name('certificate.download');
    });

    // can apply - all auth users, but just for yourself, to any education, but not past
    Route::group(['middleware' => 'can:apply_to_education,user,education'], function () {
        Route::get('/users/{user}/educations/{education}/create', [UserEducationController::class, 'create'])->name('employee.education.create');
        Route::post('/users/{user}/educations/{education}', [UserEducationController::class, 'store'])->name('employee.education.store');
    });

    // can upload certificate (only me for myself, not for all educations, but my educations)
    Route::group(['middleware' => 'can:upload_certificate,user,education'], function () {
        Route::post('/users/{user}/educations/{education}/certificate', [CertificateController::class, 'store'])->name('certificate.store');
    });

    // can approve
    Route::group(['middleware' => 'can:approve'], function () {
        Route::get('/users-educations', [UserEducationController::class, 'index'])->name('employee.education.index')->middleware('can:approve');
        Route::post('/approve/{user}/{education}', [ApproveController::class, 'store'])->name('approve.store');
        Route::delete('/approve/{user}/{education}', [ApproveController::class, 'destroy'])->name('approve.destroy');
    });

});


require __DIR__.'/auth.php';
