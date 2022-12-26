<?php

namespace App\Http\Controllers;

use App\Models\GlobalAdmin;
use Illuminate\Http\Request;

class GlobalAdminController extends Controller
{

    public function update(Request $request)
    {

        // Validate the request data
        $request->validate([
            'session' => 'required|string',
            'quota' => 'required|string'
        ]);

        // Find the global_admins record to update
        $globalAdmin = GlobalAdmin::find(1);
        if (!$globalAdmin) {
            return response()->json(['error' => 'Global admin not found'], 404);
        }

        // Update the global_admins record
        $globalAdmin->session = $request->input('session');
        $globalAdmin->quota = $request->input('quota');
        $globalAdmin->save();

        return response()->json($globalAdmin);
    }
}
