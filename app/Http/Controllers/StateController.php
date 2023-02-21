<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\{Country,State};

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::select('name','id')->orderBy('name')->get();
        return view('address.addstate',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = new State();
        $data->name = $request->statename;
        $data->country_id = $request->country_id;
        if($data->save()){
            return redirect()->route('students.index')->with('completed', 'State has been added!');
        }else{
            return redirect()->route('state.create')->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

}
