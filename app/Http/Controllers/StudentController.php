<?php

namespace App\Http\Controllers;

use App\Models\StudentMain;
use Illuminate\Http\Request;

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
        $student->full_name = $request->input('full_name');
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
            $student->full_name = $request->input('full_name');
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
}
