<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $region = Region::all();

        if(!$region)
        {
            return response()->json(['message' => 'Region not found'], 404);
        }

        return response()->json($region);
    }

    public function show(Region $region)
    {
        if(!$region)
        {
            return response()->json(['message' => 'Region not found'], 404);
        }
        return response()->json($region);
    }

    public function store(Request $request)
    {
        $region = Region::create($request);
        return response()->json($region, 201);
    }

    public function update(Request $request, Region $region)
    {
        $region->update($request->all());
        return response()->json($region);
    }

    public function destroy(Region $region)
    {
        $region->delete();
        return response()->json(null, 204);
    }

}
