<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StaffInfo;
use App\Models\StaffMain;
use App\Models\StaffStudent;
use App\Models\StudentList;
use App\Models\StudentMain;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function createStudent(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'matric_number' => 'required|string',
            'track' => 'required|string',
            'session' => 'nullable|string',
        ]);

        // Create the new user
        $user = new User();
        $user->name = $request->input('full_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'Student';
        $user->save();


        $student = new StudentMain();
        $student->email = $user->email;
        $student->matric_number = $request->input('matric_number');
        $student->track = $request->input('track');
        $student->session = $request->input('session');
        $student->save();

        $studentList = new StaffStudent();
        $studentList->email = $user->email;
        $studentList->save();

        return response()->json($user, 201);
    }

    public function createAdmin(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Create the new user
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'Admin';
        $user->save();


        return response()->json($user, 201);
    }

    public function createStaff(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'track' => 'required|string',
            'scopus_id' => 'nullable|string',
            'google_scholar' => 'nullable|string',
            'consultation_price' => 'nullable|integer',
            'send_email_notification' => 'nullable|boolean',
        ]);

        // Create the new user
        $user = new User();
        $user->name = $request->input('full_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'Staff';
        $user->save();

        // Create the new StaffMain model
        $staff = new StaffMain();
        $staff->email = $user->email;
        $staff->track = $request->input('track');
        $staff->scopus_id = $request->input('scopus_id');
        $staff->google_scholar = $request->input('google_scholar');
        $staff->consultation_price = $request->input('consultation_price');
        $staff->send_email_notification = $request->input('send_email_notification');
        $staff->save();

        return response()->json($user, 201);
    }

    public function userDelete(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|string|email',
        ]);

        // Find the user with the given email
        $user = User::where('email', $request->input('email'))->first();

        // If the user does not exist, return a 404 error
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Delete the user from the users table
        $user->delete();

        // Delete the staff (if any)
        StaffMain::where('email', $request->input('email'))->delete();
        StudentMain::where('email', $request->input('email'))->delete();
        StudentList::where('email', $request->input('email'))->delete();

        // Delete the student from the student list (if any)
        StaffMain::where('email', $request->input('email'))->delete();
        StaffStudent::where('email', $request->input('email'))->delete();
        StaffStudent::where('email_staff', $request->input('email'))->delete();
        //StaffInfo::where('email', $request->input('email'))->delete();


        return response()->json([
            'message' => 'User successfully deleted'
        ], 200);
    }

    public function userUpdatePassword(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        // Find the user by email
        $user = User::where('email', $request->input('email'))->first();

        // Update the password
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response()->json($user, 200);
    }

    public function updateStaff(Request $request)
    {

        $resultData = [];

        // Iterate over the models and add the data to the array
        foreach (StaffMain::all() as $model) {

            $resultData[] = [
                'current_email' => $model->email,
                'form_input_name' => $request->input(str_replace(".", "_", 'staff_name_' . $model->email)),
                'form_input_email' => $request->input(str_replace(".", "_", 'staff_email_' . $model->email)),
                'form_input_track' => $request->input(str_replace(".", "_", 'staff_track_' . $model->email)),
                'form_input_supervisor_status' => $request->input(str_replace(".", "_", 'staff_supervisor_' . $model->email)),
            ];

            //array_push($resultData,  $data);
        }

        foreach ($resultData as $data) {
            // Find the user by email
            $user = User::where('email', $data['current_email'])->first();

            if ($user) {
                // Update the user name
                $user->name = $data['form_input_name'];
                $user->email = $data['form_input_email'];
                $user->save();

                // Find the StaffMain model by email
                $staff = StaffMain::where('email', $data['current_email'])->first();
                if ($staff) {
                    //Update the StaffMain model
                    $staff->email = $data['form_input_email'];
                    $staff->track = $data['form_input_track'];
                    $staff->can_supervise = $data['form_input_supervisor_status'];
                    $staff->save();
                }
            }
        }


        //return response()->json([$request->all()], 200);
        return response()->json([$resultData, ], 200);
    }

}
