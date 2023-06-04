<?php

namespace App\Http\Controllers;

use App\Models\JobHistory;
use Illuminate\Http\Request;

class JobHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic');
    }

    public function index()
    {
        $jobHistory = JobHistory::all();

        if(!$jobHistory)
        {
            return response()->json(['message' => 'JobHistory not found'], 404);
        }

        return response()->json($jobHistory);
    }

    public function show(JobHistory $jobHistory)
    {
        if(!$jobHistory)
        {
            return response()->json(['message' => 'JobHistory not found'], 404);
        }
        return response()->json($jobHistory);
    }

    public function store(Request $request)
    {
        $jobHistory = JobHistory::create($request->all());
        return response()->json($jobHistory, 201);
    }

    public function update(Request $request, JobHistory $jobHistory)
    {
        $jobHistory->update($request->all());
        return response()->json($jobHistory);
    }

    public function destroy(JobHistory $jobHistory)
    {
        $jobHistory->delete();
        return response()->json(null, 204);
    }

}