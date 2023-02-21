<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\{City,Country,State};

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function fetchState(Request $request)
    {
        $data = State::where("country_id",$request->country_id)->select('name','id')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::select('name','id')->orderBy('name')->get();
        return view('address.addcity',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = new City();
        $data->name = $request->cityname;
        $data->state_id = $request->state_id;
        if($data->save()){
            return redirect()->route('students.index')->with('completed', 'City has been added!');
        }else{
            return redirect()->route('city.create')->with('error', 'Something went wrong');
        }
    }
}
