<?php

namespace App\Http\Controllers;

use App\Models\GlobalAdmin;
use App\Models\StaffMain;
use App\Models\StaffStudent;
use App\Models\StudentList;
use App\Models\StudentMain;
use Auth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Use_;
use Validator;

class StudentController extends Controller
{

    // GET /api/students
    public function index(Request $request)
    {
        $students = StudentMain::all();
        return response()->json($students, 200);
    }

    // GET /api/students/{id}
    public function show(Request $request, $id)
    {
        $student = StudentMain::find($id);
        if ($student) {
            return response()->json($student, 200);
        } else {
            return response()->json(['error' => 'Student not found'], 404);
        }
    }

    // POST /api/students
    public function store(Request $request)
    {
        $student = new StudentMain();
        $student->email = $request->input('email');
        $student->matric_number = $request->input('matric_number');
        $student->track = $request->input('track');
        $student->session = $request->input('session');
        $student->save();

        return response()->json($student, 201);
    }

    // PUT /api/students/{id}
    public function update(Request $request, $id)
    {
        $student = StudentMain::find($id);
        if ($student) {
            $student->email = $request->input('email');
            $student->matric_number = $request->input('matric_number');
            $student->track = $request->input('track');
            $student->session = $request->input('session');
            $student->save();

            return response()->json($student, 200);
        } else {
            return response()->json(['error' => 'Student not found'], 404);
        }
    }

    // DELETE /api/students/{id}
    public function destroy(Request $request, $id)
    {
        $student = StudentMain::find($id);
        if ($student) {
            $student->delete();
            return response()->json(null, 204);
        } else {
            return response()->json(['error' => 'Student not found'], 404);
        }
    }

    public function createStudent(Request $request)
    {
        // Validate the request data
        $request->validate([
            'password' => 'required|string|min:8',
            'num_matric' => 'required|string',
            'full_name' => 'required|string',
            'track' => 'required|string',
            'session' => 'nullable|string',
        ]);

        $trimmedNumMatric = str_replace(' ', '', $request->input('num_matric'));

        // Create the new user
        $user = new User();
        $user->name = $request->input('full_name');
        $user->email = $trimmedNumMatric . "@student.puo.edu.my";
        $user->password = Hash::make($request->input('password'));
        $user->role = 'Student';
        $user->save();

        // Create Student
        $student = new StudentMain();
        $student->email = $user->email;
        $student->matric_number = $trimmedNumMatric;
        $student->track = $request->input('track');

        // Get session from global admin
        $sessionFromGlobalAdmin = GlobalAdmin::first()->session;
        $student->session = $sessionFromGlobalAdmin;
        $student->save();

        // Create Student in Staff List (SV CHECKING).
        $studentList = new StaffStudent();
        $studentList->email = $user->email;
        $studentList->save();

        return response()->json($user, 201);
    }

    public function updateStudent(Request $request)
    {


        //return response()->json($request->all(), 201);

        $resultData = [];

        // Iterate over the models and add the data to the array
        foreach (StudentMain::all() as $model) {

            $resultData[] = [
                'current_email' => $model->email,
                'form_input_name' => $request->input(str_replace(".", "_", 'student_name_' . $model->email)),
                'form_input_email' => $request->input(str_replace(".", "_", 'student_email_' . $model->email)),
                'form_input_track' => $request->input(str_replace(".", "_", 'student_track_' . $model->email)),
                'form_input_sv' => $request->input(str_replace(".", "_", 'student_sv_' . $model->email)),
                'form_input_student_matric_number_' => $request->input(str_replace(".", "_", 'student_matric_number_' . $model->email)),
            ];

        }


        foreach ($resultData as $data) {
            // Find the user by email
            $user = User::where('email', $data['current_email'])->first();

            $trimmedNumMatric = str_replace(' ', '',  $data['form_input_email']);

            if ($user) {
                // Update the user name
                $user->name = $data['form_input_name'];
                $user->email = $trimmedNumMatric;
                $user->save();

                // Find the StaffMain model by email
                $student = StudentMain::where('email', $data['current_email'])->first();
                if ($student) {
                    //Update the studentMain model
                    $student->email = $trimmedNumMatric;
                    $student->track = $data['form_input_track'];
                    $student->matric_number = $data['form_input_student_matric_number_'];
                    $student->save();
                }

                // Find the StaffMain model by email
                $staffStudent = StaffStudent::where('email', $data['current_email'])->first();
                if ($staffStudent) {

                    $staffStudent->email = $data['form_input_email'];
                    $staffStudent->save();

                    if($data['form_input_sv'] == 'None')
                    {
                        $staffStudent->email_staff = '';
                        $staffStudent->is_confirmed = '0';
                        $staffStudent->save();
                    }
                    else
                    {
                        //Update the staffStudentMain model
                        $staffStudent->email_staff = $data['form_input_sv'];
                        $staffStudent->is_confirmed = '1';
                        $staffStudent->save();
                    }

                }
            }
        }

        return redirect()->route('admin_page', ['id' => 'manage_student', 'message' => 'success']);
    }

