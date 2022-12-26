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


Route::post('/rstud', [App\Http\Controllers\UserController::class, 'createStudent']);
Route::post('/radmin', [App\Http\Controllers\UserController::class, 'createAdmin'])->name('radmin');
Route::post('/rstaff', [App\Http\Controllers\UserController::class, 'createStaff']);
Route::put('/global_admins',  [App\Http\Controllers\GlobalAdminController::class, 'update']);


