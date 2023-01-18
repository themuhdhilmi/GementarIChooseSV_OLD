<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->check() && auth()->user()->role == 'Admin')
        {
            return redirect()->route('admin_page', ['id' => 'dashboard']);
        }
        else if (auth()->check() && auth()->user()->role == 'Staff')
        {
            return redirect()->route('staff_page', ['id' => 'dashboard']);
        }
        else if (auth()->check() && auth()->user()->role == 'Student')
        {
            return redirect()->route('student_page', ['id' => 'dashboard']);
        }

    }
}
