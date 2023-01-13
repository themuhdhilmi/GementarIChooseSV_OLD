<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Global Value
Route::post('upd_global_val', [App\Http\Controllers\GlobalAdminController::class, 'update'])->name('upd_global_val');
// Delete all user
Route::delete('user_delete_all', [App\Http\Controllers\UserController::class, 'userDelete'])->name('user_delete_all');
// Update user password base on email
Route::post('user_update_password', [App\Http\Controllers\UserController::class, 'userUpdatePassword'])->name('user_update_password');
//-----------------------------------------------------------------------------------------------------------------------------------
// Create new admin
Route::post('radmin', [App\Http\Controllers\UserController::class, 'createAdmin'])->name('radmin');
// Update Admin
Route::put('global_admins', [App\Http\Controllers\GlobalAdminController::class, 'update']);
//-----------------------------------------------------------------------------------------------------------------------------------
// Create new Staff
Route::post('rstaff', [App\Http\Controllers\UserController::class, 'createStaff'])->name('rstaff');
// Update Staff
Route::post('updateStaff', [App\Http\Controllers\UserController::class, 'updateStaff'])->name('updateStaff');
// Bulk Create Staff
Route::post('bulkCreateStaff', [App\Http\Controllers\UserController::class, 'bulkCreateStaff'])->name('bulkCreateStaff');
//-----------------------------------------------------------------------------------------------------------------------------------
// Create new Student
Route::post('rstud', [App\Http\Controllers\UserController::class, 'createStudent'])->name('rstud');
// Update Student
Route::post('updateStudent', [App\Http\Controllers\UserController::class, 'updateStudent'])->name('updateStudent');
// Bulk Create Student
Route::post('bulkCreateStudent', [App\Http\Controllers\UserController::class, 'bulkCreateStudent'])->name('bulkCreateStudent');





// // Delete all user
// Route::middleware('auth:sanctum')->delete('user_delete_all', [App\Http\Controllers\UserController::class, 'userDelete'])->name('user_delete_all');

// // Update user password base on email
// Route::middleware('auth:sanctum')->post('user_update_password', [App\Http\Controllers\UserController::class, 'userUpdatePassword'])->name('user_update_password');

// // Create new student
// Route::middleware('auth:sanctum')->post('rstud', [App\Http\Controllers\UserController::class, 'createStudent']);

// // Create new admin
// Route::middleware('auth:sanctum')->post('radmin', [App\Http\Controllers\UserController::class, 'createAdmin'])->name('radmin');

// // Create new Staff
// Route::middleware('auth:sanctum')->post('rstaff', [App\Http\Controllers\UserController::class, 'createStaff']);

// Route::middleware('auth:sanctum')->put('global_admins', [App\Http\Controllers\GlobalAdminController::class, 'update']);
