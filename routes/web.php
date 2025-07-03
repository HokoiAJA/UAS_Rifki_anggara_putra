<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeesController;
Route::get('/', [EmployeesController::class, 'index']);
Route::resource('employees', EmployeesController::class);

