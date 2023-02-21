<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('address.addcountry');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = new Country();
        $data->name = $request->countryname;
        $data->sortname = $request->shortname;
        $data->phonecode = $request->phonecode;
        if($data->save()){
            return redirect()->route('students.index')->with('completed', 'Country has been saved!');
        }else{
            return redirect()->route('country.create')->with('error', 'Something went wrong');
        }
    }
}
