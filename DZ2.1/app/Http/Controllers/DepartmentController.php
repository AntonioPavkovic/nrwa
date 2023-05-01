<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();

        if(!$departments)
        {
            return response()->json(['message' => 'Department not found'], 404);
        }

        return response()->json($departments);
    }

    public function show(Department $department)
    {
        if(!$department)
        {
            return response()->json(['message' => 'Department not found'], 404);
        }
        return response()->json($department);
    }

    public function store(Request $request)
    {
        $department = Department::create($request);
        return response()->json($department, 201);
    }

    public function update(Request $request, Department $department)
    {
        $department->update($request->all());
        return response()->json($department);
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return response()->json(null, 204);
    }

}
