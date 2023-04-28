<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
    
        return view('locations.index')->with('locations', $locations);

    }
     
    public function create()
    {
        return view('locations.create')->with('countries', Country::all());
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required',
            'country_id' => 'required',
        ]);
    
        Location::create($request->all());
     
        return redirect()->route('locations.index')
                        ->with('success','Location created successfully.');
    }
  
    public function show(Location $location)
    {
        return view('locations.show', compact('location'));
    } 
     
    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'))->with('countries', Country::all());
    }
    
    public function update(Request $request, Location $location)
    {
    
        $location->update($request->all());
    
        return redirect()->route('locations.index')
                        ->with('success','Location updated successfully');
    }
    
    public function destroy(Location $location)
    {
        $location->delete();
    
        return redirect()->route('locations.index')
                        ->with('success','Location deleted successfully');
    }
}
