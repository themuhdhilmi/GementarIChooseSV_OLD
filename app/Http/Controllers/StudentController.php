<?php

namespace App\Http\Controllers;

use App\Models\GlobalAdmin;
use App\Models\StaffStudent;
use App\Models\StudentMain;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            $index++;
        }

        return response()->json(['succes' => $sucess, 'error' => $error], 201);
    }
}
