<?php

use App\Models\GlobalAdmin;
use App\Models\StaffInfo;
use App\Models\StaffMain;
use App\Models\StaffStudent;
use App\Models\StudentList;
use App\Models\StudentMain;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

    if (auth()->check() && auth()->user()->role == 'Admin') {

        $students = StudentMain::all();
        $studentsList = StudentList::all();
        $staffMain = StaffMain::all();
        $staffStudents = StaffStudent::all();
        $globalAdmin = GlobalAdmin::find(1);
        $StaffCanSupervise = StaffMain::where('can_supervise', '1')->count();

        $MainUser = User::all();

        if ($id == 'dashboard') {

            return view('Admin/dashboard', [
                'globalAdmin' => $globalAdmin,
                'students' => $students,
                'studentsList' => $studentsList,
                'staffMain' => $staffMain,
                'staffStudents' => $staffStudents,
                'StaffCanSupervise' => $StaffCanSupervise,
                'MainUser' => $MainUser
            ]);
        }

        if ($id == 'manage_admin') {

            return view('Admin/manage_admin', [
                'globalAdmin' => $globalAdmin,
                'students' => $students,
                'studentsList' => $studentsList,
                'staffMain' => $staffMain,
                'staffStudents' => $staffStudents,
                'StaffCanSupervise' => $StaffCanSupervise,
                'MainUser' => $MainUser
            ]);
        }

        if ($id == 'manage_staff') {

            return view('Admin/manage_staff', [
                'globalAdmin' => $globalAdmin,
                'students' => $students,
                'studentsList' => $studentsList,
                'staffMain' => $staffMain,
                'staffStudents' => $staffStudents,
                'StaffCanSupervise' => $StaffCanSupervise,
                'MainUser' => $MainUser
            ]);
        }

        if ($id == 'bulk_add_staff') {

            return view('Admin/bulk_add_staff', [
                'globalAdmin' => $globalAdmin,
                'students' => $students,
                'studentsList' => $studentsList,
                'staffMain' => $staffMain,
                'staffStudents' => $staffStudents,
                'StaffCanSupervise' => $StaffCanSupervise,
                'MainUser' => $MainUser
            ]);
        }

        if ($id == 'manage_student') {

            return view('Admin/manage_student', [
                'globalAdmin' => $globalAdmin,
                'students' => $students,
                'studentsList' => $studentsList,
                'staffMain' => $staffMain,
                'staffStudents' => $staffStudents,
                'StaffCanSupervise' => $StaffCanSupervise,
                'MainUser' => $MainUser
            ]);
        }

        if ($id == 'global_value') {

            return view('Admin/global_value', [
                'globalAdmin' => $globalAdmin,
                'students' => $students,
                'studentsList' => $studentsList,
                'staffMain' => $staffMain,
                'staffStudents' => $staffStudents,
                'StaffCanSupervise' => $StaffCanSupervise,
                'MainUser' => $MainUser
            ]);
        }


        if ($id == 'bulk_add_student') {

            return view('Admin/bulk_add_student', [
                'globalAdmin' => $globalAdmin,
                'students' => $students,
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

Route::get('student_page/{id}', function ($id) {

    if (auth()->check() && auth()->user()->role == 'Student') {

        $students = StudentMain::all();
        $studentsList = StudentList::all();
        $staffMain = StaffMain::all();
        $staffStudents = StaffStudent::all();
        $globalAdmin = GlobalAdmin::find(1);
        $StaffCanSupervise = StaffMain::where('can_supervise', '1')->count();
        $MainUser = User::all();


        $currentStudent = StudentMain::where('email', Auth::user()->email)->first();
        $currentStudentGroupMember = StudentList::where('email', Auth::user()->email)->get();
        $currentStudentSupervisor = StaffStudent::where('email', Auth::user()->email)->first();
        $currentStudentSupervisorUser = User::where('email', $currentStudentSupervisor->email_staff)->first();
        if ($id == 'dashboard') {

            return view('Student/dashboard', [
                'currentStudent' => $currentStudent,
                'currentStudentGroupMember' => $currentStudentGroupMember,
                'currentStudentSupervisor' => $currentStudentSupervisor,
                'currentStudentSupervisorUser' => $currentStudentSupervisorUser
            ]);
        }

        if ($id == 'update_profile') {

            $supervisorThatCanSupervise = StaffMain::where('can_supervise', '1')->get();
            $supervisors[] = array();

            foreach ($supervisorThatCanSupervise as $supervisor) {
                $selected = User::where('email', $supervisor->email)->first();
                $quota = StaffStudent::where('email_staff', $supervisor->email)->where('is_confirmed', '1')->count();

                $supervisors[] =
                    [
                        'name' => $selected->name,
                        'email' => $supervisor->email,
                        'quota' => $quota,
                        'track' => $supervisor->track
                    ];
            }

            return view('Student/update_profile', [
                'currentStudent' => $currentStudent,
                'currentStudentGroupMember' => $currentStudentGroupMember,
                'currentStudentSupervisor' => $currentStudentSupervisor,
                'currentStudentSupervisorUser' => $currentStudentSupervisorUser,
                'supervisors' => $supervisors,
                'globalAdmin' => $globalAdmin
            ]);
        }

        if ($id == 'change_password') {

            return view('Student/change_password', [
                'currentStudent' => $currentStudent,
                'currentStudentGroupMember' => $currentStudentGroupMember,
                'currentStudentSupervisor' => $currentStudentSupervisor,
                'currentStudentSupervisorUser' => $currentStudentSupervisorUser
            ]);
        }

        if ($id == 'supervisor_list') {

            $supervisorThatCanSupervise = StaffMain::where('can_supervise', '1')->get();
            $supervisors[] = array();

            foreach ($supervisorThatCanSupervise as $supervisor) {
                $selected = User::where('email', $supervisor->email)->first();
                $quota = StaffStudent::where('email_staff', $supervisor->email)->where('is_confirmed', '1')->count();
                $staffMain = StaffMain::where('email', $supervisor->email)->first();

                $supervisors[] =
                    [
                        'name' => $selected->name,
                        'email' => $supervisor->email,
                        'quota' => $quota,
                        'track' => $staffMain->track,
                    ];
            }

            return view('Student/supervisor_list', [
                'currentStudent' => $currentStudent,
                'currentStudentGroupMember' => $currentStudentGroupMember,
                'currentStudentSupervisor' => $currentStudentSupervisor,
                'currentStudentSupervisorUser' => $currentStudentSupervisorUser,
                'supervisors' => $supervisors,
                'globalAdmin' => $globalAdmin
            ]);
        }

    }

    abort(404);
})->name('student_page');

Route::get('staff_page/{id}', function ($id) {

    if (auth()->check() && auth()->user()->role == 'Staff') {

        $students = StudentMain::all();
        $studentsList = StudentList::all();
        $staffMain = StaffMain::all();
        $staffStudents = StaffStudent::all();
        $globalAdmin = GlobalAdmin::find(1);
        $countCurrentStaffSupervisee = StaffStudent::where('is_confirmed', '1')->where('email_staff', Auth::user()->email)->count();
        $countCurrentRequest = StaffStudent::where('is_confirmed', '0')->where('email_staff', Auth::user()->email)->count();
        $MainUser = User::all();

        if ($id == 'dashboard') {

            return view('Staff/dashboard', [
                'globalAdmin' => $globalAdmin,
                'students' => $students,
                'studentsList' => $studentsList,
                'staffMain' => $staffMain,
                'staffStudents' => $staffStudents,
                'MainUser' => $MainUser,
                'countCurrentStaffSupervisee' => $countCurrentStaffSupervisee,
                'countCurrentRequest' => $countCurrentRequest,
            ]);
        }

        if ($id == 'change_password') {

            return view('Staff/change_password', [

            ]);
        }

        if ($id == 'supervisor_request') {

            $studentsFiltered = StudentMain::join('staff_students', 'student_mains.email', '=', 'staff_students.email')->where('email_staff', Auth::user()->email)->where('is_confirmed', '0')->get();


            return view('Staff/supervisor_request', [
                'globalAdmin' => $globalAdmin,
                'students' => $studentsFiltered,
                'studentsList' => $studentsList,
                'staffMain' => $staffMain,
                'staffStudents' => $staffStudents,
                'MainUser' => $MainUser,
                'countCurrentStaffSupervisee' => $countCurrentStaffSupervisee,
                'countCurrentRequest' => $countCurrentRequest,
            ]);
        }

        if ($id == 'manage_supervisee') {

            $studentsFiltered = StudentMain::join('staff_students', 'student_mains.email', '=', 'staff_students.email')->where('email_staff', Auth::user()->email)->where('is_confirmed', '1')->get();


            return view('Staff/manage_supervisee', [
                'globalAdmin' => $globalAdmin,
                'students' => $studentsFiltered,
                'studentsList' => $studentsList,
                'staffMain' => $staffMain,
                'staffStudents' => $staffStudents,
                'MainUser' => $MainUser,
                'countCurrentStaffSupervisee' => $countCurrentStaffSupervisee,
                'countCurrentRequest' => $countCurrentRequest,
            ]);
        }

        if ($id == 'update_profile') {

            $studentsFiltered = StudentMain::join('staff_students', 'student_mains.email', '=', 'staff_students.email')->where('email_staff', Auth::user()->email)->where('is_confirmed', '1')->get();

            $currentStaffMain = StaffMain::where('email', Auth::user()->email)->first();

            $currentStaffInfos = StaffInfo::where('email', Auth::user()->email)->get();

            return view('Staff/update_profile', [
                'globalAdmin' => $globalAdmin,
                'students' => $studentsFiltered,
                'studentsList' => $studentsList,
                'staffMain' => $staffMain,
                'staffStudents' => $staffStudents,
                'MainUser' => $MainUser,
                'countCurrentStaffSupervisee' => $countCurrentStaffSupervisee,
                'countCurrentRequest' => $countCurrentRequest,
                'currentStaffMain' => $currentStaffMain,
                'currentStaffInfos' => $currentStaffInfos,
            ]);
        }
    }

    abort(404);
})->name('staff_page');

Route::get('staff/{id}', function ($id) {
    $staffUsers = User::where('role', 'Staff')->get();
    $staffMains = StaffMain::all();

    if ($id == 'list') {
        return view('Staff_List/list', [
            'staffUsers' => $staffUsers,
            'staffMains' => $staffMains,
        ]);
    }

    if ($id == 'profile') {


        $email = request()->input('email');
        $staffUser = User::where('email', $email)->first();
        $staffMain = StaffMain::where('email', $email)->first();

        $staffInfoResearch = StaffInfo::where('email', $email)->where('category', 'research')->get();
        $staffInfoArticle = StaffInfo::where('email', $email)->where('category', 'article')->get();
        $staffInfoProceeding = StaffInfo::where('email', $email)->where('category', 'proceeding')->get();
        $staffInfoOthers = StaffInfo::where('email', $email)->where('category', 'others')->get();
        $staffInfoSupervision = StaffInfo::where('email', $email)->where('category', 'supervision')->get();
        $staffInfoConsultation = StaffInfo::where('email', $email)->where('category', 'consultation')->get();
        $staffInfoAward_Recognition = StaffInfo::where('email', $email)->where('category', 'award_recognition')->get();

        $staffInfoResearchCount = StaffInfo::where('email', $email)->where('category', 'research')->count();
        $staffInfoArticleCount = StaffInfo::where('email', $email)->where('category', 'article')->count();
        $staffInfoProceedingCount = StaffInfo::where('email', $email)->where('category', 'proceeding')->count();
        $staffInfoOthersCount = StaffInfo::where('email', $email)->where('category', 'others')->count();
        $staffInfoSupervisionCount = StaffInfo::where('email', $email)->where('category', 'supervision')->count();
        $staffInfoConsultationCount = StaffInfo::where('email', $email)->where('category', 'consultation')->count();
        $staffInfoAward_RecognitionCount = StaffInfo::where('email', $email)->where('category', 'award_recognition')->count();

        $staffInfoPublicationCount = intval($staffInfoArticleCount) + intval($staffInfoProceedingCount) + intval($staffInfoOthersCount);

        $staffInfoTotalAll = intval($staffInfoResearchCount) + intval($staffInfoArticleCount) + intval($staffInfoProceedingCount) + intval($staffInfoOthersCount) + intval($staffInfoSupervisionCount) + intval($staffInfoConsultationCount)  + intval($staffInfoAward_RecognitionCount);


        return view('Staff_List/profile', [
            'email' => $email,
            'staffUser' =>$staffUser,
            'staffMain' =>$staffMain,
            'staffInfoResearch' =>$staffInfoResearch,
            'staffInfoArticle' =>$staffInfoArticle,
            'staffInfoProceeding' =>$staffInfoProceeding,
            'staffInfoOthers' =>$staffInfoOthers,
            'staffInfoSupervision' =>$staffInfoSupervision,
            'staffInfoConsultation' =>$staffInfoConsultation,
            'staffInfoAward_Recognition' =>$staffInfoAward_Recognition,
            'staffInfoResearchCount' =>$staffInfoResearchCount,
            'staffInfoArticleCount' =>$staffInfoArticleCount,
            'staffInfoProceedingCount' => $staffInfoProceedingCount,
            'staffInfoOthersCount' => $staffInfoOthersCount,
            'staffInfoSupervisionCount' =>$staffInfoSupervisionCount,
            'staffInfoConsultationCount' =>$staffInfoConsultationCount,
            'staffInfoAward_RecognitionCount' =>$staffInfoAward_RecognitionCount,
            'staffInfoPublicationCount' => $staffInfoPublicationCount,
            'staffInfoTotalAll' => $staffInfoTotalAll

        ]);
    }

})->name('staff_list');
