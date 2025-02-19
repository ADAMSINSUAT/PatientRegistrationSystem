<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('patient/dashboard');
// });

Route::get('/', [
    \App\Http\Controllers\PatientController::class,
    'index'
])->name('patient.dashboard');

Route::post('/patient/save', [
    \App\Http\Controllers\PatientController::class,
    'store'
])->name('patient.store');

Route::get('/physicians', [
    \App\Http\Controllers\PhysicianController::class,
    'index'
]);

Route::post('/patientdetails/save', [
    \App\Http\Controllers\PatientDetailController::class,
    'store'
])->name('patientdetails.store');

Route::post('/patientdetails/update', [
    \App\Http\Controllers\PatientDetailController::class,
    'update'
])->name('patientdetails.update');

Route::delete('/patientdetails/delete/{id}', [
    \App\Http\Controllers\PatientDetailController::class,
    'delete'
])->name('patientdetails.delete');

Route::get('/patientdetails/get/{id}', [
    \App\Http\Controllers\PatientDetailController::class,
    'get'
])->name('details.history');