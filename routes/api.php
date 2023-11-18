<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\EditExpenseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterExpenseController;
use App\Http\Controllers\ValidateDateController;
use App\Http\Controllers\VerifyPermissionController;


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('check-token', [AuthController::class, 'checkToken']);
Route::post('register-expense', [RegisterExpenseController::class, 'registerExpense']);
Route::post('validate-date', [ValidateDateController::class, 'validateDate']);
Route::post('contact', [ContactController::class, 'store']);
Route::post('data', [DataTableController::class, 'getAllRegisters']);
Route::get('data/{id}', [DataTableController::class, 'getAllOneRegister']);
Route::put('edit-expense/{id}', [EditExpenseController::class, 'editExpense']);
Route::delete('remove/{id}', [DataTableController::class, 'delete']);
Route::post('verify-permission-edit/{id}', [VerifyPermissionController::class, 'verifyPermissionEdit']);

