<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GlobalAdmin;
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

    public function userDelete(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|string|email',
        ]);

        /*
        *
        * Delete the users
        *
        */
        $user = User::where('email', $request->input('email'))->first();
        // If the user does not exist, return a 404 error
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        // Delete the user from the users table
        $user->delete();

        /*
        *
        * Delete the users in Staffs
        *
        */
        StaffMain::where('email', $request->input('email'))->delete();
        StaffInfo::where('email', $request->input('email'))->delete();
        StaffStudent::where('email', $request->input('email'))->delete();
        //Should set email_staff to empty instead of deleted it.
        StaffStudent::where('email_staff',  $request->input('email'))->update([
            'email_staff' => '',
            'is_confirmed' => 0
        ]);

        /*
        *
        * Delete the users in Students
        *
        */
        StudentMain::where('email', $request->input('email'))->delete();
        StudentList::where('email', $request->input('email'))->delete();

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
}
