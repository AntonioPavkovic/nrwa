<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Region;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();

        return view('countries.index')->with('countries', $countries);
    }


    public function create()
    {
        return view('countries.create')->with('regions', Region::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'required',
            'region_id' => 'required',
        ]);
    
        Country::create($request->all());
     
        return redirect()->route('countries.index')
                        ->with('success','Country created successfully.');
    }
     
    public function show(Country $country)
    {
        return view('countries.show', compact('country'));
    } 
     
    
    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'))->with('regions', Region::all());
    }
    
    
    public function update(Request $request, Country $country)
    {
    
        $country->update($request->all());
    
        return redirect()->route('countries.index')
                        ->with('success','Country updated successfully');
    }
    
    public function destroy(Country $country)
    {
        $country->delete();
    
        return redirect()->route('countries.index')
                        ->with('success','Country deleted successfully');
    }

    public function liveSearch(Request $request)
    {
        $query = $request->input('query');
        $countries = Country::where('country_name', 'LIKE', '%' . $query . '%')->get();
        return view('countries.search', compact('countries'));
    }
        
}
