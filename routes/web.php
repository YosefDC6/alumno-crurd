<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('students.index'));

Route::resource('carreras', CareerController::class)->names('careers');
Route::resource('estudiantes', StudentController::class)->names('students');