    public function bulkCreateStudent(Request $request)
    {
        //Validate the request data
        $request->validate([
            'textBulkInsertStudent' => 'required|string',
        ]);

        //return response()->json($request->all());

        // Split the CSV string into an array of lines
        $csv_lines = explode("\r\n", $request->input('textBulkInsertStudent'));

        $sucess = [];
        $error = [];
        $index = 1;
        // Iterate over the lines and create new users for each one
        foreach ($csv_lines as $line) {
            $index++;
            // Split the line into an array of values
            $values = explode(",", $line);

            $error_res = [];
            // Validate the values
            if (count($values) != 4) {
                array_push($error_res, 'error : not complete');
                $the_res = [$index => $error_res];
                array_push($error, $the_res);
                continue;
                //return response()->json(['message' => 'error : not complete']);
            }
            // Email
            if (!filter_var($values[0] . '@student.puo.edu.my', FILTER_VALIDATE_EMAIL)) {
                array_push($error_res, 'error : invalid email');
                //return response()->json(['message' => 'error : invalid email' . $values[1]]);
            }
            $user = User::where('email', $values[0] . '@student.puo.edu.my')->first();
            if ($user) {
                array_push($error_res, 'User already exists');
                //return response()->json(['message' => 'User already exists'], 422);
            }
            // name
            if (strlen($values[1]) <= 5) {
                array_push($error_res, 'error : invalid name');
                //return response()->json(['message' => 'error : invalid name']);
            }
            // track
            if (!in_array($values[2], ['programming', 'networking', 'security'])) {
                array_push($error_res, 'error : invalid track');
                //return response()->json(['message' => 'error : invalid track']);
            }
            // Pasword
            if (strlen($values[3]) < 8) {
                array_push($error_res, 'error : password less than 8');
                //return response()->json(['message' => 'error : password less than 8']);
            }

            if (!empty($error_res)) {
                $the_res = [$index => $error_res];
                array_push($error, $the_res);
                continue;
            }

            // Create the new user
            $user = new User();
            $user->name = $values[1];
            $user->email = $values[0] . '@student.puo.edu.my';
            $user->password = Hash::make($values[3]);
            $user->role = 'Student';
            $user->save();


            // Create Student
            $student = new StudentMain();
            $student->email = $user->email;
            $student->matric_number = $values[0];
            $student->track = $values[2];

            // Get session from global admin
            $sessionFromGlobalAdmin = GlobalAdmin::first()->session;
            $student->session = $sessionFromGlobalAdmin;
            $student->save();

            // Create Student in Staff List (SV CHECKING).
            $studentList = new StaffStudent();
            $studentList->email = $user->email;
            $studentList->save();

            $the_res = [$index => ['Successfully inserted']];
            array_push($sucess, $the_res);

        }

        return response()->json(['succes' => $sucess, 'error' => $error], 201);
    }

