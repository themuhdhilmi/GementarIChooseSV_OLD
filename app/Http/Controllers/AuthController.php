<?php

namespace App\Http\Controllers;

use App\Models\LecturerMain;
use App\Models\StudentList;
use App\Models\StudentMain;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Nette\Schema\Schema;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try
        {
            $request->validate([
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:6',
                'category' => 'required',
            ]);
        } catch (\Throwable $th)
        {
            return response()->json([
                'message' => 'Username already taken',
            ], 201);
        }

        if($request->category == "admin")
        {
            $user = new User;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->category = $request->category;

            $user->save();

            return response()->json([
                'message' => 'Success',
                'user' => $user
            ], 201);
        }

        if($request->category == "lecturer")
        {
            try
            {
                $request->validate([
                    'full_name' => 'required|string',
                    'track' => 'required|string',
                ]);
            } catch (\Throwable $th)
            {
                return response()->json([
                    'message' => 'No lecturer info',
                ], 201);
            }

            $user = new User;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->category = $request->category;
            $user->save();

            $lecturerMain = new LecturerMain;
            $lecturerMain->email = $request->email;
            $lecturerMain->full_name = $request->full_name;
            $lecturerMain->track = $request->track;
            $lecturerMain->save();

            return response()->json([
                'message' => 'Success',
                'user' => $user,
                'lecturer' => $lecturerMain,
                'lecturer_info' => $lecturerMain
            ], 201);
        }

        if($request->category == "student")
        {
            try
            {
                $request->validate([
                    'full_name' => 'required|string',
                    'track' => 'required|string',
                    'matric_number' => 'required|string',
                    'session' => 'required|string'
                ]);
            } catch (\Throwable $th)
            {
                return response()->json([
                    'message' => 'No student info',
                ], 201);
            }

            $user = new User;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->category = $request->category;
            $user->save();

            $student = new StudentMain;
            $student->email = $request->email;
            $student->full_name = $request->full_name;
            $student->track = $request->track;
            $student->matric_number = $request->matric_number;
            $student->session = $request->session;
            $student->save();

            return response()->json([
                'message' => 'Success',
                'user' => $user,
                'student' => $student,
            ], 201);
        }

    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response([
                'message' => 'Error',
            ], 401);
        }

        $token = $user->createToken('apiToken')->plainTextToken;

        $res = [
            'message' => 'Success',
            'user' => $user,
            'token' => $token
        ];

        return response($res, 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Success'
        ]);
    }
}
