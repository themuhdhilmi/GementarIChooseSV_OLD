<?php

namespace App\Http\Controllers;

use App\Models\LecturerMain;

use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function index()
    {
        $items = LecturerMain::all();

        return response()->json($items);
    }

    public function show($id)
    {
        $item = LecturerMain::find($id);

        return response()->json($item);
    }

    public function store(Request $request)
    {
        $item = LecturerMain::create($request->all());

        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $item = LecturerMain::findOrFail($id);
        $item->update($request->all());

        return response()->json($item, 200);
    }

    public function destroy($id)
    {
        LecturerMain::destroy($id);

        return response()->json;

    }
}
