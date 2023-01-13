<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Global Value
Route::post('upd_global_val', [App\Http\Controllers\GlobalAdminController::class, 'update'])->name('upd_global_val');
// Delete all user
Route::delete('user_delete_all', [App\Http\Controllers\UserController::class, 'userDelete'])->name('user_delete_all');
// Update user password base on email
Route::post('user_update_password', [App\Http\Controllers\UserController::class, 'userUpdatePassword'])->name('user_update_password');
//-----------------------------------------------------------------------------------------------------------------------------------
// Create new admin
Route::post('radmin', [App\Http\Controllers\UserController::class, 'createAdmin'])->name('radmin');
//-----------------------------------------------------------------------------------------------------------------------------------
// Create new Staff
Route::post('rstaff', [App\Http\Controllers\StaffController::class, 'createStaff'])->name('rstaff');
// Update Staff
Route::post('updateStaff', [App\Http\Controllers\StaffController::class, 'updateStaff'])->name('updateStaff');
// Bulk Create Staff
Route::post('bulkCreateStaff', [App\Http\Controllers\StaffController::class, 'bulkCreateStaff'])->name('bulkCreateStaff');
//-----------------------------------------------------------------------------------------------------------------------------------
// Create new Student
Route::post('rstud', [App\Http\Controllers\StudentController::class, 'createStudent'])->name('rstud');
// Update Student
Route::post('updateStudent', [App\Http\Controllers\StudentController::class, 'updateStudent'])->name('updateStudent');
// Bulk Create Student
Route::post('bulkCreateStudent', [App\Http\Controllers\StudentController::class, 'bulkCreateStudent'])->name('bulkCreateStudent');
