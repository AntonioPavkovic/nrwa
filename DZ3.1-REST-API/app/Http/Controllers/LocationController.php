<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $location = Location::all();

        if(!$location)
        {
            return response()->json(['message' => 'Location not found'], 404);
        }

        return response()->json($location);
    }

    public function show(Location $location)
    {
        if(!$location)
        {
            return response()->json(['message' => 'Location not found'], 404);
        }
        return response()->json($location);
    }

    public function store(Request $request)
    {
        $location = Location::create($request->all());
        return response()->json($location, 201);
    }

    public function update(Request $request, Location $location)
    {
        $location->update($request->all());
        return response()->json($location);
    }

    public function destroy(Location $location)
    {
        $location->delete();
        return response()->json(null, 204);
    }

}