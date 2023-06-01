<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $job = Job::all();

        if(!$job)
        {
            return response()->json(['message' => 'Job not found'], 404);
        }

        return response()->json($job);
    }

    public function show(Job $job)
    {
        if(!$job)
        {
            return response()->json(['message' => 'Job not found'], 404);
        }
        return response()->json($job);
    }

    public function store(Request $request)
    {
        $job = Job::create($request);
        return response()->json($job, 201);
    }

    public function update(Request $request, Job $job)
    {
        $job->update($request->all());
        return response()->json($job);
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return response()->json(null, 204);
    }

}