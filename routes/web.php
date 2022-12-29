<?php

use App\Models\GlobalAdmin;
use App\Models\StaffMain;
use App\Models\StaffStudent;
use App\Models\StudentList;
use App\Models\StudentMain;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin_page/{id}', function ($id) {

    if (auth()->check() && auth()->user()->role == 'Admin')
    {

        $students = StudentMain::all();
        $studentsList = StudentList::all();
        $staffMain = StaffMain::all();
        $staffStudents = StaffStudent::all();
        $globalAdmin = GlobalAdmin::find(1);
        $StaffCanSupervise = StaffMain::where('can_supervise', '1')->count();

        $MainUser = User::all();

        if ($id == 'dashboard') {

            return view('admin/dashboard',  [
                'globalAdmin' =>  $globalAdmin,
                'students' => $students ,
                'studentsList' => $studentsList,
                'staffMain' => $staffMain,
                'staffStudents' => $staffStudents,
                'StaffCanSupervise' => $StaffCanSupervise,
                'MainUser' => $MainUser
            ]);
        }

        if ($id == 'manage_admin') {

            return view('admin/manage_admin',  [
                'globalAdmin' =>  $globalAdmin,
                'students' => $students ,
                'studentsList' => $studentsList,
                'staffMain' => $staffMain,
                'staffStudents' => $staffStudents,
                'StaffCanSupervise' => $StaffCanSupervise,
                'MainUser' => $MainUser
            ]);
        }

        if ($id == 'manage_staff') {

            return view('admin/manage_staff',  [
                'globalAdmin' =>  $globalAdmin,
                'students' => $students ,
                'studentsList' => $studentsList,
                'staffMain' => $staffMain,
                'staffStudents' => $staffStudents,
                'StaffCanSupervise' => $StaffCanSupervise,
                'MainUser' => $MainUser
            ]);
        }
    }

    abort(404);
})->name('admin_page');


