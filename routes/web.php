<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/hospitals', [HospitalController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('hospitals');
Route::post('/hospitals/add', [HospitalController::class, 'create'])
    ->middleware(['auth', 'verified']);
Route::post('/hospitals/update', [HospitalController::class, 'update'])
    ->middleware(['auth', 'verified']);
Route::post('/hospitals', [HospitalController::class, 'destroy'])
    ->middleware(['auth', 'verified']);

Route::get('/patients', [PatientController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('patients');
Route::get('/patients/{hospital}', [PatientController::class, 'show'])
    ->middleware(['auth', 'verified']);
Route::post('/patients/{hospital}/add', [PatientController::class, 'create'])
    ->middleware(['auth', 'verified']);
Route::post('/patients/{hospital}/update', [PatientController::class, 'update'])
    ->middleware(['auth', 'verified']);
Route::post('/patients/{hospital}', [PatientController::class, 'destroy'])
    ->middleware(['auth', 'verified']);

Route::get('/bills', [BillController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('bills');
Route::post('/bills/add', [BillController::class, 'create'])
    ->middleware(['auth', 'verified']);
Route::post('/bills/update', [BillController::class, 'update'])
    ->middleware(['auth', 'verified']);
Route::post('/bills', [BillController::class, 'destroy'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
