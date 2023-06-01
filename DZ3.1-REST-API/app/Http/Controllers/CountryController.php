<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function index()
    {
        $countries = Country::all();

        if(!$countries)
        {
            return response()->json(['message' => 'Country not found'], 404);
        }

        return response()->json($countries);
    }

    public function show(Country $country)
    {

        if(!$country)
        {
            return response()->json(['message' => 'Country not found'], 404);
        }


        return response()->json($country);
    }

    public function store(Request $request)
    {
        $country = Country::create($request->all());
        return response()->json($country, 201);
    }

    public function update(Request $request, Country $country)
    {
        $country->update($request->all());
        return response()->json($country);
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return response()->json(null, 204);
    }
}