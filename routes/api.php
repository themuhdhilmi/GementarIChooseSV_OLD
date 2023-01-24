<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//-----------------------------------------------------------------------------------------------------------------------------------
                                                //      ADMIN PAGE & GLOBAL
//-----------------------------------------------------------------------------------------------------------------------------------

// Global Value
Route::post('upd_global_val', [App\Http\Controllers\GlobalAdminController::class, 'update'])->name('upd_global_val');
// Delete all user
Route::delete('user_delete_all', [App\Http\Controllers\UserController::class, 'userDelete'])->name('user_delete_all');
// Update user password base on email
Route::post('user_update_password', [App\Http\Controllers\UserController::class, 'userUpdatePassword'])->name('user_update_password');
// Changr Password
Route::post('changeUserPassword', [App\Http\Controllers\UserController::class, 'changeUserPassword'])->name('changeUserPassword');
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


//-----------------------------------------------------------------------------------------------------------------------------------
                                                //      STUDENTS PAGE
//-----------------------------------------------------------------------------------------------------------------------------------
Route::post('updateStudentProfile', [App\Http\Controllers\StudentController::class, 'updateStudentProfile'])->name('updateStudentProfile');
Route::post('changeStudentPassword', [App\Http\Controllers\StudentController::class, 'changeStudentPassword'])->name('changeStudentPassword');
//-----------------------------------------------------------------------------------------------------------------------------------
                                                //      STAFF PAGE
//-----------------------------------------------------------------------------------------------------------------------------------
Route::post('changeStaffPassword', [App\Http\Controllers\StaffController::class, 'changeStaffPassword'])->name('changeStaffPassword');
Route::post('supervisorRequest', [App\Http\Controllers\StaffController::class, 'supervisorRequest'])->name('supervisorRequest');
Route::post('superviseeDelete', [App\Http\Controllers\StaffController::class, 'superviseeDelete'])->name('superviseeDelete');
Route::post('updateProfilePicture', [App\Http\Controllers\StaffController::class, 'updateProfilePicture'])->name('updateProfilePicture');
Route::post('updateAdditionInformation', [App\Http\Controllers\StaffController::class, 'updateAdditionInformation'])->name('updateAdditionInformation');
Route::post('deleteStaffInfo', [App\Http\Controllers\StaffInfoController::class, 'deleteStaffInfo'])->name('deleteStaffInfo');
Route::post('insertStaffInfoResearch', [App\Http\Controllers\StaffInfoController::class, 'insertStaffInfoResearch'])->name('insertStaffInfoResearch');
Route::post('insertStaffInfoArticle', [App\Http\Controllers\StaffInfoController::class, 'insertStaffInfoArticle'])->name('insertStaffInfoArticle');
Route::post('insertStaffInfoProceeding', [App\Http\Controllers\StaffInfoController::class, 'insertStaffInfoProceeding'])->name('insertStaffInfoProceeding');
Route::post('insertStaffInfoOthers', [App\Http\Controllers\StaffInfoController::class, 'insertStaffInfoOthers'])->name('insertStaffInfoOthers');
Route::post('insertStaffInfoSupervision', [App\Http\Controllers\StaffInfoController::class, 'insertStaffInfoSupervision'])->name('insertStaffInfoSupervision');
Route::post('insertStaffInfoConsultation', [App\Http\Controllers\StaffInfoController::class, 'insertStaffInfoConsultation'])->name('insertStaffInfoConsultation');
Route::post('insertStaffInfoAward_Recognition', [App\Http\Controllers\StaffInfoController::class, 'insertStaffInfoAward_Recognition'])->name('insertStaffInfoAward_Recognition');