    /*
    *
    * This used for student_page/update_profile
    *
    */
    public function updateStudentProfile(Request $request)
    {
        $currentStudentMain = StudentMain::where('email', $request->input('txtEmail'))->first();

        // Validate extra if user doesnt upload anything yet
        if($currentStudentMain->has_abstract_path == '1' && $currentStudentMain->has_poster_proposal_path == '1' )
        {
            $validator = Validator::make($request->all(), [
                'txtNameMember2' => 'required|string|min:5',
                'txtMatricMember2' => 'required|string|min:5',
                'txtNameMember3' => 'required|string|min:5',
                'txtMatricMember3' => 'required|string|min:5',
                'txtProjectTittle' => 'required|string|min:5',
            ]);


            $stringErrorCollection = '';

            $errors = $validator->errors();
            foreach ($errors->all() as $error) {
                $stringErrorCollection = $stringErrorCollection . $error;
            }

            if($validator->fails()) {
                return redirect()->route('student_page', ['id' => 'update_profile', 'errors' => $stringErrorCollection]);
            }
        }
        else
        {
            $validator = Validator::make($request->all(), [
                'txtNameMember2' => 'required|string|min:5',
                'txtMatricMember2' => 'required|string|min:5',
                'txtNameMember3' => 'required|string|min:5',
                'txtMatricMember3' => 'required|string|min:5',
                'txtProjectTittle' => 'required|string|min:5',
                'fileAbstract' => 'required|mimes:pdf|max:5000',
                'filePoster' => 'required|mimes:pdf|max:5000',
            ]);

            $stringErrorCollection = '';

            $errors = $validator->errors();
            foreach ($errors->all() as $error) {
                $stringErrorCollection = $stringErrorCollection . $error;
            }

            if($validator->fails()) {
                return redirect()->route('student_page', ['id' => 'update_profile', 'errors' => $stringErrorCollection]);
            }


        }
        /*
        *
        *   VALIDATION AND SV SELECTION PROCESS
        *
        */
        if($request->input('selectSv') == "0")
        {
            // If sv none, set semail staff and confirmed set to zero and none
            StaffStudent::where('email', $request->input('txtEmail'))->update(['email_staff' => '', 'is_confirmed' => '0']);
        }
        else if($request->input('selectSv') == 'approved')
        {

        }
        else
        {
            // Check if email existed
            $isSupervisoExisted = StaffMain::where('email', $request->input('selectSv'))->where('can_supervise', '1')->count();

            // If sv existed
            if(strval($isSupervisoExisted) >= 1)
            {
                $quota = StaffStudent::where('email_staff', $request->input('selectSv'))->where('is_confirmed', '1')->count();
                $global = GlobalAdmin::find(1);

                // if SV quota not available
                if(strval($quota) >= $global->quota)
                {
                    return redirect()->route('student_page', ['id' => 'update_profile', 'errors' => 'SV Quota reached limit.']);
                }

                // if already selected
                if(strval($quota) >= $global->quota)
                {
                    return redirect()->route('student_page', ['id' => 'update_profile', 'errors' => 'SV Quota reached limit.']);
                }

                StaffStudent::where('email', $request->input('txtEmail'))->update(['email_staff' => $request->input('selectSv'), 'is_confirmed' => '0']);
            }
            else
            {
                return redirect()->route('student_page', ['id' => 'update_profile', 'errors' => 'Error SV Input.']);
            }
        }

        /*
        *
        *   Change Project Tittle
        *
        */
        StudentMain::where('email', $request->input('txtEmail'))->update(['tittle' => $request->input('txtProjectTittle')]);

        // Delete All Student in student list
        StudentList::where('email',  $request->input('txtEmail'))->delete();

        if($request->input('txtMatricMember2') != null )
        {
            $studentList1 = new StudentList();
            $studentList1->full_name = $request->input('txtNameMember2');
            $studentList1->email = $request->input('txtEmail');
            $studentList1->matric_number = $request->input('txtMatricMember2');
            $studentList1->save();
        }


        if($request->input('txtMatricMember3') != null )
        {
            $studentList2 = new StudentList();
            $studentList2->full_name = $request->input('txtNameMember3');
            $studentList2->email = $request->input('txtEmail');
            $studentList2->matric_number = $request->input('txtMatricMember3');
            $studentList2->save();
        }


        if($request->input('txtMatricMember4') != null )
        {
            $studentList3 = new StudentList();
            $studentList3->full_name = $request->input('txtNameMember4');
            $studentList3->email = $request->input('txtEmail');
            $studentList3->matric_number = $request->input('txtMatricMember4');
            $studentList3->save();
        }


        if($request->input('txtMatricMember5') != null )
        {
            $studentList4 = new StudentList();
            $studentList4->full_name = $request->input('txtNameMember5');
            $studentList4->email = $request->input('txtEmail');
            $studentList4->matric_number = $request->input('txtMatricMember5');
            $studentList4->save();
        }

        if($request->file('fileAbstract')){
            $request->file('fileAbstract')->move(public_path().'/downloadable//abstract', $request->input('txtEmail') . '.pdf');
            StudentMain::where('email', $request->input('txtEmail'))->update(['has_abstract_path' => '1']);
        }

        if($request->file('filePoster')){
            $request->file('filePoster')->move(public_path().'/downloadable//poster_proposal', $request->input('txtEmail') . '.pdf');
            StudentMain::where('email', $request->input('txtEmail'))->update(['has_poster_proposal_path' => '1']);
        }

        return redirect()->route('student_page', ['id' => 'update_profile', 'success' => 'Success updating profile.']);
    }

    public function changeStudentPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'txtCurrentPassword' => 'required|string',
            'txtNewPassword' => 'required|string|min:8|confirmed',
            'txtEmail' => 'required|email',
        ]);

        if ($validator->fails()) {
            //return response()->json(['errors' => $validator->errors()], 400);

            $stringErrorCollection = '';

            $errors = $validator->errors();
            foreach ($errors->all() as $error) {
                $stringErrorCollection = $stringErrorCollection . $error;
            }


            return redirect()->route('student_page', ['id' => 'change_password', 'errors' => $stringErrorCollection]);
        }


        $user = User::where('email', $request->input('txtEmail'))->first();


        if (!Hash::check($request->txtCurrentPassword, $user->password)) {
            //return response()->json(['errors' => 'The provided old password is incorrect.'], 400);

            return redirect()->route('student_page', ['id' => 'change_password', 'errors' => 'Old password not match.']);
        }

        // Update the user's password
        $user->password = Hash::make($request->txtNewPassword);
        $user->save();

        return redirect()->route('student_page', ['id' => 'change_password','success' => 'Password successfully changed.']);

    }

}
