<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StaffMain;
use App\Models\StaffStudent;
use App\Models\StudentList;
use App\Models\StudentMain;
use App\Models\User;
use Illuminate\Http\Request;
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
            'full_name' => 'required|string',
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
        $student->full_name = $request->input('full_name');
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
            'full_name' => 'required|string',
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
        $staff->full_name = $request->input('full_name');
        $staff->track = $request->input('track');
        $staff->scopus_id = $request->input('scopus_id');
        $staff->google_scholar = $request->input('google_scholar');
        $staff->consultation_price = $request->input('consultation_price');
        $staff->send_email_notification = $request->input('send_email_notification');
        $staff->save();

        return response()->json($user, 201);
    }


}
